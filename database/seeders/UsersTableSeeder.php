<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ];
        User::insert($param);

        $param = [
            'id' => 2,
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);

        $param = [
            'id' => 3,
            'name' => 'Yuki',
            'email' => 'yuki@yuki.com',
            'password' => Hash::make('yukiyuki'),
        ];
        User::insert($param);

        $param = [
            'id' => 4,
            'name' => 'Tetsuo',
            'email' => 'tetsuo@tetsuo.com',
            'password' => Hash::make('tetsuotetsuo'),
        ];
        User::insert($param);

        $param = [
            'id' => 5,
            'name' => 'Nao',
            'email' => 'nao@nao.com',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);

        $param = [
            'id' => 6,
            'name' => 'Rei',
            'email' => 'rei@rei.com',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);

        $param = [
            'id' => 7,
            'name' => 'Akira',
            'email' => 'akira@akira.com',
            'password' => Hash::make('yukiyuki'),
        ];
        User::insert($param);

        $param = [
            'id' => 8,
            'name' => 'Shiba',
            'email' => 'shiba@shiba.com',
            'password' => Hash::make('tetsuotetsuo'),
        ];
        User::insert($param);

        $param = [
            'id' => 9,
            'name' => 'Reo',
            'email' => 'reo@reo.com',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);

        $param = [
            'id' => 10,
            'name' => 'Konan',
            'email' => 'kon@kon.com',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);
    }
}
