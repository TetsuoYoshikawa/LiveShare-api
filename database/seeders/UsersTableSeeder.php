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
            'image_url' => 'iUldgt6v2AYGCE6u28vukpXP6qMrVvafNLIo2bpG.png',
            'password' => Hash::make('adminadmin'),
        ];
        User::insert($param);
        $param = [
            'id' => 2,
            'name' => 'Test',
            'email' => 'test@test',
            'image_url' => 'iUldgt6v2AYGCE6u28vukpXP6qMrVvafNLIo2bpG.png',
            'password' => Hash::make('testtest'),
        ];
        User::insert($param);
    }
}
