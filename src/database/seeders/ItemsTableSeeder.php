<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'condition_id' => 2,
            'name' => 'メンズシャツ',
            'explanation' => '状態は良好です。入金確認が出来次第発送いたします。',
            'price' => 8000,
            'img_url' => 'storage/image/shirt_mens.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'レディスシャツ',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 12000,
            'img_url' => 'storage/image/shirt_ladies.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 4,
            'name' => 'メンズパンツ',
            'explanation' => '若干汚れがありますが、あまり目立たない汚れです。入金確認が出来次第発送いたします。',
            'price' => 2000,
            'img_url' => 'storage/image/pants_mens.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 2,
            'name' => 'レディスパンツ',
            'explanation' => 'ほぼ新品です。入金確認が出来次第発送いたします。',
            'price' => 9000,
            'img_url' => 'storage/image/pants_ladies.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 3,
            'name' => 'ワンピース',
            'explanation' => '状態は良いです。入金確認が出来次第発送いたします。',
            'price' => 10000,
            'img_url' => 'storage/image/one_piece.jpg'
        ];
        DB::table('items')->insert($param);
    }
}
