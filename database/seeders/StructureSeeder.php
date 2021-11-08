<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Structure::insert(
            [
                'name' => 'Keilmuan'
            ]
        );
        Structure::insert(
            [
                'name' => 'Kaderisasi'
            ]
        );
        Structure::insert(
            [
                'name' => 'Mikat'
            ]
        );
        Structure::insert(
            [
                'name' => 'Infokom'
            ]
        );
    }
}
