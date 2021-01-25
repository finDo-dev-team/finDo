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
            $events = Event::orderBy('date_start', 'asc')
                ->whereDate('date_start', '>=', date('Y-m-d'))
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

        // Show event into map

        public function showSomeEventsOntoMap(Request $request)
        {
            $request->validate([
                    'Code_Postal' => ['required','min:5','max:5']
            ],[
                'Code_Postal.required' => 'Veuillez renseigner le champ avec un code postal valide',
                'Code_Postal.min' => 'Veuillez renseigner le champ avec un code postal valide',
                'Code_Postal.max' => 'Veuillez renseigner le champ avec un code postal valide'
            ]);

            $address = Event::select('location','title','date')->where('location', 'like', '%'.request('Code_Postal'))->get();

            return Inertia::render('AllEventsOnToMap',  compact('address'));

        }

}
