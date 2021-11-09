<?php

namespace Database\Seeders;

use App\Models\EventUser;
use Illuminate\Database\Seeder;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventUser::insert([
            'user_id' => 1,
            'event_id' => 1,
        ]);
        EventUser::insert([
            'user_id' => 2,
            'event_id' => 2,
        ]);
        EventUser::insert([
            'user_id' => 3,
            'event_id' => 3,
        ]);
        EventUser::insert([
            'user_id' => 4,
            'event_id' => 4,
        ]);
        EventUser::insert([
            'user_id' => 5,
            'event_id' => 1,
        ]);
        EventUser::insert([
            'user_id' => 2,
            'event_id' => 3,
        ]);
        EventUser::insert([
            'user_id' => 7,
            'event_id' => 3,
        ]);
        EventUser::insert([
            'user_id' => 1,
            'event_id' => 3,
        ]);
        EventUser::insert([
            'user_id' => 2,
            'event_id' => 4,
        ]);
        EventUser::insert([
            'user_id' => 8,
            'event_id' => 4,
        ]);
    }
}
