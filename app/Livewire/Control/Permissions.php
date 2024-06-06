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

            // 1: general
            'hasAdminView' => 'Admin View',
            'hasMasterView' => 'Master View',
            'isProcessing' => 'Hide On-going Functions',






            // 1.1: dashboard
            'DashboardModuleHasClock' => 'Clock',
            'DashboardModuleHasRevenue' => 'Revenue',
            'DashboardModuleHasRevenuePerPlan' => 'Plans Revenue',
            'DashboardModuleHasCustomersPerPlan' => 'Customers Per Plan',
            'DashboardModuleHasUnassignedMeals' => 'Unassigned Meals',
            'DashboardModuleHasSoonExpiringCustomers' => 'Soon Expiring',
            'DashboardModuleHasLatestSubscribers' => 'Latest Subscribers',
            'DashboardModuleHasDeliveryDetails' => 'Delivery Details',
            'DashboardModuleHasItemChart' => 'Item Chart',
            'DashboardModuleHasDeliveryChart' => 'Delivery Chart',





            // 1.2: customer
            'customerModuleHasSettings' => 'General Settings',
            'customerModuleHasVector' => 'Vector Picture',
            'customerModuleHasVIP' => 'VIP Checkbox',
            'customerModuleHasEnabled' => 'Enable Checkbox',
            'customerModuleHasWallet' => 'Manage Wallet',
            'customerModuleHasManager' => 'Manager Option',
            'customerModuleHasDriver' => 'Driver Option',
            'customerModuleHasEditBundle' => 'Edit Bundle',
            'customerModuleHasBundlesView' => 'View Bundle',
            'customerModuleHasDynamicBundles' => 'Dynamic Bundles',
            'customerModuleHasInvoicesView' => 'View Invoices',

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
            'kitchenModuleHasLabelsTab' => 'Labels Tab',
            'kitchenModuleHasContainersTab' => 'Containers Tab',




            // 1.5: inventory - delivery
            'inventoryModuleHasStock' => 'Supplier & Stock',
            'deliveryModuleHasVehiclePromotion' => 'Vehicle Promotion',
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
            'menuModuleHasMealTypeFilters' => 'Meal-Type Filters',

            'menuModuleHasBuilderExtraPictures' => 'Builder Extra Pictures',

            'menuModuleHasBuilderSizeOverview' => 'Builder Size Overview',
            'menuModuleHasBuilderExtraItems' => 'Builder Extra Items',



            'menuModuleHasBuilderMacros' => 'Builder Macros',
            'menuModuleHasBuilderReplacements' => 'Builder Replacements',
            'menuModuleHasBuilderPercentage' => 'Builder Percentage',
            'menuModuleHasBuilderConversion' => 'Builder Conversion',

            'menuModuleHasBuilderCutlery' => 'Builder Cutlery',
            'menuModuleHasBuilderPackings' => 'Builder Packings',
            'menuModuleHasBuilderLabelPreview' => 'Builder Label Preview',
            'menuModuleHasBuilderContainerPreview' => 'Builder Container Preview',



            // 1.8: extra
            'extraModuleHasModule' => 'Extra Module',
            'extraModuleHasManagement' => 'Management',
            'extraModuleHasFinance' => 'Finance',
            'extraModuleHasReports' => 'Reports',

            'extraModuleHasDepartments' => 'Departments',
            'extraModuleHasActivityLog' => 'Activity Log',

            'extraModuleHasWebsite' => 'App & Website',
            'extraModuleHasBlogs' => 'Website Blogs',
            'extraModuleHasBanners' => 'Website Banners',
            'extraModuleHasPaymentDetails' => 'Payment Details',

        ];






        // --------------------------------------------------
        // --------------------------------------------------
        // --------------------------------------------------
        // --------------------------------------------------







        // 2: getPermissions



        // :: general
        $generalPermissions = VersionPermission::get(['hasAdminView', 'hasMasterView', 'isProcessing'])->first()->toArray();




        // 2.1: dashboard
        $dashboardPermissions = VersionPermission::get(['DashboardModuleHasClock', 'DashboardModuleHasRevenue', 'DashboardModuleHasRevenuePerPlan', 'DashboardModuleHasCustomersPerPlan', 'DashboardModuleHasUnassignedMeals', 'DashboardModuleHasSoonExpiringCustomers', 'DashboardModuleHasLatestSubscribers', 'DashboardModuleHasDeliveryDetails', 'DashboardModuleHasItemChart', 'DashboardModuleHasDeliveryChart'])->first()->toArray();






        // 2.2: customer
        $customerPermissions = VersionPermission::get(['customerModuleHasSettings', 'customerModuleHasVector', 'customerModuleHasVIP', 'customerModuleHasEnabled', 'customerModuleHasWallet', 'customerModuleHasManager', 'customerModuleHasDriver', 'customerModuleHasEditBundle', 'customerModuleHasBundlesView', 'customerModuleHasDynamicBundles', 'customerModuleHasInvoicesView', 'customerModuleEditCalendar', 'customerModuleHasSkip', 'customerModuleHasMultipleAddress'])->first()->toArray();




        // 2.3: calendarSettings
        $calendarSettingPermissions = VersionPermission::get(['menuModuleHasCreateCalendar', 'menuModuleHasDietTypes', 'menuModuleHasTags'])->first()->toArray();





        // 2.4: kitchen
        $kitchenPermissions = VersionPermission::get(['kitchenModuleHasPrintExcel', 'kitchenModuleHasTypeSizeFilters', 'kitchenModuleHasConfirmCooking', 'kitchenModuleHasConfirmPacking', 'kitchenModuleHasCheckoutTab', 'kitchenModuleHasLabelsTab', 'kitchenModuleHasContainersTab'])->first()->toArray();





        // 2.5: inventoryAndDelivery
        $inventoryPermissions = VersionPermission::get(['inventoryModuleHasStock', 'deliveryModuleHasVehiclePromotion', 'deliveryModuleHasDrivers'])->first()->toArray();








        // 2.6: sales
        $salesPermissions = VersionPermission::get(['salesModuleHasPromoFixedAmount', 'salesModuleHasPromoTogglers', 'salesModuleHasRewards'])->first()->toArray();




        // 2.7: planAndBuilder
        $planBuilderPermissions = VersionPermission::get(['menuModuleHasHidePlan', 'menuModuleHasHideBundle', 'menuModuleHasDynamicBundles', 'menuModuleHasMealFullView', 'menuModuleHasMealTypeFilters', 'menuModuleHasBuilderExtraPictures', 'menuModuleHasBuilderSizeOverview', 'menuModuleHasBuilderExtraItems', 'menuModuleHasBuilderMacros', 'menuModuleHasBuilderReplacements', 'menuModuleHasBuilderPercentage', 'menuModuleHasBuilderConversion', 'menuModuleHasBuilderCutlery', 'menuModuleHasBuilderPackings', 'menuModuleHasBuilderLabelPreview', 'menuModuleHasBuilderContainerPreview'])->first()->toArray();







        // 2.8: extra
        $extraPermissions = VersionPermission::get(['extraModuleHasModule', 'extraModuleHasManagement', 'extraModuleHasFinance', 'extraModuleHasReports', 'extraModuleHasDepartments', 'extraModuleHasActivityLog', 'extraModuleHasWebsite', 'extraModuleHasBlogs', 'extraModuleHasBanners', 'extraModuleHasPaymentDetails'])->first()->toArray();





        return view('livewire.control.permissions', compact('generalPermissions', 'dashboardPermissions', 'calendarSettingPermissions', 'customerPermissions', 'kitchenPermissions', 'inventoryPermissions', 'salesPermissions', 'planBuilderPermissions', 'extraPermissions', 'displayTitles'));



    } // end function



} // end class
