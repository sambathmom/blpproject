<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_product', function (Blueprint $table) {
            $table->increments('rp_id');
            $table->integer('rm_id');
            $table->integer('grade_id');
            $table->integer('user_id');
            $table->integer('staff_id');
            $table->string('rp_name');
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
        Schema::dropIfExists('raw_product');
    }
}
