<?php

namespace Database\Seeders;

use App\Models\Imovel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(40)->create()->each(function($user){
        //     $user->imoveis()->saveMany(Imovel::factory())->make();
        // });
//        if (!App::environment('local')) {
            User::create([
                'name' => 'Dr. Rollin Lynch',
                'email' => 'welch.oma@example.com',
                'email_verified_at'=>now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'NsSgeLzftd',
            ]);
//        } else {
//            User::factory(40)->create()->each(function ($user) {
//                $user->imoveis()->saveMany(Imovel::factory())->make();
//            });
//        }
    }
}
