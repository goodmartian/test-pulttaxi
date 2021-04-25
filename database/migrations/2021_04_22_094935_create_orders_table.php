<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_from');
            $table->string('address_to');
            $table->string('coordinate_from');
            $table->string('coordinate_to');
            $table->decimal('min_cost', 15, 2);
            $table->decimal('calculated_cost_by_kilometers', 15, 2);
            $table->decimal('calculated_cost_by_minutes', 15, 2);
            $table->decimal('total_cost', 15, 2);
            $table->tinyInteger('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
