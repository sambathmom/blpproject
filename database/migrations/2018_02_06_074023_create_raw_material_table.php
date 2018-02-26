<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material', function (Blueprint $table) {
            $table->increments('rm_id');
            $table->integer('user_id');
            $table->integer('staff_id');
            $table->integer('supplier_id');
            $table->integer('grade_id');
            $table->integer('staff_id');
            $table->string('rm_name');
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
        Schema::dropIfExists('raw_material');
    }
}
