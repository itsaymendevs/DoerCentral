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
        Schema::create('version_permissions', function (Blueprint $table) {
            $table->id();



            // 1: isProcessing
            $table->boolean('isProcessing')->nullable()->default(1);




            // ----------------------------------
            // ----------------------------------




            // 2: hasMasterView - hasWallet - hasDynamicBundle
            $table->boolean('hasMasterView')->nullable()->default(1);

            $table->boolean('hasWallet')->nullable()->default(1);

            $table->boolean('hasDynamicBundle')->nullable()->default(1);





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('version_permissions');
    }
};
