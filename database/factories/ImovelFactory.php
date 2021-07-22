<?php

namespace Database\Factories;

use App\Models\Imovel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imovel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name,
            'terreno' => rand(40, 400),
            'salas' => rand(1, 5),
            'banheiros' => rand(1, 5),
            'dormitorios' => rand(1, 5),
            'garagens' => rand(1, 5),
            'descricao' => $this->faker->text,
            'preco' => rand(1500, 3500),
            'cidade_id' => rand(1, 5),
            'tipo_id' => rand(1, 2),
            'finalidade_id' => rand(1, 2),
            'user_id'=>User::factory(),

        ];
    }
}
