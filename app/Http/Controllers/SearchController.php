<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Facade\Ignition\ErrorPage\Renderer;

class SearchController extends Controller
{

    /**
     * Affiche un liste d'événements en fonction d'une chaine de caractères.
     *
     * @return Inertia\Inertia\Response
     */
    public function index()
    {
        if (request('q') != null) {
            $events = Event::where('title', 'like', request('q') . '%')->get();
            return Inertia::render('Search', ['events' => $events]);
        } else {
            $events = Event::orderBy('date', 'asc')
                ->whereDate('date', '>=', date('Y-m-d'))
                ->get();
            return Inertia::render('Search', compact('events'));
        }
    }


     public function search(){
        
        if( request('q') != null)
        {
        $events = Event::where('title', 'like', request('q') . '%')->get();
        return response()->json($events);
        //return Inertia::render('/', ['events' => $events]);
        }
    }

    

}
