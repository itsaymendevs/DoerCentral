<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 1: general
            $table->string('name', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->text('password')->nullable();



            // 1.2: imageFile - isActive
            $table->text('imageFile')->nullable();
            $table->boolean('isActive')->nullable()->default(1);



            // 1.3: role - city
            $table->bigInteger('roleId')->unsigned()->nullable();
            $table->foreign('roleId')->references('id')->on('roles')->onDelete('set null');


            $table->bigInteger('cityId')->unsigned()->nullable();
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('set null');




            // 2: token
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
