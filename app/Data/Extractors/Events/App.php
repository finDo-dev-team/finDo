<?php
namespace App\Data\Extractors\Events;

use App\Data\Extractors\Events\ODPExtractor;

class App {
    public static function main(): void
    {
        $odpExtractor = new ODPExtractor();
        $odpExtractor->addEventsToDB();
    }
}