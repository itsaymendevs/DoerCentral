<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->string('name', 255)->nullable();
            $table->text('imageFile')->nullable();


            // 1.2: client - server (DOER)
            $table->text('clientURL')->nullable();
            $table->text('serverURL')->nullable();



            // 1.3: website - application
            $table->text('websiteURL')->nullable();
            $table->text('applicationURL')->nullable();





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('profiles');
    }
};
