<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingPlansTable extends Migration
{
    public function up()
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('min_cost', 15, 2);
            $table->decimal('cost_per_kilometer', 15, 2);
            $table->decimal('cost_per_minute', 15, 2);
            $table->unsignedInteger('free_kilometers_amount');
            $table->unsignedInteger('free_minutes_amount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricing_plans');
    }
}
