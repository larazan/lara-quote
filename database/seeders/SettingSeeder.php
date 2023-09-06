<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'title' => 'Bayern Munchen',
                'meta_description' => 'lorem ipsum dolor sit amet',
                'meta_keyword' => 'bla bla bla bla',
                'description' => 'lorem ipsum dolor sit amet',
                'short_des' => 'lorem ipsum dolor sit amet',
                'address' => 'lorem ipsum dolor sit amet',
                'phone' => '08885885544',
                'email' => 'admin@mail.com',
                'twitter' => '@fcbayern',
                'facebook' => '@fcbayern',
                'instagram' => '@fcbayern',
            ]
        ];

        Setting::insert($data);
    }
}
