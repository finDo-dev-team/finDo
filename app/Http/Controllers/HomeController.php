<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')
            ->whereDate('date', '>=', date('Y-m-d'))
            ->get()
            ->take(3);
        return Inertia::render('Home', compact('events'));
    }

    public function showMap()
    {
        return Inertia::render('Map');
    }
}
