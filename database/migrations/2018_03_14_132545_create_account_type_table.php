<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

         Schema::create('actype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->float('points')->default(0);
            $table->float('commission')->default(0);
            $table->float('price')->default(0);
            $table->string('remarks');
          
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
        Schema::dropIfExists('actype');
    }
}
