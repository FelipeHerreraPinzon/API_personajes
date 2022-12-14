<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personaje;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personaje =new Personaje();

        $personaje->nombre = "felipe";
        $personaje->profesion = "developer";
        $personaje->imagen = "foto.jpg";

        $personaje->save();

    }
}
