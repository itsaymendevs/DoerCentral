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
        Schema::create('mail_configurations', function (Blueprint $table) {
            $table->id();


            // 1: general
            $table->text('username')->nullable();
            $table->text('password')->nullable();


            // 1.2: port - mailer - host - encryption
            $table->integer('port')->nullable();
            $table->string('mailer', 100)->nullable();
            $table->string('host', 255)->nullable();
            $table->string('encryption', 255)->nullable();




            // 1.3: isActive
            $table->boolean('isActive')->nullable()->default(1);




            // 2: sender - broadcasts cc.
            $table->string('senderName', 255)->nullable();
            $table->string('senderEmail', 255)->nullable();

            $table->string('broadcastEmail', 255)->nullable();
            $table->string('broadcastSecondEmail', 255)->nullable();
            $table->string('broadcastThirdEmail', 255)->nullable();








            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('mail_configurations');
    }
};
