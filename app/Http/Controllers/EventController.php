<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Event;
use App\Models\EventType;
use App\Models\EventEventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use GeoIPLocation;

/**
 * Controlleur des événements
 *
 */
class EventController extends Controller
{
    /**
     * Affiche la liste des événements.
     *
     * @param int
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('types')
            ->orderBy('date_start', 'asc')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();

        $this->prepareEvents($events);

        $typesEvents = EventType::orderBy('label', 'asc')->get();

        return $this->renderWithInertia('Event/Index', [
            'events' => $events,
            'typesEvents' => $typesEvents
        ]);
    }

    private function prepareEvents($events) {
        foreach ($events as $event) {
            $event->addLatLngField();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventTypes = EventType::all();

        return $this->renderWithInertia('Event/Create', [
            'eventTypes' => $eventTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($eventCreationFormRules, $eventCreationFormRequired);

        $event = Event::create($request->all());

        /* Récupère les id des types d'événement à attacher à l'événement */
        $typesToAdd = array();
        foreach ($request->value as $types) {
            array_push($typesToAdd, $types["id"]);
        }

        /* Ajoute le ou les types a l'événement */
        foreach ($typesToAdd as $typeId) {
            $event->types()->attach($typeId);
        }

        return Redirect::route('events');
    }

    private static $eventCreationFormRules = [
            'title' => ['required', 'max:50'],
            'location' => ['required'],
            'date' => ['required'],
            'description' => ['required', 'max:500'],
            'value' => ['required']
    ];

    private static $eventCreationFormRequired = [
        'title.required' => 'Le titre est obligatoire.',
        'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
        'location.required'=> 'La localisation est obligatoire.',
        'date.required'=> 'La date est obligatoire.',
        'description.required'=> 'La description est obligatoire.',
        'description.max' => 'La description ne doit pas dépasser :max caractères.',
        'value.required'=> 'Veuillez choisir au moins une valeur dans la liste.',
    ];

    public function addEventToUserCalendar($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->events()->attach($id);
        }
        $events = Event::where('id', 'like', $id)->get();
         return Inertia::render('DetailledEvent', compact('events'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
