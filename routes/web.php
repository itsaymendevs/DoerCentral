<?php

use App\Events\CustomerSubscriptionEvent;
use App\Livewire\Control\Permissions;
use App\Livewire\CustomerPortal\CustomerAddresses;
use App\Livewire\CustomerPortal\CustomerCalendar;
use App\Livewire\CustomerPortal\CustomerDeliveries;
use App\Livewire\CustomerPortal\CustomerGeneral;
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
use App\Livewire\Dashboard\Extra\Management\ActivityLog;
use App\Livewire\Dashboard\Extra\Management\Roles;
use App\Livewire\Dashboard\Extra\Management\Users;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Inventory;
use App\Livewire\Dashboard\ManageKitchen\KitchenContainers;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels\KitchenLabelsCreate;
use App\Livewire\Dashboard\ManageKitchen\KitchenLabels\KitchenLabelsEdit;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayCheckout;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayDelivery;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayLabel;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayPacking;
use App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayProduction;
use App\Livewire\Dashboard\Menu\Builder;
use App\Livewire\Dashboard\Menu\Calendars;
use App\Livewire\Dashboard\Menu\Calendars\SingleCalendar;
use App\Livewire\Dashboard\Menu\Items\Drinks;
use App\Livewire\Dashboard\Menu\Items\Meals;
use App\Livewire\Dashboard\Menu\Items\Sauces;
use App\Livewire\Dashboard\Menu\Items\Sides;
use App\Livewire\Dashboard\Menu\Items\Snacks;
use App\Livewire\Dashboard\Menu\Items\SubRecipes;
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
use App\Livewire\Login;
use App\Livewire\LoginCustomerPortal;
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
        Route::get('dashboard/delivery', Delivery::class)->name('dashboard.delivery');







        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------






        // 4: Inventory
        Route::get('dashboard/inventory', Inventory::class)->name('dashboard.inventory');







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






        // 6.8: Settings
        Route::get('dashboard/menu/settings', Settings::class)->name('dashboard.menuSettings');

















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










        // 10: kitchen - kitchenToday - production - export
        Route::get('dashboard/kitchen/today/production', KitchenTodayProduction::class)->name('dashboard.kitchenTodayProduction');











        // ---------





        // 10.1: kitchen - kitchenToday - packing
        Route::get('dashboard/kitchen/today/packing', KitchenTodayPacking::class)->name('dashboard.kitchenTodayPacking');










        // ---------





        // 10.2: kitchen - kitchenToday - checkout
        Route::get('dashboard/kitchen/today/checkout', KitchenTodayCheckout::class)->name('dashboard.kitchenTodayCheckout');










        // ---------





        // 10.3: kitchen - kitchenToday - delivery
        Route::get('dashboard/kitchen/today/delivery', KitchenTodayDelivery::class)->name('dashboard.kitchenTodayDelivery');








        // ---------





        // 10.4: kitchen - kitchenToday - labels
        Route::get('dashboard/kitchen/today/labels', KitchenTodayLabel::class)->name('dashboard.kitchenTodayLabel');









        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------








        // 11: kitchen - containers
        Route::get('dashboard/kitchen/containers', KitchenContainers::class)->name('dashboard.kitchenContainers');









        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 12: kitchen - labels
        Route::get('dashboard/kitchen/labels', KitchenLabels::class)->name('dashboard.kitchenLabels');



        // 12: kitchen - labels - create
        Route::get('dashboard/kitchen/labels/create', KitchenLabelsCreate::class)->name('dashboard.kitchenLabelsCreate');

        Route::get('dashboard/kitchen/labels/{id}/edit', KitchenLabelsEdit::class)->name('dashboard.kitchenLabelsEdit');


















        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 16: extra - blogs - create - edit
        Route::get('dashboard/extra/blogs', Blogs::class)->name('dashboard.blogs');
        Route::get('dashboard/extra/blogs/create', BlogsCreate::class)->name('dashboard.createBlog');
        Route::get('dashboard/extra/blogs/{id}', BlogsView::class)->name('dashboard.viewBlog');










        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------
        // ----------------------------------------------------------------------------







        // 17: extra - management- users - create - edit - remove
        Route::get('dashboard/extra/management/users', Users::class)->name('dashboard.management.users');






        // ---------






        // 17.2: extra - management- roles - create - edit - remove
        Route::get('dashboard/extra/management/departments', Roles::class)->name('dashboard.management.roles');







        // ---------





        // 17.3: extra - management- activity
        Route::get('dashboard/extra/management/activity', ActivityLog::class)->name('dashboard.management.activity');









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








} // end if - CLIENT ROUTES II
