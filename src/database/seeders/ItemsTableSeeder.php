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

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'スカート',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 11000,
            'img_url' => 'storage/image/skirt.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 2,
            'name' => 'メンズジャケット',
            'explanation' => '状態は良好です。入金確認が出来次第発送いたします。',
            'price' => 12000,
            'img_url' => 'storage/image/jacket_mens.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 3,
            'name' => 'レディスジャケット',
            'explanation' => '状態は良いです。入金確認が出来次第発送いたします。',
            'price' => 10000,
            'img_url' => 'storage/image/jacket_ladies.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'メンズソックス',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 1000,
            'img_url' => 'storage/image/socks_mens.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'レディスソックス',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 1200,
            'img_url' => 'storage/image/socks_ladies.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 3,
            'name' => 'シャツメンズ',
            'explanation' => '状態は良いです。入金確認が出来次第発送いたします。',
            'price' => 6000,
            'img_url' => 'storage/image/shirt_mens.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 4,
            'name' => 'シャツレディス',
            'explanation' => '若干汚れがありますが、あまり目立たない汚れです。入金確認が出来次第発送いたします。',
            'price' => 3000,
            'img_url' => 'storage/image/shirt_ladies.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'パンツメンズ',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 12000,
            'img_url' => 'storage/image/pants_mens.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 3,
            'name' => 'パンツレディス',
            'explanation' => '状態は良いです。入金確認が出来次第発送いたします。',
            'price' => 7000,
            'img_url' => 'storage/image/pants_ladies.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'ワンピース新作',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 20000,
            'img_url' => 'storage/image/one_piece.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 2,
            'name' => 'スカート中古',
            'explanation' => '状態は良好です。入金確認が出来次第発送いたします。',
            'price' => 9000,
            'img_url' => 'storage/image/skirt.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'ジャケットメンズ',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 16000,
            'img_url' => 'storage/image/jacket_mens.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 2,
            'name' => 'ジャケットレディス',
            'explanation' => 'ほぼ新品です。入金確認が出来次第発送いたします。',
            'price' => 15000,
            'img_url' => 'storage/image/jacket_ladies.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'ソックスメンズ',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 1000,
            'img_url' => 'storage/image/socks_mens.jpg',
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'condition_id' => 1,
            'name' => 'ソックスレディス',
            'explanation' => '新品です。入金確認が出来次第発送いたします。',
            'price' => 1200,
            'img_url' => 'storage/image/socks_ladies.jpg',
        ];
        DB::table('items')->insert($param);
    }
}
