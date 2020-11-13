<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventType;
use App\Models\EventEventType;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventEventTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventEventType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomKey = array();

        do {
            /* Getting all distincts ids in Event and EventType  */
            $eventModelIds = Event::all()->modelKeys();
            $eventTypeModelIds = EventType::all()->modelKeys();

            /* Generating random primary key from ids */
            $randomKey['event_id'] = $this->faker->randomElement($eventModelIds);
            $randomKey['event_type_id'] = $this->faker->randomElement($eventTypeModelIds);

            /* Check if the primary key already exists */
            $relationAlreadyExists = EventEventType::where('event_id', $randomKey['event_id'])->where('event_type_id', $randomKey['event_type_id'])->count();
        } while ($relationAlreadyExists != 0);

        return [
            'event_id' => $randomKey['event_id'],
            'event_type_id' => $randomKey['event_type_id']
        ];
    }
}
