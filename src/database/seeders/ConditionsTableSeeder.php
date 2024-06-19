<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['condition' => '新品'];
        DB::table('conditions')->insert($param);

        $param = ['condition' => '良好'];
        DB::table('conditions')->insert($param);

        $param = ['condition' => '良'];
        DB::table('conditions')->insert($param);

        $param = ['condition' => 'キズ・汚れあり'];
        DB::table('conditions')->insert($param);

        $param = ['condition' => 'ジャンク'];
        DB::table('conditions')->insert($param);
    }
}
