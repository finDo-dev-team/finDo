<?php
namespace App\Data\Extractors\Events;

abstract class APIExtractor {
    abstract function getRecordsFromApi();
    
    public function recordsToEventCollection($records) {
        $collection = \collect([]);
        foreach($records as $record) {
            $collection[] = $this->recordToEvent($record);
        }
        return $collection;
    }
    
    abstract function recordToEvent($record);

    /*
    public static function main() {
        $odpExtractor = new ODPExtractor;
        $odpRecords = $odpExtractor->getRecordsFromApi();
        $eventsCollection = $odpExtractor->recordsToEventCollection($odpRecords);
        $eventsCollection->each(function ($event) {
            $event->save();
        });
    }
    */
}