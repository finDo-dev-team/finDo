<?php
namespace App\Data\Extractors\Events;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Facades\Http;
use App\Data\Extractors\Events\APIExtractor;

class ODPExtractor extends APIExtractor {

    private static $apiRequest = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=que-faire-a-paris-&q=date_start+%3E+%23now()+AND+date_start+%3C%3D+%23now(weeks%3D%2B2)&rows=1000'; 

    public function getRecordsFromApi() {
        $response = Http::get(ODPExtractor::$apiRequest);
        return $response['records'];
    }

    public function recordToEvent($record) {
        $recordFields = $record['fields'];
        $event = new Event;
        $event->title = $recordFields['title'];
        $event->lead_text = $recordFields['lead_text'];
        $event->description = $recordFields['description'];
        $event->date_start = Carbon::create($recordFields['date_start']);
        $event->date_end = Carbon::create($recordFields['date_end']);
        if (isset($recordFields['address_name'])) {
            $event->address_name = $recordFields['address_name'];
        } else {
            $event->address_name = '';
        }
        $event->address_city = $recordFields['address_city'];
        $event->address_zipcode = $recordFields['address_zipcode'];
        $event->address_street = $recordFields['address_street'];
        if (isset($recordFields['lat_lon'])) {
            $event->latitude = $recordFields['lat_lon'][0];
            $event->longitude = $recordFields['lat_lon'][1];
        } else {
            $event->latitude = null;
            $event->longitude = null;
        }
        return $event;
    }
}
