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
                'label' => 'Sportifs'
            ],
            [
                'label' => 'Expositions'
            ],
            [
                'label' => 'Concerts'
            ],
            [
                'label' => 'Animations'
            ],
            [
                'label' => 'Soiree'
            ],
        ];

        foreach ($eventTypes as $type) {
            EventType::create($type);
        }
    }
}
