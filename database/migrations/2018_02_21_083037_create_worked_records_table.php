<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkedRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worked_records', function (Blueprint $table) {
            $table->increments('wr_id');
            $table->integer('staff_id');
            $table->integer('lc_id');
            $table->integer('item_id');
            $table->integer('wt_id');
            $table->string('memo')->nullable();
            $table->decimal('qty');
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
        Schema::dropIfExists('worked_records');
    }
}
