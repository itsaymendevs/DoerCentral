{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        @section('head')



        {{-- clockScripts --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>



        @endsection
        {{-- endSection --}}











        {{-- :: SubMenu --}}
        {{--
        <livewire:dashboard.home.components.sub-menu key='1' /> --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}














        {{-- topRow --}}
        <div class="row mb-5 pb-5 justify-content-start">








            {{-- chartTwo --}}

            {{-- :: permission - hasItemChart --}}
            @if ($versionPermission->DashboardModuleHasItemChart)



            <div class="col-8 text-end mb-5" data-aos="fade" data-aos-duration="700" data-aos-delay="300"
                data-aos-once="true" wire:ignore>
                <div style="position: relative; height:350px;" class='w-100 d-flex align-items-end'>
                    <canvas id="chart--2"></canvas>
                </div>
            </div>


            @endif
            {{-- end if - permission --}}






            {{-- --------------------------- --}}
            {{-- --------------------------- --}}








            {{-- clockCol --}}

            {{-- :: permission - hasClock --}}
            @if ($versionPermission->DashboardModuleHasClock)



            <div class="col-4 d-flex justify-content-end no-events mb-5">


                <figure class="highcharts-figure w-100" wire:ignore>
                    <div id="container-clock"></div>
                </figure>


            </div>


            @endif
            {{-- end if - permission --}}








            {{-- empty --}}
            <div class="col-12"></div>



            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}











            {{-- :: permission - allFunctionsHidden --}}
            @if ($versionPermission->DashboardModuleHasRevenue ||
            $versionPermission->DashboardModuleHasRevenuePerPlan ||
            $versionPermission->DashboardModuleHasCustomersPerPlan)








            {{-- midRow --}}
            <div class="col-12">


                {{-- tabsWrap --}}
                <div class="tabs--wrap">


                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs  justify-content-center" data-aos="flip-up" data-aos-duration="600"
                        data-aos-delay="200" data-aos-once="true" role="tablist" wire:ignore.self>



                        {{-- revenue --}}


                        {{-- :: permission - hasCustomerRevenue--}}
                        @if ($versionPermission->DashboardModuleHasRevenue)



                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-10" role="tab">Revenue</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}









                        {{-- :: permission - hasCustomerRevenuePerPlan--}}
                        @if ($versionPermission->DashboardModuleHasRevenuePerPlan)



                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-11" role="tab">Plans Revenue</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}












                        {{-- :: permission - hasCustomerPerPlan --}}
                        @if ($versionPermission->DashboardModuleHasCustomersPerPlan)



                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-12" role="tab">Customers Per Plan</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}









                    </ul>
                    {{-- endLinks --}}






                    {{-- ------------------------------------------------------- --}}








                    {{-- tabContent --}}
                    <div class="tab-content mt-2">






                        {{-- :: permission - hasCustomerRevenue--}}
                        @if ($versionPermission->DashboardModuleHasRevenue)






                        {{-- 1: revenueTab --}}
                        <div class="tab-pane fade show active no--card" id="tab-10" role="tabpanel">



                            {{-- tableRow --}}
                            <div class="row dashboard--wrapper justify-content-center">




                                {{-- overviewBoxes --}}


                                {{-- total --}}
                                <div class="col text-end" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Total</h6>
                                        <p>{{
                                            number_format($subscriptions?->sum('totalCheckoutPrice')) }}</p>
                                    </div>
                                </div>



                                {{-- includingBag --}}
                                <div class="col text-end" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="100" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Total Inc. bag</h6>
                                        <p>{{
                                            number_format($subscriptions?->sum('totalCheckoutPrice') -
                                            $subscriptions?->sum('bagPrice')) }}</p>
                                    </div>
                                </div>






                                {{-- today's total --}}
                                <div class="col text-end" data-aos="fade-up" d ata-aos-duration="600"
                                    data-aos-delay="200" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Today's Total</h6>
                                        <p>{{
                                            number_format($todaySubscriptions->sum('totalCheckoutPrice')) }}</p>
                                    </div>
                                </div>







                                {{-- today's total inc. bag --}}
                                <div class="col text-end" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="300" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Today's Inc. Bag</h6>
                                        <p>{{
                                            number_format($todaySubscriptions->sum('totalCheckoutPrice') -
                                            $todaySubscriptions->sum('bagPrice')) }}</p>
                                    </div>
                                </div>






                                {{-- bag --}}
                                <div class="col text-end" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="400" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Bags Total</h6>
                                        <p>{{ number_format($subscriptions?->sum('bagPrice')) }}</p>
                                    </div>
                                </div>





                                {{-- bags Refunded--}}
                                <div class="col text-end" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="500" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Bags Refunded</h6>
                                        <p>{{ number_format($subscriptions?->sum('bagRefund.amount')) }}</p>
                                    </div>
                                </div>





                                {{-- bags balance--}}
                                <div class="col text-end" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="600" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Bags Balance</h6>
                                        <p>{{ number_format($subscriptions?->sum('bagPrice') -
                                            $subscriptions?->sum('bagRefund.amount')) }}</p>
                                    </div>
                                </div>




                            </div>
                            {{-- endRow --}}



                        </div>
                        {{-- endTab --}}




                        @endif
                        {{-- end if - permission --}}









                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}






                        {{-- ** RESET GLOBAL SN --}}
                        @php $globalSNCounter = 1; @endphp




                        {{-- :: permission - hasCustomerRevenuePerPlan--}}
                        @if ($versionPermission->DashboardModuleHasRevenuePerPlan)





                        {{-- 2: planRevenueTab --}}
                        <div class="tab-pane fade no--card" id="tab-11" role="tabpanel">



                            {{-- tableRow --}}
                            <div class="row  dashboard--wrapper justify-content-center">





                                {{-- overviewBoxes --}}


                                {{-- total --}}
                                <div class="col-2 text-end mb-4" wire:ignore.self>
                                    <div class="overview--box shrink--self ">
                                        <h6 class='fs-13'>Total</h6>
                                        <p>{{
                                            number_format($subscriptions?->sum('totalCheckoutPrice')) }}</p>
                                    </div>
                                </div>







                                {{-- loop - plans --}}
                                @foreach ($plans ?? [] as $key => $plan)



                                <div class="col-2 text-end mb-4" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="{{ $key * 100 }}" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class="fs-13" style="">{{ $plan->name }}</h6>
                                        <p>{{
                                            number_format($plan?->subscriptions?->sum('totalCheckoutPrice') ?? 0)
                                            }}</p>
                                    </div>
                                </div>



                                @endforeach
                                {{-- end loop - plans --}}







                            </div>
                            {{-- endRow --}}



                        </div>
                        {{-- endTab --}}




                        @endif
                        {{-- end if - permission --}}









                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}






                        {{-- ** RESET GLOBAL SN --}}
                        @php $globalSNCounter = 1; @endphp




                        {{-- :: permission - hasCustomerPerPlan --}}
                        @if ($versionPermission->DashboardModuleHasCustomersPerPlan)





                        {{-- 3: customerRevenueTab --}}
                        <div class="tab-pane fade no--card" id="tab-12" role="tabpanel">



                            {{-- tableRow --}}
                            <div class="row  dashboard--wrapper justify-content-center">



                                {{-- overviewBoxes --}}


                                {{-- total --}}
                                <div class="col-2 text-end mb-4" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class='fs-13'>Total</h6>
                                        <p>{{ number_format($subscriptions->where('startDate', '<=',
                                                $globalCurrentDate)?->where('untilDate', '>=',
                                                $globalCurrentDate)?->count() ?? 0) }}
                                        </p>
                                    </div>
                                </div>







                                {{-- loop - plans --}}
                                @foreach ($plans ?? [] as $key => $plan)



                                <div class="col-2 text-end mb-4" data-aos="fade-up" data-aos-duration="600"
                                    data-aos-delay="{{ $key * 100 }}" data-aos-once="true" wire:ignore.self>
                                    <div class="overview--box shrink--self">
                                        <h6 class="fs-13" style="">{{ $plan?->name }}</h6>
                                        <p>{{ number_format($plan?->activeCustomers()?->count() ?? 0) }}</p>
                                    </div>
                                </div>



                                @endforeach
                                {{-- end loop - plans --}}






                            </div>
                            {{-- endRow --}}



                        </div>
                        {{-- endTab --}}




                        @endif
                        {{-- end if - permission --}}








                    </div>
                </div>
                {{-- end tabsWrap --}}


            </div>





            @endif
            {{-- end if - permission --}}





        </div>
        {{-- endRow --}}















        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- :: permission - allFunctionsHidden --}}
        @if ($versionPermission->DashboardModuleHasUnassignedMeals ||
        $versionPermission->DashboardModuleHasSoonExpiringCustomers ||
        $versionPermission->DashboardModuleHasLatestSubscribers)







        {{-- bottomRow --}}
        <div class="row mb-5">
            <div class="col-12">


                {{-- tabsWrap --}}
                <div class="tabs--wrap">


                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs mb-4 justify-content-center" data-aos="flip-up" data-aos-duration="600"
                        data-aos-delay="200" data-aos-once="true" role="tablist" wire:ignore.self>



                        {{-- unAssignedMeals --}}


                        {{-- :: permission - hasUnassignedMeals --}}
                        @if ($versionPermission->DashboardModuleHasUnassignedMeals)


                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">Unassigned</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}








                        {{-- soonExpiring --}}

                        {{-- :: permission - hasSoonExpiringCustomers --}}
                        @if ($versionPermission->DashboardModuleHasSoonExpiringCustomers)


                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Soon Expiring</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}











                        {{-- latestSubscribers --}}

                        {{-- :: permission - hasLatestSubcribers --}}
                        @if ($versionPermission->DashboardModuleHasLatestSubscribers)


                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Latest
                                Subscribers</a>
                        </li>


                        @endif
                        {{-- end if - permission --}}









                    </ul>
                    {{-- endLinks --}}






                    {{-- ------------------------------------------------------- --}}








                    {{-- tabContent --}}
                    <div class="tab-content">






                        {{-- :: permission - hasUnassignedMeals --}}
                        @if ($versionPermission->DashboardModuleHasUnassignedMeals)






                        {{-- 1: unAssignedMeals --}}
                        <div class="tab-pane fade show active no--card" id="tab-1" role="tabpanel">



                            {{-- tableRow --}}
                            <div class="row">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--lg">Customer</th>
                                                    <th class="th--lg">Plan</th>
                                                    <th class="th--xl">Unassigned Meals</th>
                                                    <th class="th--xs"></th>
                                                </tr>
                                            </thead>
                                            {{-- endHeaders --}}






                                            {{-- ------------------ --}}
                                            {{-- ------------------ --}}






                                            {{-- tbody --}}
                                            <tbody>




                                                {{-- :: loop - unAssignedScheduleMeals --}}
                                                @foreach ($unAssignedScheduleMeals->groupBy('customerId') ?? []
                                                as $commonCustomer => $unAssignedScheduleMealsByCustomer)



                                                {{-- ** INIT UNASSIGNED MEALS --}}
                                                @php $unAssignedMealTypes = []; @endphp







                                                <tr>


                                                    {{-- SN - customer - --}}
                                                    <td>{{ $globalSNCounter++ }}</td>
                                                    <td>
                                                        {{$unAssignedScheduleMealsByCustomer->first()?->customer?->fullName()}}
                                                    </td>



                                                    {{-- plan --}}
                                                    <td>{{ $unAssignedScheduleMealsByCustomer->first()?->plan?->name }}
                                                    </td>




                                                    {{-- ----------------------- --}}
                                                    {{-- ----------------------- --}}




                                                    {{-- unassignedTypes --}}
                                                    <td>




                                                        {{-- loop - scheduleMeals --}}
                                                        @foreach ($unAssignedScheduleMealsByCustomer
                                                        as $unAssignedScheduleMeal)


                                                        @php array_push($unAssignedMealTypes,
                                                        $unAssignedScheduleMeal?->mealType->name) @endphp


                                                        @endforeach
                                                        {{-- end loop --}}




                                                        {{-- :: laterPrint --}}
                                                        {{ implode(' - ', $unAssignedMealTypes) }}


                                                    </td>





                                                    {{-- ----------------------- --}}
                                                    {{-- ----------------------- --}}






                                                    {{-- action --}}
                                                    <td>
                                                        <button wire:click="manageUnassigned({{ $commonCustomer }})"
                                                            type='button'
                                                            class="btn btn--scheme btn-outline-warning fs-12 px-2 py-1 mx-1 scale--self-05">Manage</button>
                                                    </td>




                                                </tr>

                                                @endforeach
                                                {{-- end loop - scheduleMeals --}}



                                            </tbody>
                                        </table>
                                        {{-- endTable --}}


                                    </div>
                                </div>
                            </div>
                            {{-- endRow --}}



                        </div>
                        {{-- endTab --}}




                        @endif
                        {{-- end if - permission --}}









                        {{-- ----------------------------------------------------- --}}
                        {{-- ----------------------------------------------------- --}}



                        {{-- ** RESET GLOBAL SN --}}
                        @php $globalSNCounter = 1; @endphp











                        {{-- :: permission - hasSoonExpiringCustomers --}}
                        @if ($versionPermission->DashboardModuleHasSoonExpiringCustomers)





                        {{-- 2: soonExpiring Customers Tab --}}
                        <div class="tab-pane fade no--card" id="tab-2" role="tabpanel">




                            {{-- tableRow --}}
                            <div class="row">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--md">Customer</th>
                                                    <th class="th--md">Plan</th>
                                                    <th class="th--xs">Duration</th>
                                                    <th class="th--md">Bundle</th>

                                                    <th class="th--sm">Order Date</th>
                                                    <th class="th--sm">Start Date</th>
                                                    <th class="th--sm">Expiry Date</th>
                                                    <th class="th--sm">Balance Days</th>
                                                    <th class="th--xs"></th>
                                                </tr>
                                            </thead>
                                            {{-- endHeaders --}}






                                            {{-- ------------------ --}}
                                            {{-- ------------------ --}}






                                            {{-- tbody --}}
                                            <tbody>




                                                {{-- loop - expiringSoon --}}
                                                @foreach ($subscriptions?->where('untilDate', '>=', $globalCurrentDate)
                                                ?->where('untilDate', '<=', date('Y-m-d', strtotime('+3 days +4
                                                    hours'))) ?? [] as $subscription) <tr>





                                                    {{-- SN - customer - --}}
                                                    <td>{{ $globalSNCounter++ }}</td>
                                                    <td>{{ $subscription?->customer?->fullName() }}</td>


                                                    {{-- plan - duration - bundle --}}
                                                    <td>{{ $subscription?->plan?->name }}</td>
                                                    <td>{{ $subscription?->planDays }}</td>
                                                    <td>{{ $subscription?->bundle?->name }}</td>



                                                    {{-- order - start - until - balance --}}
                                                    <td>{{ date('d / m / Y', strtotime($subscription->created_at)) }}
                                                    </td>
                                                    <td>{{ date('d / m / Y', strtotime($subscription->startDate)) }}
                                                    </td>
                                                    <td>{{ date('d / m / Y', strtotime($subscription->untilDate)) }}
                                                    </td>
                                                    <td></td>




                                                    {{-- actions [manage] --}}
                                                    <td>
                                                        <a wire:navigate
                                                            class="btn btn--scheme btn-outline-warning fs-12 px-2 py-1 mx-1 scale--self-05"
                                                            href="{{ route('dashboard.singleCustomer', [$subscription->customer->id]) }}">
                                                            Manage
                                                        </a>
                                                    </td>




                                                    </tr>
                                                    @endforeach
                                                    {{-- end loop - subscriptions --}}





                                            </tbody>
                                        </table>
                                        {{-- endTable --}}




                                    </div>
                                </div>





                                {{-- ---------------------- --}}
                                {{-- ---------------------- --}}






                                {{-- pagination --}}
                                <div class="col-12 mt-3">
                                </div>



                            </div>
                            {{-- endRow --}}


                        </div>
                        {{-- end Tab --}}





                        @endif
                        {{-- end if - permission --}}





                        {{-- ------------------------------------------------------------ --}}
                        {{-- ------------------------------------------------------------ --}}











                        {{-- :: permission - hasLatestSubcribers --}}
                        @if ($versionPermission->DashboardModuleHasLatestSubscribers)




                        {{-- 3: latestCustomers --}}
                        <div class="tab-pane fade no--card" id="tab-3" role="tabpanel">




                            {{-- tableRow --}}
                            <div class="row">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--md">Customer</th>
                                                    <th class="th--md">Plan</th>
                                                    <th class="th--xs">Duration</th>
                                                    <th class="th--md">Bundle</th>

                                                    <th class="th--sm">Order Date</th>
                                                    <th class="th--sm">Start Date</th>
                                                    <th class="th--sm">Expiry Date</th>

                                                    <th class="th--xs"></th>
                                                </tr>
                                            </thead>
                                            {{-- endHeaders --}}






                                            {{-- ------------------ --}}
                                            {{-- ------------------ --}}


                                            {{-- ** RESET GLOBAL SN --}}
                                            @php $globalSNCounter = 1; @endphp










                                            {{-- tbody --}}
                                            <tbody>



                                                {{-- loop - expiringSoon --}}
                                                @foreach ($subscriptions?->sortByDesc('created_at')->take(10)
                                                as $subscription)

                                                <tr>



                                                    {{-- SN - customer - --}}
                                                    <td>{{ $globalSNCounter++ }}</td>
                                                    <td>{{ $subscription?->customer?->fullName() }}</td>


                                                    {{-- plan - duration - bundle --}}
                                                    <td>{{ $subscription?->plan?->name }}</td>
                                                    <td>{{ $subscription?->planDays }}</td>
                                                    <td>{{ $subscription?->bundle?->name }}</td>



                                                    {{-- order - start - until - balance --}}
                                                    <td>{{ date('d / m / Y', strtotime($subscription->created_at)) }}
                                                    </td>
                                                    <td>{{ date('d / m / Y', strtotime($subscription->startDate)) }}
                                                    </td>
                                                    <td>{{ date('d / m / Y', strtotime($subscription->untilDate)) }}
                                                    </td>




                                                    {{-- actions --}}
                                                    <td>
                                                        {{-- 1: manage --}}
                                                        <a wire:navigate
                                                            class="btn btn--scheme btn-outline-warning fs-12 px-2 py-1 mx-1 scale--self-05"
                                                            href="{{ route('dashboard.singleCustomer', [$subscription->customer->id]) }}">
                                                            Manage
                                                        </a>
                                                    </td>




                                                </tr>
                                                @endforeach
                                                {{-- end loop - subscriptions --}}



                                            </tbody>
                                        </table>
                                        {{-- endTable --}}




                                    </div>
                                </div>





                                {{-- ---------------------- --}}
                                {{-- ---------------------- --}}






                                {{-- pagination --}}
                                <div class="col-12 mt-3">

                                </div>



                            </div>
                            {{-- endRow --}}




                        </div>
                        {{-- endTab --}}




                        @endif
                        {{-- end if - permission --}}





                    </div>
                </div>
                {{-- end tabsWrap --}}


            </div>
        </div>
        {{-- endRow --}}








        @endif
        {{-- end if - permission --}}










        {{-- ------------------------------------------------- --}}
        {{-- ------------------------------------------------- --}}





        <div class="row mb-5">


            {{-- chartOne --}}

            {{-- :: permission - hasDeliveryChart --}}
            @if ($versionPermission->DashboardModuleHasDeliveryChart)



            <div class="col-7 text-center" data-aos="fade" data-aos-duration="700" data-aos-once="true" wire:ignore>
                <div style="position: relative; height:400px; width: 100%;">
                    <canvas id="chart--1"></canvas>
                </div>
            </div>



            @endif
            {{-- end if - permission --}}












            {{-- countersCol --}}


            {{-- :: permission - hasDeliveryDetails --}}
            @if ($versionPermission->DashboardModuleHasDeliveryDetails)



            <div class="col-5">
                <div class="row">



                    {{-- subheading --}}
                    <div class="d-flex align-items-center justify-content-between mb-4" data-aos="fade-up"
                        data-aos-duration="600" data-aos-delay="100" data-aos-once="true" wire:ignore>
                        <hr style="width: 55%">
                        <label class="form-label form--label px-3 w-50 justify-content-center mb-0 fs-15">Delivery
                            Details</label>
                    </div>





                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>





                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>






                    {{-- separator --}}
                    <div class="col-12 mb-4"></div>


                    {{-- ------------------------- --}}
                    {{-- ------------------------- --}}





                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>





                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>





                    {{-- separator --}}
                    <div class="col-12 mb-4"></div>




                    {{-- ------------------------- --}}
                    {{-- ------------------------- --}}




                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>





                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                    {{-- Delivery --}}
                    <div class="col-4 text-end" wire:ignore.self>
                        <div class="overview--box shrink--self">
                            <h6 class='fs-13'>Counter</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                </div>
            </div>




            @endif
            {{-- end if - permission --}}


        </div>


    </div>
    {{-- endContainer --}}


















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    @section('scripts')







    {{-- clockjs --}}
    <script src="{{ asset('assets/js/init-clock.js') }}"></script>



    {{-- chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>






    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}






    {{-- prepare --}}
    <script>
        // 1: chartOne
        var cities = @json($cities);
        var cityDeliveries = @json($cityDeliveries);
        var todayDeliveriesCount = @json($todayDeliveries->count());



        // :: prepChart
        var cityData = [];
        let citiesOfDeliveries = Object.keys(cityDeliveries);
        citiesOfDeliveries.forEach((city) => {
            cityData.push({ x: city, y: cityDeliveries[city], r: 10 });
        });



        // ---------------------------------------------
        // ---------------------------------------------




        // 2: chartTwo
        var todayScheduleMealsCount = @json($todayScheduleMeals->count());
        var scheduleMealsByType = @json($scheduleMealsByType);
        var mealTypes = @json($mealTypes);


        var quantityPerType = [];
        var scheduleMealTypes = Object.keys(scheduleMealsByType);
        mealTypes.forEach((scheduleMealType) => {
            quantityPerType.push(scheduleMealsByType[scheduleMealType]);
        });


        console.log(quantityPerType);
        console.log(scheduleMealsByType);


    </script>






    {{-- initChartjs --}}
    <script src="{{ asset('assets/js/init-chart.js') }}"></script>





    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}





    @endsection
    {{-- endSection --}}













</section>
{{-- endSection --}}