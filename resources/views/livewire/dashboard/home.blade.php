{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        @section('head')





        @endsection
        {{-- endSection --}}











        {{-- :: SubMenu --}}
        {{--
        <livewire:dashboard.home.components.sub-menu key='1' /> --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}















        {{-- overviewRow --}}
        <div class="row align-items-center justify-content-center mb-3 dashboard--wrapper">








            {{-- :: permission - hasCustomerRevenue--}}
            @if ($versionPermission->DashboardModuleHasRevenue)





            {{-- subtitle --}}
            <div class="col-12 mb-2 text-center">
                <h3>Revenue</h3>
            </div>












            {{-- overviewBoxes --}}


            {{-- total --}}
            <div class="col text-end" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Total</h6>
                    <p class="truncate-text-1l">{{ number_format($subscriptions?->sum('totalCheckoutPrice')) }}</p>
                </div>
            </div>



            {{-- includingBag --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Total Inc. bag</h6>
                    <p class="truncate-text-1l">{{ number_format($subscriptions?->sum('planPrice')) }}</p>
                </div>
            </div>






            {{-- today's total --}}
            <div class="col text-end" data-aos="fade-up" d ata-aos-duration="600" data-aos-delay="200"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Today's Total</h6>
                    <p class="truncate-text-1l">{{ number_format($todaySubscriptions->sum('totalCheckoutPrice')) }}</p>
                </div>
            </div>







            {{-- today's total inc. bag --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Today's Inc. Bag</h6>
                    <p class="truncate-text-1l">{{ number_format($todaySubscriptions->sum('planPrice')) }}</p>
                </div>
            </div>






            {{-- bag --}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bags Total</h6>
                    <p class="truncate-text-1l">-</p>
                </div>
            </div>





            {{-- bags Refunded--}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bags Refunded</h6>
                    <p class="truncate-text-1l">-</p>
                </div>
            </div>





            {{-- bags balance--}}
            <div class="col text-end" data-aos="fade-up" data-aos-duration="600" data-aos-delay="600"
                data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class='fs-13'>Bags Balance</h6>
                    <p class="truncate-text-1l">-</p>
                </div>
            </div>







            {{-- empty --}}
            <div class="col-12 mb-5 pb-3"></div>







            @endif
            {{-- end if - permission --}}








            {{-- ----------------------------------------- --}}
            {{-- ----------------------------------------- --}}








            {{-- :: permission - hasCustomerRevenuePerPlan--}}
            @if ($versionPermission->DashboardModuleHasRevenuePerPlan)







            {{-- subtitle --}}
            <div class="col-12 mb-2 text-center">
                <h3>Revenue Per Plan</h3>
            </div>












            {{-- overviewBoxes --}}


            {{-- total --}}
            <div class="col-2 text-end mb-4" wire:ignore.self>
                <div class="overview--box shrink--self ">
                    <h6 class='fs-13'>Total</h6>
                    <p class="truncate-text-1l">{{ number_format($subscriptions?->sum('totalCheckoutPrice')) }}</p>
                </div>
            </div>







            {{-- loop - plans --}}
            @foreach ($plans ?? [] as $key => $plan)



            <div class="col-2 text-end mb-4" data-aos="fade-up" data-aos-duration="600"
                data-aos-delay="{{ $key * 100 }}" data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class="fs-13" style="">{{ $plan->name }}</h6>
                    <p class="truncate-text-1l">{{ number_format($plan?->subscriptions?->sum('totalCheckoutPrice') ?? 0)
                        }}</p>
                </div>
            </div>



            @endforeach
            {{-- end loop - plans --}}









            {{-- empty --}}
            <div class="col-12 mb-5 pb-3"></div>






            @endif
            {{-- end if - permission --}}














            {{-- ----------------------------------------- --}}
            {{-- ----------------------------------------- --}}









            {{-- :: permission - hasCustomerPerPlan --}}
            @if ($versionPermission->DashboardModuleHasCustomersPerPlan)





            {{-- subtitle --}}
            <div class="col-12 mb-2 text-center">
                <h3>Customers Per Plan</h3>
            </div>












            {{-- overviewBoxes --}}


            {{-- total --}}
            <div class="col-2 text-end mb-4" wire:ignore.self>
                <div class="overview--box shrink--self ">
                    <h6 class='fs-13'>Total</h6>
                    <p class="truncate-text-1l">{{ number_format($subscriptions->where('startDate', '<=',
                            $globalCurrentDate)?->where('untilDate', '>=', $globalCurrentDate)?->count() ?? 0) }}</p>
                </div>
            </div>







            {{-- loop - plans --}}
            @foreach ($plans ?? [] as $key => $plan)



            <div class="col-2 text-end mb-4" data-aos="fade-up" data-aos-duration="600"
                data-aos-delay="{{ $key * 100 }}" data-aos-once="true" wire:ignore.self>
                <div class="overview--box shrink--self">
                    <h6 class="fs-13" style="">{{ $plan?->name }}</h6>
                    <p class="truncate-text-1l">{{ number_format($plan?->customers()?->count() ?? 0) }}</p>
                </div>
            </div>



            @endforeach
            {{-- end loop - plans --}}









            {{-- empty --}}
            <div class="col-12 mb-5 pb-3"></div>





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
        <div class="row mb-5 pb-5">
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
                            <div class="row mb-5 pb-3">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--sm">Customer</th>
                                                    <th class="th--md">Plan</th>
                                                    <th class="th--lg">Unassigned Meals</th>
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
                                                        <a wire:navigate
                                                            class="btn btn--scheme btn-outline-warning fs-12 px-2 py-1 mx-1 scale--self-05"
                                                            href="{{ route('dashboard.singleCustomerMenu', [$commonCustomer]) }}">Manage</a>
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
                            <div class="row mb-5 pb-3">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--sm">Customer</th>
                                                    <th class="th--md">Plan</th>
                                                    <th class="th--xs">Duration</th>
                                                    <th class="th--sm">Bundle</th>

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
                                                    <td>{{ date('d / m / Y', strtotime($subscription->untilDate)) }}
                                                    </td>




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
                            <div class="row mb-5 pb-3">
                                <div class="col-12 " data-view="table">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--xs"></th>
                                                    <th class="th--sm">Customer</th>
                                                    <th class="th--md">Plan</th>
                                                    <th class="th--xs">Duration</th>
                                                    <th class="th--sm">Bundle</th>

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





    </div>
    {{-- endContainer --}}



















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}



    @section('scripts')



    <script src="{{ asset('assets/js/utils.js') }}"></script>



    @endsection
    {{-- endSection --}}





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}























</section>
{{-- endSection --}}