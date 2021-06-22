<?php

namespace Database\Seeders;

use App\Models\Proximidade;
use Illuminate\Database\Seeder;

class ProximidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Banco', 'Praça', 'Posto de Combustivel', 'Mercado', 'Posto de Saúde', 'Padaria'];
        foreach ($nomes as $nome) {
            Proximidade::create([
                'nome' => $nome
            ]);
        }
    }
}
