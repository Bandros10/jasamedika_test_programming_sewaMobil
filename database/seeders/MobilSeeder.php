<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = array("Sedan","SUV","MPV","LCGC");
        $merek = array("Honda","Suzuki","Toyota","Mitsubishi","Daihatsu");
        for ($i=0; $i <=15 ; $i++) {
            Mobil::create([
                'model' => Arr::random($model),
                'merek' => Arr::random($merek),
                'nama_mobil' => fake()->cityPrefix,
                'nomor_plat' => fake()->numberBetween(0000000,9999999),
                'tarif' => fake()->numberBetween(000000,999999)
            ]);
        }
    }
}
