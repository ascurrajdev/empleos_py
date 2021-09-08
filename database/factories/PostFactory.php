<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\EstadoConvocatoria;
use App\Models\CategoriaPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_id' => CategoriaPost::factory(),
            'user_id' => User::factory(),
            'titulo' => $this->faker->title(),
            'descripcion' => $this->faker->paragraph(),
            'estado_convocatoria_id' => EstadoConvocatoria::factory(),
            'activo' => 1,
        ];
    }
}
