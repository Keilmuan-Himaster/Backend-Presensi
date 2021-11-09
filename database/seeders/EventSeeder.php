<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([
            'name' => 'Tutorial',
            'status' => 1,
            'structure_id' => 1,
        ]);
        Event::insert([
            'name' => 'Bios',
            'status' => 1,
            'structure_id' => 2,
        ]);
        Event::insert([
            'name' => 'CC',
            'status' => 1,
            'structure_id' => 3,
        ]);
        Event::insert([
            'name' => 'Screen',
            'status' => 1,
            'structure_id' => 3,
        ]);
    }
}
