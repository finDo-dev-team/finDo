<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class DetailledEventController extends Controller
{
     /**
     * Affiche un liste d'événements en fonction d'une chaine de caractères.
     * 
     * @return Inertia\Inertia\Response
     */
    public function index()
    {
        $events = Event::where('id', 'like', request('q'))->get();
        
        return Inertia::render('DetailledEvent', compact('events'));
    }

}
