<?php

namespace Database\Seeders;

use App\Models\AdsImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdsImage::factory()->count(5)->create();
    }
}
