<?php
namespace App\Data\Extractors\Events;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Support\Collection;
use App\Models\Builder\EventBuilder;
use Illuminate\Support\Facades\Http;
use App\Data\Extractors\Events\ODIDFExtractor;

class ODIDFExtractor implements APIExtractor {

    private static $queryNext2WeeksEvents = 'https://data.iledefrance.fr/api/records/1.0/search/?dataset=evenements-publics-cibul&q=date_start+%3E+%23now()+AND+date_start+%3C%3D+%23now(weeks%3D%2B2)&rows=1000';
   
    private array $records;
    private Collection $eventsCreated;

    public function __construct()
    {
        $this->records = array();
        $this->eventsCreated = collect([]);
    }

    public function addEventsToDB(): void
    {
        $this->getRecordsFromApi(ODIDFExtractor::$queryNext2WeeksEvents);
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
        
      //  $eventType = $this->setEventType($record['fields']['category']);

      //  $this->attachEventTypeToEvent($event, $eventType);

        $this->eventsCreated[] = $event;
    }

    private function createEventFields(array $fields): Event
    {
        $eventBuilder = new EventBuilder();

        $event = $eventBuilder
            ->addTitle($fields['title'])
            ->addLeadText($fields['description'])
            ->addDescription($fields['free_text'])
            ->addDateStart(Carbon::create($fields['date_start']))
            ->addDateEnd(Carbon::create($fields['date_end']))
            ->addAddressName($fields['address'])
            ->addLatitude($fields['latlon'][0])
            ->addLongitude($fields['latlon'][1])
            ->build();
        $event->addCheckSum();

        if($this->checkSum($event)&& $this->checkIfSimilarExist($event)) $event->save();
        return $event;
    }

    private function checkSum($event) : bool
    {
        if (Event::where('checkSum', '=', $event->checkSum)->exists()) return false;
        else return true;

    }

    private function checkIfSimilarExist ($event) : bool 
    {
        $str1=$event->getInfoTrimed();
        $Tabevents=Event::all();

        foreach($Tabevents as $str2){
           similar_text($str1,$str2->getInfoTrimed(),$percent); 
           if ($percent>80) {
               echo "\n Found similar with ".$percent."%";
               $this->addMissingElement($str2,$event);
               return false;
           }
            
        }
        return true;

    }

    private function addMissingElement ($eventOnBD, $event)
    {
        // Pour chaque champs de elements regarder si vide
        // si vide alors copier le champs de l'event similaire
        // si non continuer

        if($eventOnBD->title==null && $event->title!=null ){
         $eventOnBD->title = $event->title;
         $eventOnBD->save();
         echo "\n Added Missing title \n";
        }
        if($eventOnBD->lead_text==null && $event->lead_text!=null){
        $eventOnBD->lead_text = $event->lead_text;
        echo "\n Added Missing lead_text \n";
        $eventOnBD->save();
        }
        if($eventOnBD->description==null && $event->description!=null){
         $eventOnBD->description = $event->description;
         echo "\n Added Missing description \n";
         $eventOnBD->save();
        }
        if($eventOnBD->date_start==null && $event->date_start!=null){
         $eventOnBD->date_start = $event->date_start;
         echo "\n Added Missing date_start \n";
         $eventOnBD->save();
        }
        if($eventOnBD->date_end==null &&  $event->date_end!=null){
         $eventOnBD->date_end = $event->date_end;
         echo "\n Added Missing date_end \n";
         $eventOnBD->save();
        }
        if($eventOnBD->address_name==null && $event->address_name!=null){
         $eventOnBD->address_name = $event->address_name;
         echo "\n Added Missing address_name \n";
         $eventOnBD->save();
        }
        if($eventOnBD->address_city==null && $event->address_city!=null){
        $eventOnBD->address_city = $event->address_city;
        echo "\n Added Missing address_city \n";
        $eventOnBD->save();
        }
        if($eventOnBD->address_zipcode==null && $event->address_zipcode!=null){
         $eventOnBD->address_zipcode = $event->address_zipcode;
         echo "\n Added Missing address_zipcode in id: \n".$eventOnBD->id;
         $eventOnBD->save();
        }
        if($eventOnBD->address_street==null && $event->address_street!=null){
         $eventOnBD->address_street = $event->address_street;
         echo "\n Added Missing address_street \n";
         $eventOnBD->save();
        }
        if($eventOnBD->latitude==null && $event->latitude!=null){
         $eventOnBD->latitude = $event->latitude;
         echo "\n Added Missing latitude \n";
         $eventOnBD->save();
        }
        if($eventOnBD->longitude==null && $event->longitude!=null){
        $eventOnBD->longitude = $event->longitude;
        echo "\n Added Missing longitude \n";
        $eventOnBD->save();
        }

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
