{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.components.sub-menu key='1' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- mainRow --}}
        <div class="row align-items-center mb-3">
            <div class="col">


                {{-- filtersRow --}}
                <div class="row align-items-center">


                    {{-- plan --}}
                    <div class="col-3" wire:ignore>
                        <label class="form-label form--label">Plan</label>
                        <div class="select--single-wrapper">
                            <select class="form-select form--select" data-instance='searchPlan' data-clear='true'>
                                <option value=""></option>

                                @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    {{-- from --}}
                    <div class="col-2">
                        <label class="form-label form--label">From</label>
                        <input class="form--input" type="date" wire:model.live='searchFromDate' />
                    </div>


                    {{-- until --}}
                    <div class="col-2">
                        <label class="form-label form--label">Until</label>
                        <input class="form--input" type="date" wire:model.live='searchUntilDate' />
                    </div>







                    {{-- printButton --}}
                    <div class="col-2">
                        <label class="form-label form--label invisible">placeholder</label>
                        <button
                            class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                            type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                </path>
                            </svg>Print
                        </button>
                    </div>








                    {{-- counter --}}
                    <div class="col-3 text-end">
                        <label class="form-label form--label invisible">placeholder</label>
                        <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                            class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-4 py-1"
                            title="Number of Deliveries">
                            {{ $subscriptions->count() }}
                        </h3>
                    </div>
                </div>









                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}








                {{-- tableRow --}}
                <div class="row mb-4">
                    <div class="col-12 mt-4" data-view="table">
                        <div class="table-responsive memoir--table w-100">
                            <table class="table table-bordered" id="memoir--table">



                                {{-- headers --}}
                                <thead>
                                    <tr>
                                        <th class="th--xs"></th>
                                        <th class="th--md">Customer</th>
                                        <th class="th--sm">Plan</th>
                                        <th class="th--xs fs-13">Days</th>
                                        <th class="th--xs fs-13">Price<br />Per Day</th>
                                        <th class="th--xs fs-13">Plan<br />Price<br /></th>
                                        <th class="th--xs fs-13">Bag<br />Charge</th>
                                        <th class="th--xs fs-13">Paid<br />Price</th>
                                        <th class="th--xs fs-13">Balance<br />Days</th>
                                        <th class="th--xs fs-13">Balance<br />Price</th>
                                        <th class="th--xs fs-13">Completed<br />Deliveries</th>
                                    </tr>
                                </thead>
                                {{-- endHeaders --}}







                                <tbody>


                                    {{-- loop - activeSubscriptions --}}
                                    @foreach ($subscriptions as $subscription)

                                    <tr key='{{ $subscription->id }}'>


                                        {{-- 1: id - name - plan --}}
                                        <td class="fw-bold">C-{{ $subscription->id }}</td>
                                        <td>{{ $subscription?->customer->name ?? '' }}</td>
                                        <td>{{ $subscription?->plan->name ?? ''}}</td>




                                        {{-- 2: planDays - pricePerDay - planPrice --}}
                                        <td class="fs-14">{{ $subscription->planDays }}</td>
                                        <td class="scale--3 fs-14">
                                            {{ $subscription->planPrice / $subscription->planDays }}
                                        </td>
                                        <td class="scale--3 fs-14">{{ $subscription->planPrice }}</td>




                                        {{-- 3: bagPrice - totalCheckoutPrice (withPromoCode) --}}
                                        <td class="scale--3 fs-14">{{ $subscription->bagPrice }}</td>
                                        <td class="scale--3 fs-14">{{ $subscription->totalCheckoutPrice }}</td>





                                        {{-- 4: balanceDays - balancePrice - --}}
                                        <td class="scale--3 fs-14">
                                            {{ -1 * ($subscription->incompleteDeliveries()?->count() ?? 0) }}
                                        </td>


                                        <td class="scale--3 fs-14">
                                            {{ -1 * ($subscription->incompleteDeliveries()?->count() ?? 0) *
                                            ($subscription->planPrice / $subscription->planDays) }}
                                        </td>









                                        {{-- 5: completedDeliveries --}}
                                        <td class="scale--3 fs-14">
                                            {{ $subscription->completedDeliveries()?->count() ?? 0 }}
                                        </td>



                                    </tr>

                                    @endforeach
                                    {{-- end loop --}}



                                </tbody>
                            </table>
                        </div>
                        {{-- endTable --}}

                    </div>
                </div>
                {{-- endRow --}}

            </div>
        </div>
    </div>
    {{-- endContainer --}}









    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select, .form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</section>
{{-- endSection --}}