<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarPricingPlaneTable extends Migration
{
    public function up()
    {
        Schema::create('car_pricing_plane', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('car_id')->constrained();
            $table->foreignId('pricing_plan_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_pricing_plane');
    }
}
