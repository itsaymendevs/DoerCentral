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



            // : isProcessing
            $table->boolean('isProcessing')->nullable()->default(1);




            // :: hasAdminView - hasMasterView
            $table->boolean('hasAdminView')->nullable()->default(0);

            $table->boolean('hasMasterView')->nullable()->default(1);







            // ----------------------------------
            // ----------------------------------




            // 1: customerModule
            $table->boolean('customerModuleHasSettings')->nullable()->default(1);



            // 1.1: customerProfile
            $table->boolean('customerModuleHasVector')->nullable()->default(1);
            $table->boolean('customerModuleHasVIP')->nullable()->default(1);
            $table->boolean('customerModuleHasWallet')->nullable()->default(1);
            $table->boolean('customerModuleHasEnabled')->nullable()->default(1);
            $table->boolean('customerModuleHasManager')->nullable()->default(1);
            $table->boolean('customerModuleHasDriver')->nullable()->default(1);
            $table->boolean('customerModuleHasEditBundle')->nullable()->default(1);
            $table->boolean('customerModuleHasBundlesView')->nullable()->default(1);
            $table->boolean('customerModuleHasDynamicBundles')->nullable()->default(1);
            $table->boolean('customerModuleHasInvoicesView')->nullable()->default(1);



            // 1.2: customerMenu
            $table->boolean('customerModuleEditCalendar')->nullable()->default(1);
            $table->boolean('customerModuleHasSkip')->nullable()->default(1);


            // 1.3: customerAddress
            $table->boolean('customerModuleHasMultipleAddress')->nullable()->default(1);









            // ----------------------------------
            // ----------------------------------






            // 2: menuModule


            // 2.1: menuPlans
            $table->boolean('menuModuleHasHidePlan')->nullable()->default(1);





            // 2.2: menuBundles
            $table->boolean('menuModuleHasHideBundle')->nullable()->default(1);
            $table->boolean('menuModuleHasDynamicBundles')->nullable()->default(1);



            // 2.3: menuMeals
            $table->boolean('menuModuleHasMealFullView')->nullable()->default(1);



            // 2.4: menuBuilder
            $table->boolean('menuModuleHasBuilderExtraPictures')->nullable()->default(1);

            $table->boolean('menuModuleHasBuilderSizeOverview')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderExtraItems')->nullable()->default(1);

            $table->boolean('menuModuleHasBuilderMacros')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderReplacements')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderPercentage')->nullable()->default(1);

            $table->boolean('menuModuleHasBuilderCutlery')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderPackings')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderLabelPreview')->nullable()->default(1);
            $table->boolean('menuModuleHasBuilderContainerPreview')->nullable()->default(1);







            // 2.5: menuCalendar
            $table->boolean('menuModuleHasCreateCalendar')->nullable()->default(1);



            // 2.6: menuSetting
            $table->boolean('menuModuleHasDietTypes')->nullable()->default(1);
            $table->boolean('menuModuleHasTags')->nullable()->default(1);











            // ----------------------------------
            // ----------------------------------






            // 3: kitchenModule


            // 3.1: kitchenProduction / Packing
            $table->boolean('kitchenModuleHasPrintExcel')->nullable()->default(1);
            $table->boolean('kitchenModuleHasTypeSizeFilters')->nullable()->default(1);

            $table->boolean('kitchenModuleHasConfirmCooking')->nullable()->default(1);
            $table->boolean('kitchenModuleHasConfirmPacking')->nullable()->default(1);


            // 3.2: kitchenCheckout
            $table->boolean('kitchenModuleHasCheckoutTab')->nullable()->default(1);




            // 3.3: kitchenLabels / Containers
            $table->boolean('kitchenModuleHasLabelsTab')->nullable()->default(1);
            $table->boolean('kitchenModuleHasContainersTab')->nullable()->default(1);







            // ----------------------------------
            // ----------------------------------





            // 4: inventoryModule


            // 4.1: inventoryStock
            $table->boolean('inventoryModuleHasStock')->nullable()->default(1);






            // ----------------------------------
            // ----------------------------------





            // 5: deliveryModule


            // 5.1: deliveryDrivers
            $table->boolean('deliveryModuleHasDrivers')->nullable()->default(1);






            // ----------------------------------
            // ----------------------------------





            // 6: salesModule


            // 6.1: salesPromo
            $table->boolean('salesModuleHasPromoFixedAmount')->nullable()->default(1);
            $table->boolean('salesModuleHasPromoTogglers')->nullable()->default(1);



            // 6.2: salesReward
            $table->boolean('salesModuleHasRewards')->nullable()->default(1);









            // ----------------------------------
            // ----------------------------------





            // 7: extraModule

            // 7.1: extraModule
            $table->boolean('extraModuleHasModule')->nullable()->default(1);







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
