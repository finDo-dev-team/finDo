<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')
            ->whereDate('date', '>=', date('Y-m-d'))
            ->get()
            ->take(3);
        dd($events);
        return Inertia::render('Home', [
            'events' => $events
        ]);
    }

    public function showMap()
    {
        return Inertia::render('Map');
    }
}
