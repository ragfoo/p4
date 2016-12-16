<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Voigtlander',
      'logo' => '/img/logos/voigtlanderlogo-728x200.jpg',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Canon',
      'logo' => '/img/logos/Canon_logo.png',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Nikon',
      'logo' => '/img/logos/nikon_logo.jpg',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Rokinon',
      'logo' => '/img/logos/Rokinon_Logo.jpg',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Sony',
      'logo' => '/img/logos/Sony_logo.png',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Zeiss',
      'logo' => '/img/logos/zeiss-logo.png',
      ]);
    }
}
