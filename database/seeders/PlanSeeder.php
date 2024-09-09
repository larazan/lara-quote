<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Plan::create([
            'name'              => 'Monthly Plan',
            'slug'              => 'monthly-plan',
            'stripe_name'       => 'monthly',
            'stripe_product_id' => 'prod_QoMI7UAr1AvPNv',
            'stripe_price_id'   => 'price_1PwjaCRuHZMkhupInjasacoA',
            'price'             => 1,
            'abbreviation'      => '/month',
            'type'              => 'paid',
            'features'          => ['Everything in Free', 'Phasellus tellus', 'Praesent faucibus', 'Aenean et lectus blandit'],
            'created_at'        => Carbon::now()
        ]);

        Plan::create([
            'name'              => 'Yearly Plan',
            'slug'              => 'yearly-plan',
            'stripe_name'       => 'yearly',
            'stripe_product_id' => 'prod_QoMJDH5xO5gA5J',
            'stripe_price_id'   => 'price_1PwjbERuHZMkhupIeHZiDEWJ',
            'price'             => 10,
            'abbreviation'      => '/year',
            'type'              => 'paid',
            'features'          => ['Everything in Free', 'Phasellus tellus', 'Praesent faucibus', 'Aenean et lectus blandit'],
            'created_at'        => Carbon::now()
        ]);
    }
}
