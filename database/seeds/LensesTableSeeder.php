<?php

use Illuminate\Database\Seeder;
use App\Manufacturer;

class LensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $manufacturer_id = Manufacturer::where('name','=','Voigtlander')->pluck('id')->first();

      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 10.5,
      ]);

      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 25,
      ]);

      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Nokton',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'Micro Four Thirds',
          'max_aperture' => .95,
          'focal_length' => 42.5,
      ]);
    }
}
