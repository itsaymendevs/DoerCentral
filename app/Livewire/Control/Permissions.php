<?php

namespace App\Livewire\Control;

use App\Models\VersionPermission;
use Livewire\Component;

class Permissions extends Component
{



    public function update($permissionName)
    {


        // :: directUpdate


        // 1: get instance
        $versionPermission = VersionPermission::first();

        $versionPermission->{$permissionName} = ! boolval($versionPermission->{$permissionName});
        $versionPermission->save();




        // 1.3: render
        $this->render();


    } // end function








    // ---------------------------------------------------------





    public function render()
    {




        // 1: displayTitles
        $displayTitles = [

            // 1.1: general
            'hasAdminView' => 'Admin View',
            'hasMasterView' => 'Master View',
            'isProcessing' => 'Hide On-going Functions',


            // 1.2: customer
            'customerModuleHasVector' => 'Vector Picture',
            'customerModuleHasVIP' => 'VIP Checkbox',
            'customerModuleHasEnabled' => 'Enable Checkbox',
            'customerModuleHasWallet' => 'Manage Wallet',
            'customerModuleHasManager' => 'Manager Option',
            'customerModuleHasDriver' => 'Driver Option',
            'customerModuleHasEditBundle' => 'Edit Bundle',
            'customerModuleHasBundlesView' => 'View Bundle',
            'customerModuleEditCalendar' => 'Edit Calendar',
            'customerModuleHasSkip' => 'Skip Day',
            'customerModuleHasMultipleAddress' => 'Multiple Address',



            // 1.3: calendar - settings
            'menuModuleHasCreateCalendar' => 'Create Calendar',
            'menuModuleHasDietTypes' => 'Manage Diets',
            'menuModuleHasTags' => 'Manage Tags',



            // 1.4: kitchen
            'kitchenModuleHasPrintExcel' => 'Print - Excel',
            'kitchenModuleHasTypeSizeFilters' => 'Type & Size Filters',
            'kitchenModuleHasConfirmCooking' => 'Confirm Cooking',
            'kitchenModuleHasConfirmPacking' => 'Confirm Packing',
            'kitchenModuleHasCheckoutTab' => 'Checkout Tab',



            // 1.5: inventory - delivery
            'inventoryModuleHasStock' => 'Supplier & Stock',
            'deliveryModuleHasDrivers' => 'Delivery Zones',



            // 1.6: sales
            'salesModuleHasPromoFixedAmount' => 'Promo - Fixed Amount',
            'salesModuleHasPromoTogglers' => 'Promo - Togglers',
            'salesModuleHasRewards' => 'Rewards Tab',




            // 1.7: plan - builder
            'menuModuleHasHidePlan' => 'Hide Plan',
            'menuModuleHasHideBundle' => 'Hide Bundle',
            'menuModuleHasDynamicBundles' => 'Dynamic Bundle',
            'menuModuleHasMealFullView' => 'Full Meal Preview',
            'menuModuleHasBuilderExtraPictures' => 'Builder Extra Pictures',
            'menuModuleHasBuilderMacros' => 'Builder Macros & Replacement',
            'menuModuleHasBuilderPercentage' => 'Builder Percentage',
            'menuModuleHasBuilderPackings' => 'Builder Packings',
            'menuModuleHasBuilderLabelPreview' => 'Builder Label Preview',
            'menuModuleHasBuilderContainerPreview' => 'Builder Container Preview',



            // 1.8: extra
            'extraModuleHasModule' => 'Extra Module',

        ];






        // --------------------------------------------------
        // --------------------------------------------------
        // --------------------------------------------------
        // --------------------------------------------------







        // 2: getPermissions



        // 2.1: general
        $generalPermissions = VersionPermission::get(['hasAdminView', 'hasMasterView', 'isProcessing'])->first()->toArray();




        // 2.2: customer
        $customerPermissions = VersionPermission::get(['customerModuleHasVector', 'customerModuleHasVIP', 'customerModuleHasEnabled', 'customerModuleHasWallet', 'customerModuleHasManager', 'customerModuleHasDriver', 'customerModuleHasEditBundle', 'customerModuleHasBundlesView', 'customerModuleEditCalendar', 'customerModuleHasSkip', 'customerModuleHasMultipleAddress'])->first()->toArray();




        // 2.3: calendarSettings
        $calendarSettingPermissions = VersionPermission::get(['menuModuleHasCreateCalendar', 'menuModuleHasDietTypes', 'menuModuleHasTags'])->first()->toArray();





        // 2.4: kitchen
        $kitchenPermissions = VersionPermission::get(['kitchenModuleHasPrintExcel', 'kitchenModuleHasTypeSizeFilters', 'kitchenModuleHasConfirmCooking', 'kitchenModuleHasConfirmPacking', 'kitchenModuleHasCheckoutTab'])->first()->toArray();





        // 2.5: inventoryAndDelivery
        $inventoryPermissions = VersionPermission::get(['inventoryModuleHasStock', 'deliveryModuleHasDrivers'])->first()->toArray();








        // 2.6: sales
        $salesPermissions = VersionPermission::get(['salesModuleHasPromoFixedAmount', 'salesModuleHasPromoTogglers', 'salesModuleHasRewards'])->first()->toArray();




        // 2.7: planAndBuilder
        $planBuilderPermissions = VersionPermission::get(['menuModuleHasHidePlan', 'menuModuleHasHideBundle', 'menuModuleHasDynamicBundles', 'menuModuleHasMealFullView', 'menuModuleHasBuilderExtraPictures', 'menuModuleHasBuilderMacros', 'menuModuleHasBuilderPercentage', 'menuModuleHasBuilderPackings', 'menuModuleHasBuilderLabelPreview', 'menuModuleHasBuilderContainerPreview'])->first()->toArray();







        // 2.8: extra
        $extraPermissions = VersionPermission::get(['extraModuleHasModule'])->first()->toArray();





        return view('livewire.control.permissions', compact('generalPermissions', 'calendarSettingPermissions', 'customerPermissions', 'kitchenPermissions', 'inventoryPermissions', 'salesPermissions', 'planBuilderPermissions', 'extraPermissions', 'displayTitles'));



    } // end function



} // end class
