<?php
namespace App\Data\Extractors\Events;

use Illuminate\Support\Collection;

interface APIExtractor {
    function prepareEvents(): void;
    function getEvents(): Collection;
}