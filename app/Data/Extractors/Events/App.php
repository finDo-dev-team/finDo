<?php
namespace App\Data\Extractors\Events;

use App\Data\Extractors\Events\ODPExtractor;

class App {
    public static function main(): void
    {
        $extractors[] = new ODPExtractor();
        $events = collect([]);
        foreach ($extractors as $extractor) {
            $extractor->prepareEvents();
            $events = $events->merge($extractor->getEvents());
        }

        $events->each(function ($event) {
            $event->save();
        });

        /*
        $eventsCollection->each(function ($event) {
            $event->save();
        });
        */
    }
}