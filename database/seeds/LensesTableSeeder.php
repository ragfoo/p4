<?php

use Illuminate\Database\Seeder;

class LensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('lenses')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer' => 'Voigtlander',
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 10.5,
      ]);

      DB::table('lenses')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer' => 'Voigtlander',
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 25,
      ]);

      DB::table('lenses')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer' => 'Voigtlander',
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 42.5,
      ]);
    }
}
