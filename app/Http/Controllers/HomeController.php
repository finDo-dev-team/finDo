<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

/**
 * Controlleur de la page d'Accueil
 * 
 */
class HomeController extends Controller
{
    /**
     *  Affiche la page d'accueil avec les données nécessaires.
     * 
     * @return Inertia\Inertia\Response
     */
    public function index()
    {
        $events = Event::orderBy('date_start', 'asc')
            ->whereDate('date_start', '>=', date('Y-m-d'))
            ->get()
            ->take(3);
            
        return Inertia::render('Home', compact('events'));
    }

    /**
     * Affiche la page de la carte.
     * 
     * @return Inertia\Inertia\Response
     */
    public function showMap()
    {
        return Inertia::render('Map');
    }
}
