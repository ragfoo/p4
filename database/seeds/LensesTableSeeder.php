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
          'longname' => 'nokton_10.5f0.95',
          'logo_url' => '/img/models/nokton/nokton_10.5mm.jpg',
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
          'longname' => 'nokton_25f0.95',
          'logo_url' => '/img/models/nokton/nokton_25mm.jpg',
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
          'longname' => 'nokton_42.5f0.95',
          'logo_url' => '/img/models/nokton/nokton_42.5mm.jpg',
      ]);


      $manufacturer_id = Manufacturer::where('name','=','Canon')->pluck('id')->first();
      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'CN-E',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'EF',
          'max_aperture' => 1.5,
          'focal_length' => 35,
          'longname' => 'cn-e_35f1.5',
          'logo_url' => 'https://static.bhphoto.com/images/images750x750/1380569907000_1005140.jpg',
      ]);


      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'CN-E',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'EF',
          'max_aperture' => 1.3,
          'focal_length' => 85,
          'longname' => 'cn-e_85f1.3',
          'logo_url' => 'https://static.bhphoto.com/images/images750x750/1460583234000_844735.jpg',
      ]);


      $manufacturer_id = Manufacturer::where('name','=','Rokinon')->pluck('id')->first();
      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Rokinon',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'EF',
          'max_aperture' => .95,
          'focal_length' => 42.5,
          'longname' => 'nokton_42.5f0.95',
          'logo_url' => '/img/models/nokton/nokton_42.5mm.jpg',
      ]);


      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'Rokinon',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'EF',
          'max_aperture' => 2.2,
          'focal_length' => 12,
          'longname' => 'rokinon_12f2.2',
          'logo_url' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQB_axvfKrpnwHf3Y_rF4lY-kfC1OQZCeZ8oDgEusO8A_J_WmLBssMgoxSMpNSymm0MIvrONXxg&usqp=CAY',
      ]);

      $manufacturer_id = Manufacturer::where('name','=','Sony')->pluck('id')->first();
      DB::table('lens')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'model' => 'CineAlta',
          'manufacturer_id' => $manufacturer_id,
          'type' => 'Fixed',
          'mount' => 'PL',
          'max_aperture' => 2,
          'focal_length' => 35,
          'longname' => 'cinealta_35f2',
          'logo_url' => 'http://cdn.shopify.com/s/files/1/0767/6771/products/Cine-Alta-35mm-edit_large.jpg?v=1471540732',
      ]);
    }
}
