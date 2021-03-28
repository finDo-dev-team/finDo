<?php

namespace App\Http\Controllers;
//require_once ('../quickstart.php');

use Inertia\Inertia;
use App\Models\Event;
use Socialite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event as CalendarEvent;

class CalendarController extends Controller
{

//Ecrire le code qui Récuper les information des evenement sauvegardé ? ou alors qui insére directement l'évenement ?


public function addEventToCalendar(){
    /*
    $event = new CalendarEvent;

    $event->name = 'A new test';
    $event->startDateTime = Carbon::now();
    $event->endDateTime = Carbon::now()->addHour();
    
    $event->save();
    */
    if(request('id') != null){
    
    $events = Event::where('id',request('id'))->get();
    $eventCalendar = new CalendarEvent;
    
    foreach($events as $event){
        $eventCalendar->name = $event->title;
        $eventCalendar->startDateTime = Carbon::create($event->date_start);
        $eventCalendar->endDateTime = Carbon::create($event->date_end);

        $eventCalendar->save();
        }
    }
    return redirect('/events');
}


public function deleteEventFromCalendar($event)
{

    //Code à réaliser
}



}