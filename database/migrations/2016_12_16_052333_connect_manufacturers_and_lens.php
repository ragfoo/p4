<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectManufacturersAndLens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lens', function (Blueprint $table) {
          $table->integer('manufacturer_id')->unsigned();
          $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lens', function (Blueprint $table) {
          $table->dropForeign('lens_manufacturer_id_foreign');
          $table->dropColumn('manufacturer_id');
        });
    }
}
