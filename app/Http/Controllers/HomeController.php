<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        if( request('q') != null)
        {
            $events = Event::where('title', 'like', request('q') . '%')->get();
            return response()->json($events);

        } else {

            $events = Event::orderBy('date', 'asc')->get()->take(3);
            return Inertia::render('Home', ['events' => $events]);
        }
    }

    public function showMap()
    {
        return Inertia::render('Map');
    }

    public function search($request)
    {
        $events = Event::where('name',$request)->get()->take();
        return Inertia::render('Home', ['events' =>$events]);
    }


}
