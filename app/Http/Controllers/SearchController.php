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
                ->get()
                ->take(3);
            return Inertia::render('Search', compact('events'));
        }
    }

    /**
     * Retourne une liste d'événements au format JSON
     *
     * @return Illuminate\Contracts\Routing\ResponseFactory::json
     */
    public function search()
    {
        if (request('q') != null) {
            $events = Event::where('title', 'like', request('q') . '%')->get();
            return response()->json($events);
            //return Inertia::render('/', ['events' => $events]);
        } else {
            $events = Event::orderBy('date', 'asc')->get()->take(3);
            return response()->json($events);
        }
    }

    // Show event into map

    public function showSomeEventsOntoMap(Request $request)
    {
        $request->validate([
                'Code_Postal' => ['required','min:5','max:5']
        ]);

        $address = Event::select('location','title','date')->where('location', 'like', '%'.request('Code_Postal'))->get();

        return Inertia::render('AllEventsOnToMap',  compact('address'));

    }
}
