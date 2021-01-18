<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypes = [
            [
                'label' => 'sport'
            ],
            [
                'label' => 'culture'
            ],
            [
                'label' => 'concert'
            ],
            [
                'label' => 'animation'
            ],
            [
                'label' => 'soiree'
            ],
        ];

        foreach ($eventTypes as $type) {
            EventType::create($type);
        }
    }
}
