<?php

namespace Database\Seeders;

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Willian Santana',
            'email' => 'willianleonardorv@gmail.com',
            'password' => bcrypt('Willian@1995'),
            'logo' => 'logtratorbrasil.png',
            'icone' => 'iconetratorbrasil.png',
            'login' => 'logintratorbrasil.png',
            'empresa' => 'Painel ADM Alavanca Web',
            'senha' => 'Willian@1995',
            'status' => 'Willian@1995',
            'cod_estabel' => '1',
            'admin' => 'Sim',
            'api_token' =>'6MWqljFoJ44beKzPRS6fqXT4MJxUDzZQYWG1ZCJmONRyh6QWx1JCZt2SzVlY',
        ]);

    }
}
