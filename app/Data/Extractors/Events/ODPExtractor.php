<?php
namespace App\Data\Extractors\Events;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Collection;
use App\Models\Builder\EventBuilder;
use Illuminate\Support\Facades\Http;
use App\Data\Extractors\Events\APIExtractor;

class ODPExtractor implements APIExtractor {

    private static $queryNext2WeeksEvents = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=que-faire-a-paris-&q=date_start+%3E+%23now()+AND+date_start+%3C%3D+%23now(weeks%3D%2B2)&rows=1000';
   
    private array $records;
    private Collection $events;

    public function __construct()
    {
        $this->records = array();
        $this->events = collect([]);
    }

    public function prepareEvents(): void
    {
        $this->getRecordsFromApi(ODPExtractor::$queryNext2WeeksEvents);
        $this->recordsToEvents();
    }
    
    private function getRecordsFromApi($apiQuery): void
    {
        $response = Http::get($apiQuery);
        $this->records = $response['records'];
    }

    private function recordsToEvents(): void
    {
        foreach($this->records as $record) {
            $this->events[] = $this->recordToEvent($record);
        }
    }

    private function recordToEvent(array $record): Event
    {
        $recordFields = $record['fields'];

        $eventBuilder = new EventBuilder();

        $eventBuilder->addTitle($recordFields['title'])
            ->addLeadText($recordFields['lead_text'])
            ->addDescription($recordFields['description'])
            ->addDateStart(Carbon::create($recordFields['date_start']))
            ->addDateEnd(Carbon::create($recordFields['date_end']))
            ->addAddressName($recordFields['address_name'])
            ->addAddressCity($recordFields['address_city'])
            ->addAddressZipCode($recordFields['address_zipcode'])
            ->addAddressStreet($recordFields['address_street'])
            ->addLatitude($recordFields['lat_lon'][0])
            ->addLongitude($recordFields['lat_lon'][1]);
        
        return $eventBuilder->build();
    }

    public function getEvents(): Collection
    {
        return $this->events;
    }

}
