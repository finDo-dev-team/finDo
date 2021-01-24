<?php
namespace App\Data\Extractors\Events;

use Illuminate\Support\Collection;

interface APIExtractor {
    function addEventsToDB(): void;
    function getEventsCreated(): Collection;
}