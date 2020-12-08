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
            ->orderBy('date', 'asc')
            ->get();
        $typesEvents = EventType::orderBy('label', 'asc')->get();

        return Inertia::render('Event/Index', [
            'events' => $events,
            'typesEvents' => $typesEvents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:50'],
            'location' => ['required'],
            'date' => ['required'],
            'description' => ['required', 'max:500'],
            'value' => ['required']
        ]);

        Event::create($request->all());

        $eventArray = ['title' => request('title'), 'location' => request('location'), 'date' => request('date'), 'description' => request('description')];
        $event = Event::where($eventArray)
            ->take(1)
            ->value('id');

        $values = request('value');
        if ($event != null) {
            foreach ($values as $value) {
                $eventTypeId = EventType::where('label', $value)
                    ->take(1)
                    ->value('id');
                EventEventType::insert([
                    'event_id' => $event,
                    'event_type_id' => $eventTypeId
                ]);
            }
        }
        return Redirect::route('index');
    }

    //return Event form
    public function form()
    {
        return Inertia::render('Form');
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
