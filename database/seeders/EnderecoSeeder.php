<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Endereco::create([
            'rua' => 'Av. dos Almirantes', 'numero' => '1234',
            'bairro' => 'Centro', 'imovel_id' => 1,
        ]);
    }
}
