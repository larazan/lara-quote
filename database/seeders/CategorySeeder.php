<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Poetry',
                'slug' => 'poetry',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Quote',
                'slug' => 'quote',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Sarcasm',
                'slug' => 'sarcasm',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Satire',
                'slug' => 'satire',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
        ];

        Category::insert($data);
    }
}
