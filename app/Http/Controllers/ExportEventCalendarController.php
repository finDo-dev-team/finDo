<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportEventCalendarController extends Controller
{
    public function calendar()
    {

        if(request('id') != null){
            $events = Event::where('id',request('id'))->get();
            foreach($events as $event){

            $ics = "BEGIN:VCALENDAR\n";
            $ics .= "VERSION:2.0\n";
            $ics .= "PRODID:-//LFP//iCal 3.0//FR\n";
            $ics .= "BEGIN:VEVENT\n";
            $ics .= "X-WR-TIMEZONE:Europe/Paris\n";
            $ics .= "SUMMARY:".$event->title."\n";
            $ics .= "LOCATION:".$event->address_street." ".$event->address_zipcode." ".$event->address_city.", ".$event->address_name."\n";
            $ics .= "DTSTART:".date('Ymd',strtotime($event->date_start))."T".date('His',strtotime($event->date_start))."\n";
            $ics .= "DTEND:".date('Ymd',strtotime($event->date_end))."T".date('His',strtotime($event->date_end))."\n";
            $ics .= "DESCRIPTION:".$event->lead_text."\n";
            $ics .= "END:VEVENT\n";
            $ics .= "END:VCALENDAR\n";
            }

            $file_name = 'findo_event.ics';
            $file = fopen($file_name, 'w+');
            fputs($file, $ics);

            if(file_exists($file_name)){
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_name));
                readfile($file_name);
                exit;
            }
        }
    }
}
