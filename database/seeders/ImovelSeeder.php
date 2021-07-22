<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Imovel;
use App\Models\ImovelFoto;
use Database\Factories\ImovelFotoFactory;
use Illuminate\Database\Seeder;

class ImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Imovel::factory(36)
      ->has(Endereco::factory(),'endereco')
      ->has(ImovelFoto::factory()->count(3))
      ->create();


        // Imovel::factory(5)->create()
        //     ->each(function ($end) {
        //         Endereco::factory()->create(['imovel_id' => $end->id]);
        //     })
        //     ->each(function ($i) {
        //         ImovelFoto::factory()->create(['imovel_id' => $i->id]);
        //     });
    }
}
