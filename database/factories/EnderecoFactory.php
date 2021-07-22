<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Imovel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rua' => $this->faker->address,
            'numero' => rand(1001, 9999),
            'complemento' => $this->faker->colorName,
            'bairro' => $this->faker->streetName,
            'imovel_id' => Imovel::factory()

        ];
    }
}
