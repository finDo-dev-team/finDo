<?php
namespace App\Models\Builder;

use Carbon\Carbon;
use App\Models\Event;

class EventBuilder
{
    private $event;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->event = new Event();
    }

    public function addTitle(string $title): EventBuilder
    {
        $this->event->title = $title;
        return $this;
    }

    public function addLeadText(string $leadText): EventBuilder
    {
        $this->event->lead_text = $leadText;
        return $this;
    }

    public function addDescription(string $description): EventBuilder
    {
        $this->event->description = $description;
        return $this;
    }

    public function addDateStart(Carbon $dateStart): EventBuilder
    {
        $this->event->date_start = $dateStart;
        return $this;
    }

    public function addDateEnd(Carbon $dateEnd): EventBuilder
    {
        $this->event->date_end = $dateEnd;
        return $this;
    }

    public function addAddressName(string $addressName): EventBuilder
    {
        $this->event->address_name = $addressName;
        return $this;
    }

    public function addAddressCity(string $addressCity): EventBuilder
    {
        $this->event->address_city = $addressCity;
        return $this;
    }

    public function addAddressZipCode(string $addressZipCode): EventBuilder
    {
        $this->event->address_zipcode = $addressZipCode;
        return $this;
    }

    public function addAddressStreet(string $addressStreet): EventBuilder
    {
        $this->event->address_street = $addressStreet;
        return $this;
    }

    public function addLatitude($latitude): EventBuilder
    {
        $this->event->latitude = $latitude;
        return $this;
    }

    public function addLongitude($longitude): EventBuilder
    {
        $this->event->longitude = $longitude;
        return $this;
    }

    public function build(): Event
    {
        return $this->event;
    }
}
