<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\Flower;
use Faker\Factory as Faker;
class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->delete();
        $faker = Faker::create();
        $flower_ids = Flower::all()->pluck('id')->toArray();
        for( $i = 0; $i < 15; $i++){
            Region::create([
                'flower_id' => $faker->randomElement($flower_ids), //gia tri co rang buoc phai ton tai trong khoa chinh
                'region_name' => $faker->sentence((3)),
            ]);
        }
    }
}