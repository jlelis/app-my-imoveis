<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\ImovelFoto;
use Illuminate\Database\Seeder;

class ImovelFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImovelFoto::factory()->create();
    }
}
