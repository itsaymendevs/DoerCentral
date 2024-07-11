<?php

use App\Events\CustomerSubscriptionEvent;
use App\Livewire\Control\Permissions;
use App\Livewire\CustomerPortal\CustomerAddresses;
use App\Livewire\CustomerPortal\CustomerCalendar;
use App\Livewire\CustomerPortal\CustomerDeliveries;
use App\Livewire\CustomerPortal\CustomerGeneral;
use App\Livewire\Dashboard\Delivery\DeliveryCities;
use App\Livewire\Dashboard\Delivery\DeliveryDrivers;
use App\Livewire\Dashboard\Delivery\DeliveryToday;
use App\Livewire\Dashboard\Delivery\DeliveryVehicles;
use App\Livewire\Dashboard\Delivery\DeliveryZones;
use App\Livewire\Dashboard\Extra\Finance\PaymentMethods;
use App\Livewire\Dashboard\Extra\Reports\ReportsDelivery;
use App\Livewire\Dashboard\Inventory\Comparisons;
use App\Livewire\Dashboard\Inventory\Configurations;
use App\Livewire\Dashboard\Inventory\Ingredients;
use App\Livewire\CustomerPortal\CustomerHome;
use App\Livewire\CustomerPortal\CustomerMenu;
use App\Livewire\Dashboard\Customers;
use App\Livewire\Dashboard\Customers\CustomersSubscriptionSettings;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomer;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomerAddresses;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomerCalendar;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomerDeliveries;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomerHistory;
use App\Livewire\Dashboard\Customers\Manage\SingleCustomerMenu;
use App\Livewire\Dashboard\Customers\CustomersStateOfAccount;
use App\Livewire\Dashboard\Delivery;
use App\Livewire\Dashboard\Extra\Finance\PaymentDetails;
use App\Livewire\Dashboard\Extra\Management\ActivityLog;
use App\Livewire\Dashboard\Extra\Management\Roles;
use App\Livewire\Dashboard\Extra\Management\Users;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Inventory\PurchaseOrders;
use App\Livewire\Dashboard\Inventory\Purchases;
use App\Livewire\Dashboard\Inventory\Settings\ConversionIngredients;
use App\Livewire\Dashboard\Inventory\Stock;
use App\Livewire\Dashboard\Inventory\Suppliers;
use App\Livewire\Dashboard\Inventory\Settings as InventorySettings;
use App\Livewire\Dashboard\ManageKitchen\KitchenContainers;
use App\Livewire\Dashboard\ManageKitchen\KitchenItems;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels\KitchenLabelsCreate;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels\KitchenLabelsEdit;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayCheckout;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayDelivery;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayLabel;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayPacking;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayPreparations;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayQuantities;
use App\Livewire\Dashboard\Menu\Addons;
use App\Livewire\Dashboard\Menu\Builder;
use App\Livewire\Dashboard\Menu\Calendars;
use App\Livewire\Dashboard\Menu\Calendars\SingleCalendar;
use App\Livewire\Dashboard\Menu\IngredientsList;
use App\Livewire\Dashboard\Menu\Items\Drinks;
use App\Livewire\Dashboard\Menu\Items\Meals;
use App\Livewire\Dashboard\Menu\Items\Sauces;
use App\Livewire\Dashboard\Menu\Items\Sides;
use App\Livewire\Dashboard\Menu\Items\Snacks;
use App\Livewire\Dashboard\Menu\Items\SubRecipes;
use App\Livewire\Dashboard\Menu\Lists;
use App\Livewire\Dashboard\Menu\Plans;
use App\Livewire\Dashboard\Menu\Plans\Manage\Bundles;
use App\Livewire\Dashboard\Menu\Plans\Manage\RangeSizes;
use App\Livewire\Dashboard\Menu\Plans\Manage\Calendars as PlanCalendars;
use App\Livewire\Dashboard\Menu\ProductionBuilder;
use App\Livewire\Dashboard\Menu\Recipes;
use App\Livewire\Dashboard\Menu\Settings;
use App\Livewire\Dashboard\Promos;
use App\Livewire\Dashboard\Extra\WebApps\Blogs;
use App\Livewire\Dashboard\Extra\WebApps\Blogs\BlogsCreate;
use App\Livewire\Dashboard\Extra\WebApps\Blogs\BlogsView;
use App\Livewire\Dashboard\Extra\WebApps\Settings as ExtraSettings;
use App\Livewire\Dashboard\Stock\Items\ItemsContainers;
use App\Livewire\Dashboard\Stock\Items\ItemsLabels;
use App\Livewire\Dashboard\Stock\Items\ItemsLabels\ItemsLabelsCreate;
use App\Livewire\Dashboard\Stock\Items\ItemsLabels\ItemsLabelsEdit;
use App\Livewire\Dashboard\Stock\Items\ItemsOthers;
use App\Livewire\Dashboard\Stock\Stock\StockContainers;
use App\Livewire\Dashboard\Stock\Stock\StockItems;
use App\Livewire\Dashboard\Stock\Stock\StockLabels;
use App\Livewire\Dashboard\Stock\Vendors;
use App\Livewire\Dashboard\Stock\Purchases as StockPurchases;
use App\Livewire\Dashboard\Stock\Stock as StockOverview;

use App\Livewire\Dashboard\Temporary\CustomizePlan;
use App\Livewire\DriverPortal\DriverHistory;
use App\Livewire\DriverPortal\DriverHome;
use App\Livewire\DriverPortal\DriverProfile;
use App\Livewire\DriverPortal\DriverProfileEdit;
use App\Livewire\Login;
use App\Livewire\LoginCustomerPortal;
use App\Livewire\LoginDriverPortal;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepFive;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepFiveExisting;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepFour;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepOne;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepSix;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepThree;
use App\Livewire\Subscription\Customer\CustomerSubscriptionStepTwo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;










// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- GENERAL ---------------------------------










// :: linkStorage
Route::get('/storage-link', function () {

    $return = Artisan::call('storage:link');

});




// :: scheduleList
Route::get('/schedule-list', function () {

    $list = Artisan::call('schedule:list');

});








// :: LivewireServerDeployment in subRoute
if (env('APP_ENV') == 'production') {

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post(env('LIVEWIRE_UPDATE_PATH'), $handle);
    });


    Livewire::setScriptRoute(function ($handle) {
        return Route::get(env('LIVEWIRE_JAVASCRIPT_PATH'), $handle);
    });

} // end if







// :: Broadcast - Event Test
Route::get('broadcast-link', function () {
    event(new CustomerSubscriptionEvent('CUSTOMER', 'PLAN'));
    return "Broadcast - Event Test.";
});












// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// ** ----------------------------- ADMIN -----------------------------------










// 1: Login
Route::get('/', Login::class)->name('dashboard.login');
Route::get('login', Login::class)->name('dashboard.login');







// ----------------------------------------------------------------------------
// ----------------------------------------------------------------------------
// ----------------------------------------------------------------------------








// :: Authenticated
Route::middleware(['auth.user'])->group(function () {







    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // -------------------------- CLIENT ROUTES ---------------------------------








    // :: CLIENT ROUTES
    if (env('APP_TYPE') == 'CLIENT' || env('APP_TYPE') == 'BOTH') {








        // 1: home
        Route::get('dashboard', Home::class)->name('dashboard.home');







        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------








        // 2: PromoCodes
        Route::get('dashboard/promo', Promos::class)->name('dashboard.promos');







        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------






        // 3: Delivery
        Route::get('dashboard/delivery', DeliveryToday::class)->name('dashboard.delivery');





        // ---------





        // 3.1: cities
        Route::get('dashboard/delivery/cities', DeliveryCities::class)->name('dashboard.delivery.cities');






        // ---------





        // 3.2: vehicles
        Route::get('dashboard/delivery/vehicles', DeliveryVehicles::class)->name('dashboard.delivery.vehicles');







        // ---------





        // 3.3: zones
        Route::get('dashboard/delivery/zones', DeliveryZones::class)->name('dashboard.delivery.zones');






        // ---------





        // 3.4: drivers
        Route::get('dashboard/delivery/drivers', DeliveryDrivers::class)->name('dashboard.delivery.drivers');












        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------






        // 4: inventory - ingredients - store - update - remove
        Route::get('dashboard/inventory/ingredients', Ingredients::class)->name('dashboard.inventory.ingredients');




        // ---------





        // 4.2: inventory - suppliers - store - update - remove
        Route::get('dashboard/inventory/suppliers', Suppliers::class)->name('dashboard.inventory.suppliers');





        // ---------





        // 4.3: inventory - purchases - store - update - remove
        Route::get('dashboard/inventory/purchases', Purchases::class)->name('dashboard.inventory.purchases');




        // ---------






        // 4.3.5: inventory - purchaseOrder - store - update - remove
        Route::get('dashboard/inventory/purchase-orders', PurchaseOrders::class)->name('dashboard.inventory.purchaseOrders');




        // ---------






        // 4.3.6: inventory - comparisons
        Route::get('dashboard/inventory/comparisons', Comparisons::class)->name('dashboard.inventory.comparisons');




        // ---------







        // 4.4: inventory - stock - store - update - remove
        Route::get('dashboard/inventory/stock', Stock::class)->name('dashboard.inventory.stock');





        // ---------




        // 4.5: inventory - config - store - update - remove
        Route::get('dashboard/inventory/configurations', Configurations::class)->name('dashboard.inventory.configurations');





        // ---------





        // 4.6: inventory - settings - store - update - remove
        Route::get('dashboard/inventory/settings', InventorySettings::class)->name('dashboard.inventory.settings');





        // 4.6.1: inventory - settings - conversions - ingredients
        Route::get('dashboard/inventory/settings/conversions/{id}', ConversionIngredients::class)->name('dashboard.inventory.settings.conversionIngredients');







        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------






        // 5: Plans
        Route::get('dashboard/menu/plans', Plans::class)->name('dashboard.menuPlans');





        // ---------




        // 5.1: PlanBundles
        Route::get('dashboard/menu/plans/{id}/bundles', Bundles::class)->name('dashboard.menuPlanBundles');





        // ---------




        // 5.2: planRangeSizes
        Route::get('dashboard/menu/plans/{id}/range-sizes', RangeSizes::class)->name('dashboard.menuPlanRangeSizes');




        // ---------




        // 5.3: planCalendars
        Route::get('dashboard/menu/plans/{id}/calendars', PlanCalendars::class)->name('dashboard.menuPlanCalendars');








        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------









        // 6: Recipes
        Route::get('dashboard/menu/recipes', Recipes::class)->name('dashboard.menuRecipes');




        // ---------




        // 6.1: Sub-recipes
        Route::get('dashboard/menu/sub-recipes', SubRecipes::class)->name('dashboard.menuSubRecipes');



        // ---------




        // 6.2: Snacks
        Route::get('dashboard/menu/snacks', Snacks::class)->name('dashboard.menuSnacks');




        // ---------




        // 6.3: Sides
        Route::get('dashboard/menu/sides', Sides::class)->name('dashboard.menuSides');




        // ---------





        // 6.4: Sauces
        Route::get('dashboard/menu/sauces', Sauces::class)->name('dashboard.menuSauces');




        // ---------




        // 6.5: Drinks
        Route::get('dashboard/menu/drinks', Drinks::class)->name('dashboard.menuDrinks');







        // ---------




        // 6.6: Meals
        Route::get('dashboard/menu/meals', Meals::class)->name('dashboard.menuMeals');





        // ---------







        // 6.6: builder - productionBuilder
        Route::get('dashboard/menu/builder', Builder::class)->name('dashboard.menuBuilder');
        Route::get('dashboard/menu/production-builder/{id}', ProductionBuilder::class)->name('dashboard.menuProductionBuilder');





        // ---------





        // 6.7: calendars
        Route::get('dashboard/menu/calendars', Calendars::class)->name('dashboard.menuCalendars');
        Route::get('dashboard/menu/calendars/{id}', SingleCalendar::class)->name('dashboard.menuSingleCalendar');









        // ---------






        // 6.8: ingredientsList
        Route::get('dashboard/menu/ingredients-list', IngredientsList::class)->name('dashboard.menuIngredientsList');






        // ---------






        // 6.9: Settings
        Route::get('dashboard/menu/settings', Settings::class)->name('dashboard.menuSettings');







        // ---------






        // 6.9.5: lists
        Route::get('dashboard/menu/lists/{name}', Lists::class)->name('dashboard.menuLists');












        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------














        // 7: Customers - SOA
        Route::get('dashboard/customers/SOA', CustomersStateOfAccount::class)->name('dashboard.customers.SOA');





        // 7.2: Customers - subscriptionSettings
        Route::get('dashboard/customers/settings', CustomersSubscriptionSettings::class)->name('dashboard.customers.settings');











        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------








        // 8: Customers
        Route::get('dashboard/customers', Customers::class)->name('dashboard.customers');




        // ---------




        // 8.1: customers - singleCustomer - general
        Route::get('dashboard/customers/{id}', SingleCustomer::class)->name('dashboard.singleCustomer');







        // ---------




        // 8.2: customers - singleCustomer - addresses
        Route::get('dashboard/customers/{id}/addresses', SingleCustomerAddresses::class)->name('dashboard.singleCustomerAddresses');







        // ---------




        // 8.3: customers - singleCustomer - deliveries
        Route::get('dashboard/customers/{id}/deliveries', SingleCustomerDeliveries::class)->name('dashboard.singleCustomerDeliveries');










        // ---------




        // 8.4: customers - singleCustomer - menu
        Route::get('dashboard/customers/{id}/menu', SingleCustomerMenu::class)->name('dashboard.singleCustomerMenu');









        // ---------




        // 8.5: customers - singleCustomer - calendar
        Route::get('dashboard/customers/{id}/calendar', SingleCustomerCalendar::class)->name('dashboard.singleCustomerCalendar');









        // ---------




        // 8.6: customers - singleCustomer - history
        Route::get('dashboard/customers/{id}/history', SingleCustomerHistory::class)->name('dashboard.singleCustomerHistory');

















        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 10: kitchen - kitchenToday - preparations - export
        Route::get('dashboard/kitchen/today/preparations', KitchenTodayPreparations::class)->name('dashboard.kitchenTodayPreparations');







        // ---------






        // 10.1: kitchen - kitchenToday - quantity - export
        Route::get('dashboard/kitchen/today/quantity', KitchenTodayQuantities::class)->name('dashboard.kitchenTodayQuantity');







        // ---------








        // 10.2: kitchen - kitchenToday - production - export
        Route::get('dashboard/kitchen/today/production', KitchenTodayProduction::class)->name('dashboard.kitchenTodayProduction');









        // ---------





        // 10.3: kitchen - kitchenToday - packing
        Route::get('dashboard/kitchen/today/packing', KitchenTodayPacking::class)->name('dashboard.kitchenTodayPacking');










        // ---------





        // 10.4: kitchen - kitchenToday - checkout
        Route::get('dashboard/kitchen/today/checkout', KitchenTodayCheckout::class)->name('dashboard.kitchenTodayCheckout');










        // ---------





        // 10.5: kitchen - kitchenToday - delivery
        Route::get('dashboard/kitchen/today/delivery', KitchenTodayDelivery::class)->name('dashboard.kitchenTodayDelivery');








        // ---------





        // 10.6: kitchen - kitchenToday - labels
        Route::get('dashboard/kitchen/today/labels', KitchenTodayLabel::class)->name('dashboard.kitchenTodayLabel');










        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------








        // 11.5: kitchen - items
        Route::get('dashboard/kitchen/items', KitchenItems::class)->name('dashboard.kitchenItems');











        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 16: extra - blogs - create - edit
        Route::get('dashboard/extra/website/blogs', Blogs::class)->name('dashboard.website.blogs');
        Route::get('dashboard/extra/website/blogs/create', BlogsCreate::class)->name('dashboard.website.createBlog');
        Route::get('dashboard/extra/website/blogs/{id}', BlogsView::class)->name('dashboard.website.viewBlog');









        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 17: extra - settings
        Route::get('dashboard/extra/website/settings', ExtraSettings::class)->name('dashboard.website.settings');










        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 17: extra - management - users - create - edit - remove
        Route::get('dashboard/extra/management/users', Users::class)->name('dashboard.management.users');






        // ---------






        // 17.2: extra - management - roles - create - edit - remove
        Route::get('dashboard/extra/management/departments', Roles::class)->name('dashboard.management.roles');







        // ---------





        // 17.3: extra - management - activity
        Route::get('dashboard/extra/management/activity', ActivityLog::class)->name('dashboard.management.activity');








        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 18: extra - finance - paymentDetails
        Route::get('dashboard/extra/finance/payment-details', PaymentDetails::class)->name('dashboard.finance.paymentDetails');






        // ---------






        // 18.1: extra - finance - payment-methods
        Route::get('dashboard/extra/finance/payment-methods', PaymentMethods::class)->name('dashboard.finance.paymentMethods');






        // ---------




        // 18.2: extra - finance - operationCosts
        Route::get('dashboard/extra/finance/operation-costs', PaymentDetails::class)->name('dashboard.finance.operationCosts');








        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------









        // 19: extra - reports - delivery
        Route::get('dashboard/extra/reports/delivery', ReportsDelivery::class)->name('dashboard.reports.delivery');















        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 20: stock - items - containers - store - update - remove
        Route::get('dashboard/stock/items/containers', ItemsContainers::class)->name('dashboard.stock.items.containers');





        // ---------





        // 20.1: stock - items - others - store - update - remove
        Route::get('dashboard/stock/items/others', ItemsOthers::class)->name('dashboard.stock.items.others');






        // ---------





        // 20.2: stock - items - labels - store - update - remove
        Route::get('dashboard/stock/items/labels', ItemsLabels::class)->name('dashboard.stock.items.labels');


        Route::get('dashboard/stock/items/labels/create', ItemsLabelsCreate::class)->name('dashboard.stock.items.createLabel');


        Route::get('dashboard/stock/items/labels/{id}/edit', ItemsLabelsEdit::class)->name('dashboard.stock.items.editLabel');





        // ---------





        // 20.4: stock - vendors - store - update - remove
        Route::get('dashboard/stock/vendors', Vendors::class)->name('dashboard.stock.vendors');





        // ---------




        // 20.5: stock - purchases - store - update - remove
        Route::get('dashboard/stock/purchases', StockPurchases::class)->name('dashboard.stock.purchases');






        // ---------




        // 20.6: stock - stock containers - labels - items
        Route::get('dashboard/stock/stock-items', StockItems::class)->name('dashboard.stock.stockItems');
        Route::get('dashboard/stock/stock-labels', StockLabels::class)->name('dashboard.stock.stockLabels');
        Route::get('dashboard/stock/stock-containers', StockContainers::class)->name('dashboard.stock.stockContainers');
















        // --------------------------------------------------------------------------
        // --------------------------------------------------------------------------
        // --------------------------------------------------------------------------
        // --------------------------------------------------------------------------
        // --------------------------------------------------------------------------
        // --------------------------------------------------------------------------
        // ** ----------------------------- TEMPORARY ---------------------------- **





        // 1: dashboard - temporary - customize-plan
        Route::get('dashboard/temporary/customize-plan', CustomizePlan::class)->name('dashboard.temporary.customizePlan');











    } // end if - CLIENT ROUTES


















    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // -------------------------- SERVER ROUTES ---------------------------------













    // :: SERVER ROUTES
    if (env('APP_TYPE') == 'SERVER' || env('APP_TYPE') == 'BOTH') {






        // 1: control - permissions
        Route::get('dashboard/control/permissions', Permissions::class)->name('dashboard.control.permissions');










    } // end if - SERVER APPLICATION








}); // end Authentication




















// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// -------------------------- CLIENT ROUTES ---------------------------------






// :: CLIENT ROUTES II
if (env('APP_TYPE') == 'CLIENT' || env('APP_TYPE') == 'BOTH') {













    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // ** -------------------- SUBSCRIPTION - CUSTOMER ----------------------- **















    // 1: Subscription - customer - StepOne
    Route::get('subscription/customer', CustomerSubscriptionStepOne::class)->name('subscription.customerStepOne');




    // 1.2: Subscription - customer - stepTwo
    Route::get('subscription/customer/{id}', CustomerSubscriptionStepTwo::class)->name('subscription.customerStepTwo');





    // 1.3: Subscription - customer - stepThree (preferences)
    Route::get('subscription/customer/{id}/preferences', CustomerSubscriptionStepThree::class)->name('subscription.customerStepThree');






    // 1.4: Subscription - customer - stepFour (delivery-information)
    Route::get('subscription/customer/{id}/delivery-information', CustomerSubscriptionStepFour::class)->name('subscription.customerStepFour');





    // 1.5: Subscription - customer - stepFive (checkout-information)
    Route::get('subscription/customer/{id}/checkout-information', CustomerSubscriptionStepFive::class)->name('subscription.customerStepFive');




    // 1.5.2: Subscription - customer - stepFiveExisting (checkout-information)
    Route::get('subscription/customer/{id}/checkout-information/existing', CustomerSubscriptionStepFiveExisting::class)->name('subscription.customerStepFiveExisting');








    // 1.6: Subscription - customer - stepSix (Invoice)
    Route::get('subscription/customer/{id}/invoice', CustomerSubscriptionStepSix::class)->name('subscription.customerStepSix');





























    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // ** ---------------------- PORTALS - CUSTOMER -------------------------- **







    // 1: portal - customer - login
    Route::get('portals/customer', LoginCustomerPortal::class);
    Route::get('portals/customer/login', LoginCustomerPortal::class)->name('portals.customer.login');











    // :: Authenticated
    Route::middleware(['auth.portals.customer'])->group(function () {








        // 1: portal - customer - home
        Route::get('portals/customer/home', CustomerHome::class)->name('portals.customer.home');







        // ----------------------------------------------------------------------------









        // 2: portal - customer - general
        Route::get('portals/customer/general', CustomerGeneral::class)->name('portals.customer.general');







        // ----------------------------------------------------------------------------





        // 3: portal - customer - address
        Route::get('portals/customer/address', CustomerAddresses::class)->name('portals.customer.address');








        // ----------------------------------------------------------------------------





        // 3: portal - customer - delivery
        Route::get('portals/customer/delivery', CustomerDeliveries::class)->name('portals.customer.delivery');









        // ----------------------------------------------------------------------------








        // 4: portal - customer - menu
        Route::get('portals/customer/menu', CustomerMenu::class)->name('portals.customer.menu');








        // ----------------------------------------------------------------------------





        // 5: portal - customer - calendar
        Route::get('portals/customer/calendar', CustomerCalendar::class)->name('portals.customer.calendar');





















    }); // end Authentication































    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // --------------------------------------------------------------------------
    // ** ------------------------ PORTALS - DRIVER -------------------------- **







    // 1: portal - driver - login
    Route::get('portals/driver', LoginDriverPortal::class);
    Route::get('portals/driver/login', LoginDriverPortal::class)->name('portals.driver.login');











    // :: Authenticated
    Route::middleware(['auth.portals.driver'])->group(function () {








        // 1: portal - driver - home
        Route::get('portals/driver/home', DriverHome::class)->name('portals.driver.home');







        // ----------------------------------------------------------------------------





        // 2: portal - driver - history
        Route::get('portals/driver/history', DriverHistory::class)->name('portals.driver.history');







        // ----------------------------------------------------------------------------





        // 3: portal - driver - profile
        Route::get('portals/driver/profile', DriverProfile::class)->name('portals.driver.profile');





        // 3.2: portal - driver - profile - edit
        Route::get('portals/driver/profile/edit', DriverProfileEdit::class)->name('portals.driver.editProfile');










    }); // end Authentication
















} // end if - CLIENT ROUTES II
