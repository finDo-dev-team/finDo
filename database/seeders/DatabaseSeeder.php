<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventEventType;
use App\Models\EventType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(17)->create();
        EventType::factory(4)->create();
        for ($i = 0; $i < 30; $i++) {
            EventEventType::factory(1)->create();
        }
    }
}
