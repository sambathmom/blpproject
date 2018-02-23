<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dried_product', function (Blueprint $table) {
            $table->increments('dp_id');
            $table->integer('pm_id');
            $table->integer('staff_id');
            $table->integer('grade_id');
            $table->integer('user_id');
            $table->string('dp_name');
            $table->integer('qty');
            $table->decimal('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dried_product');
    }
}
