<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

           Schema::create('activation_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('or_si');
            $table->double('total_amount');
            $table->string('code')->unique();
            $table->string('acc_type');
            $table->integer('points')->default('0');
            $table->integer('at_id')->default('0');
            $table->integer('status_id')->default('0');
            $table->integer('user_id')->default('0');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activation_codes');
    
    }
}
