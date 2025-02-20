<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mascota;
use App\Models\Cliente;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //Creamos una variable miembro model de la clase mascota
    protected $model = Mascota::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'especie' => $this->faker->randomElement(['Perro', 'Gato', 'Cobaya', 'Pescao']),
            'edad' => $this->faker->numberBetween(1, 20),
            'precio' => $this->faker->randomFloat(2, 0.5, 300.0),
            'cliente_id' => null,
        ];
    }
}
