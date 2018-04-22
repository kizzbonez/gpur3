<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('contact_no');
            $table->string('address');
            $table->string('country');
            $table->string('email');
            $table->date('dob');
            $table->string('beneficiary');
            $table->string('beneficiary_relation');
            $table->integer('sponsor_id');
            $table->integer('upline_id');
            $table->integer('position_id');
            $table->integer('ranking_id');
            $table->string('status_id');
            $table->string('at_id');
            $table->integer('is_sub');
            $table->integer('main_id');
            $table->integer('fl_state')->default(0);
            $table->integer('mlm_state')->default(0);
            $table->integer('sf_state')->default(0);
            $table->longtext('image_path');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
