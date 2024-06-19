<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['category' => 'シャツ'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'パンツ'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'ワンピース'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'スカート'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'ジャケット'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'ソックス'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'メンズ'];
        DB::table('categories')->insert($param);

        $param = ['category' => 'レディス'];
        DB::table('categories')->insert($param);
    }
}
