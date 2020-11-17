<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function index(){
        
        if( request('q') != null)
        {
        $events = Event::where('title', 'like', request('q') . '%')->get();
        return response()->json($events);
        //return Inertia::render('/', ['events' => $events]);
        }
        else 
        {
        $events = Event::orderBy('date', 'asc')->get()->take(3);
        return response()->json($events);       
        }
    }

}
