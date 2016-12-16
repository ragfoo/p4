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
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Canon',
      ]);

      DB::table('manufacturers')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Nikon',
      ]);
    }
}
