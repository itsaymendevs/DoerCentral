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
        Schema::create('stock_purchases', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->string('PONumber', 100)->nullable();
            $table->string('purchaseID', 100)->nullable();
            $table->string('remarks', 255)->nullable();

            $table->date('receivingDate')->nullable();


            // 1.2: isConfirmed
            $table->boolean('isConfirmed')->nullable()->default(0);



            // 1.3: supplier
            $table->bigInteger('supplierId')->unsigned()->nullable();
            $table->foreign('supplierId')->references('id')->on('suppliers')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('stock_purchases');
    }
};
