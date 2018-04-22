<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('activation_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('user_id')->default(0);
            $table->string('ac_type');
            $table->timestamp('timestmp')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('remarks')->default("");
          
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
          Schema::dropIfExists('activation_history');
    }
}
