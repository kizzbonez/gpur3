<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


          Schema::create('commision_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commision_type',255);
            $table->float('value');
            $table->timestamp('timestmp')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('from_id');
            $table->integer('to_id');
            $table->string('remarks',255);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
           Schema::dropIfExists('commision_table');
    }
}
