<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
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
            'name' => '行ってきました！'
        ];
        DB::table('tags')->insert($param);

        $param = [
            'id' => 2,
            'name' => '行きます！'
        ];
        DB::table('tags')->insert($param);

        $param = [
            'id' => 3,
            'name' => '行きませんか？'
        ];
        DB::table('tags')->insert($param);
    }
}
