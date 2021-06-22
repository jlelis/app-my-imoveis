<?php

namespace Database\Seeders;

use App\Models\Finalidade;
use Illuminate\Database\Seeder;

class FinalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Aluguel', 'Venda'];
        foreach ($nomes as $nome) {
            Finalidade::create([
                'nome' => $nome
            ]);
        }
    }
}
