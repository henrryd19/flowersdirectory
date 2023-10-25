<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Flower;
use Faker\Factory as Faker;

class FlowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flowers')->delete(); //xoa du lieu dang co de id khong bi trung,
        $faker = Faker::create();
        for( $i = 0; $i < 15; $i++){
            Flower::create([
                'name' => $faker->name,
                'description' => $faker->paragraph(1, true),
                'image_url' => $faker->imageUrl(640, 480, 'flowers', true ),
            ]);
        }
    }
}