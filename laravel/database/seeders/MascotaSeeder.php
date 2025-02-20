<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Mascota::factory()->count(20)->create()->each(function($mascota){
            $cliente = Cliente::inRandomOrder()->first();
            $mascota->cliente_id = $cliente->id;
            $mascota->save();
        });
    }
}
