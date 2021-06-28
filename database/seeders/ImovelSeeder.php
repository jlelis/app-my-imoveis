<?php

namespace Database\Seeders;

use App\Models\Imovel;
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
        Imovel::create([
            'titulo' => 'Casa para Aluguel',
            'terreno' => '300',
            'salas' => '2',
            'banheiros' => '3',
            'dormitorios' => '5',
            'garagens' => '3',
            'descricao' => 'casa para aluguel aceitamos fiador ou seguro aluguel',
            'preco' => '1600.00',
            'cidade_id' => 1,
            'tipo_id' => 2,
            'finalidade_id' => 1,

        ]);
    }
}
