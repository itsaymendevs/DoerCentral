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
        Schema::create('client_leads', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('serial', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();

            $table->string('users', 100)->nullable();

            $table->string('country', 100)->nullable();
            $table->string('address', 255)->nullable();



            // 1.1: serials
            $table->string('PIN', 100)->nullable();
            $table->string('licenseNumber', 100)->nullable();



            // 1.2: websiteURL - phone - landline
            $table->text('websiteURL')->nullable();

            $table->string('phone', 100)->nullable();
            $table->string('phoneKey', 100)->nullable();

            $table->string('landline', 100)->nullable();
            $table->string('landlineKey', 100)->nullable();




            // 1.3: contactPerson
            $table->string('contactPerson', 255)->nullable();

            $table->string('contactPersonPhone', 100)->nullable();
            $table->string('contactPersonPhoneKey', 100)->nullable();

            $table->string('contactPersonWhatsapp', 100)->nullable();
            $table->string('contactPersonWhatsappKey', 100)->nullable();



            // 1.4: price - plan - or features
            $table->double('price', 15)->unsigned()->nullable()->default(0);

            $table->bigInteger('planId')->unsigned()->nullable();
            $table->foreign('planId')->references('id')->on('plans')->onDelete('set null');

            $table->text('features')->nullable();





            // 1.5: tardeFile - isConfirmed
            $table->text('tradeFile')->nullable();
            $table->boolean('isConfirmed')->nullable()->default(false);



            // 1.6: status
            $table->string('status', 100)->nullable()->default('pending');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('client_leads');
    }
};
