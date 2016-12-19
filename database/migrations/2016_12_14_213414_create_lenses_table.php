<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lens', function (Blueprint $table) {

          # Increments method will make a Primary, Auto-Incrementing field.
          # Most tables start off this way
          $table->increments('id');

          $table->timestamps();

          $table->string('model');
          $table->string('type')->nullable();
          $table->string('mount');
          $table->float('max_aperture');
          $table->float('focal_length');
          $table->float('front_lens_diameter')->nullable();
          $table->integer('year')->nullable();
          $table->integer('blades')->nullable();
          $table->float('weight')->nullable();
          $table->float('min_object_distance')->nullable();
          $table->string('longname')->nullable();
          $table->string('logo_url')->nullable();


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lens');
    }
}
