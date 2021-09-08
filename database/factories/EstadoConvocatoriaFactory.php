<?php

namespace Database\Factories;

use App\Models\EstadoConvocatoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoConvocatoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstadoConvocatoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => 'proceso'
        ];
    }
}
