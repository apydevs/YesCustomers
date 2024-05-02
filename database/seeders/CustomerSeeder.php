<?php

namespace Apydevs\Customers\Database\Seeders;

use Apydevs\Customers\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Customer::factory(10)
//          ->has(
//            \App\Models\Order::factory()->count(3)->has(
//                \App\Models\OrderItem::factory()->count(5))
//          )
          ->create();
    }
}
