<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'location' => $this->faker->address(),
            'description' => $this->faker->paragraph(2, true),
            'detailled_description' => $this->faker->paragraph(20, true),
            'pictures' => $this->faker->image('public/images'),
        ];
    }
}
