<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Apartamento', 'Casa', 'Ponto Comercial', 'Temporada'];

        foreach ($nomes as $nome) {
            Tipo::create([
                'nome' => $nome
            ]);
        };
    }
}
