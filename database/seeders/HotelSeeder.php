<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
/**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'address' => Str::random(10),
            'city' => Str::random(10),
            'category_id' => 1,
        ]);
    }
}
