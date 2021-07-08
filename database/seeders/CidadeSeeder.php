<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = [
            'São Paulo - SP', 'Belo Horizonte - MG', 'Curitiba - PR',
            'Itajai - SC', 'Aparecida do Taboado - MS', 'São José do Rio Preto - SP'
        ];
        sort($nomes);
        foreach ($nomes as $nome) {
            Cidade::create([
                'nome' => $nome
            ]);
        }
    }
}
