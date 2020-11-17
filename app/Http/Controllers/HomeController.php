<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        if( request('q') != null)
        {
            $events = Event::where('title', 'like', request('q') . '%')->get();
            return Inertia::render('Home', ['events' => $events]);

        } else {
            $events = Event::orderBy('date', 'asc')
                ->whereDate('date', '>=', date('Y-m-d'))
                ->get()
                ->take(3);
            return Inertia::render('Home', compact('events'));
        }
    }

   



    public function showMap()
    {
        return Inertia::render('Map');
    }


}
