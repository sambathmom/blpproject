<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShapedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaped_product', function (Blueprint $table) {
            $table->increments('sp_id');
            $table->integer('user_id');
            $table->integer('pm_id');
            $table->integer('staff_id');
            $table->integer('grade_id');
            $table->string('sp_name');
            $table->decimal('qty');
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
        Schema::dropIfExists('shaped_product');
    }
}
