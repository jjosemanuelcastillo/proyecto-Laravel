<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Vehiculo::class;

    public function definition()
    {
        return [
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'BMW', 'Mercedes', 'Audi']),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(2000, 2024), // Asegura un año reciente
            'precio' => $this->faker->randomFloat(2, 5000, 1000000), // Precio con 2 decimales
            'stock' => $this->faker->numberBetween(0, 50) // Stock más realista
        ];
        
    }
}
