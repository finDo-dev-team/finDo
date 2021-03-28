<?php
namespace App\Data\Extractors\Events;

use App\Data\Extractors\Events\ODLExtractor;
use App\Data\Extractors\Events\ODPExtractor;
use App\Data\Extractors\Events\ODSExtractor;
use App\Data\Extractors\Events\ODGPSExtractor;
use App\Data\Extractors\Events\ODIDFExtractor;

class App {
    public static function main(): void
    {
        
        $odpExtractor = new ODPExtractor();
        $odpExtractor->addEventsToDB();

    
    }
}