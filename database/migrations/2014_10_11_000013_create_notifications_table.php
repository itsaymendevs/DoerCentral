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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();



            // 1: general
            $table->date('date')->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();

            $table->text('routeLink')->nullable(); // e.g. dashboard.singleCustomer
            $table->string('routePayload', 100)->nullable(); // e.g. IDs [1]




            // 1.2: isPreviewed
            $table->boolean('isPreviewed')->nullable()->default(0);





            // 1.3: isForDashboard - isForApplication
            $table->boolean('isForDashboard')->nullable()->default(0);
            $table->boolean('isForApplication')->nullable()->default(0);








            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('notifications');
    }
};
