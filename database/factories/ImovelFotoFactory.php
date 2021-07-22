<?php

namespace Database\Factories;

use App\Models\Imovel;
use App\Models\ImovelFoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelFotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImovelFoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path_images' => $this->faker->imageUrl(640, 480),
            'imovel_id' => Imovel::factory()
        ];
    }
}
