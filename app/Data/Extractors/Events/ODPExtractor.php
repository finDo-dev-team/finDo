<?php
namespace App\Data\Extractors\Events;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Support\Collection;
use App\Models\Builder\EventBuilder;
use Illuminate\Support\Facades\Http;
use App\Data\Extractors\Events\ODPExtractor;

class ODPExtractor implements APIExtractor {

    private static $queryNext2WeeksEvents = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=que-faire-a-paris-&q=date_start+%3E+%23now()+AND+date_start+%3C%3D+%23now(weeks%3D%2B2)&rows=1000';
   
    private array $records;
    private Collection $eventsCreated;

    public function __construct()
    {
        $this->records = array();
        $this->eventsCreated = collect([]);
    }

    public function addEventsToDB(): void
    {
        $this->getRecordsFromApi(ODPExtractor::$queryNext2WeeksEvents);
        $this->createEventsFromRecords();
    }

    private function getRecordsFromApi($apiQuery): void
    {
        $response = Http::get($apiQuery);
        $this->records = $response['records'];
    }

    private function createEventsFromRecords(): void
    {
        foreach($this->records as $record) {
            $this->createEventFromRecord($record);
        }
    }

    private function createEventFromRecord(array $record): void
    {
        $event = $this->createEventFields($record['fields']);
        
        $eventType = $this->setEventType($record['fields']['category']);

        $this->attachEventTypeToEvent($event, $eventType);

        $this->eventsCreated[] = $event;
    }

    private function createEventFields(array $fields): Event
    {
        $eventBuilder = new EventBuilder();

        $event = $eventBuilder
            ->addTitle($fields['title'])
            ->addLeadText($fields['lead_text'])
            ->addDescription($fields['description'])
            ->addDateStart(Carbon::create($fields['date_start']))
            ->addDateEnd(Carbon::create($fields['date_end']))
            ->addAddressName($fields['address_name'])
            ->addAddressCity($fields['address_city'])
            ->addAddressZipCode($fields['address_zipcode'])
            ->addAddressStreet($fields['address_street'])
            ->addLatitude($fields['lat_lon'][0])
            ->addLongitude($fields['lat_lon'][1])
            ->build();
        $event->addCheckSum();

        if($this->checkSum($event)) $event->save();
        return $event;
    }

    private function checkSum($event) : bool
    {
        if (Event::where('checkSum', '=', $event->checkSum)->exists()) return false;
        else return true;

    }


    private function setEventType(?string $label)
    {
        if ($label != null) {
            return $this->retrieveOrCreateEventType($label);
        }

        return null;
    }
    
    private function retrieveOrCreateEventType(string $label): EventType
    {
        $eventType = EventType::firstOrCreate([
            'label' => $this->formatFieldCategory($label)
        ]);

        return $eventType;
    }


    private function formatFieldCategory(string $category): string
    {
        return trim(preg_replace('/->.*/','',$category));
    }

    private function attachEventTypeToEvent(Event $event, ?EventType $eventType): void
    {
        if ($eventType != null && $event->id != null) {
            $event->types()->attach($eventType->id);
        }
    }

    public function getEventsCreated(): Collection
    {
        return $this->eventsCreated;
    }
}
