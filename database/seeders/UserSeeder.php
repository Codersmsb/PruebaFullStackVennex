<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useradmin=User::create([
            'name' =>'admin',
            'codigo' =>'adm1',
            'fullacces' =>'yes',
            'email' =>'admin@gmail.com',
            'password' =>Hash::make('password'),
        ]);

        $user1=User::create([
            'name' =>'user',
            'codigo' =>'user1',
            'fullacces' =>'no',
            'email' =>'user1@gmail.com',
            'password' =>Hash::make('password'),
        ]);
        
        $asesor = User::create([
            'name' => 'asesor',
            'codigo' => 'ase1',
            'fullacces' => 'asesor',
            'email' => 'asesor@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $asesor = User::create([
            'name' => 'gerente',
            'codigo' => 'ger1',
            'fullacces' => 'gerente',
            'email' => 'gerente@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
