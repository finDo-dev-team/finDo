<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlleur des événements
 * 
 */
class EventController extends Controller
{
    /**
     * Affiche la liste des événements.
     *
     * @return Inertia\Inertia\Response
     */
    public function index()
    {
        $events = Event::with('types')
            ->orderBy('date', 'asc')
            ->get();

        return Inertia::render('Event/Index', compact('events'));
    }
}
