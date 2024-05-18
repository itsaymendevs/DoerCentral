{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-end">



            {{-- empty --}}
            <div class="col-3 mb-4 pb-3"></div>





            {{-- sub-menu --}}
            <div class="col-6 text-center mb-4 pb-3">

                <livewire:dashboard.extra.reports.components.sub-menu />

            </div>









            {{-- switch - counter --}}
            <div class="col-3 text-end d-flex align-items-center justify-content-end  mb-4 pb-3">

                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-original-title="Number of Deliveries">
                    {{ $deliveries->total() }}
                </h3>

            </div>









            {{-- ---------------------------------- --}}
            {{-- ---------------------------------- --}}








            {{-- filters --}}





            {{-- 1: customer --}}
            <div class="col-3" wire:ignore>
                <input class="form-control form--input mb-4" type="text" placeholder="Search by Customer"
                    wire:model.live='searchCustomer'>
            </div>







            {{-- 2: plan --}}
            <div class="col-3" wire:ignore>


                {{-- hr --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Plan</label>
                </div>



                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' data-instance='searchPlan'
                    data-clear='true'>
                    <select class="form-select form--select form--delivery-select" data-instance='searchPlan'
                        data-clear='true'>
                        <option value=""></option>

                        {{-- loop - plans --}}
                        @foreach ($plans ?? [] as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach
                        {{-- end loop --}}

                    </select>
                </div>
            </div>










            {{-- 3: status --}}
            <div class="col-2" wire:ignore>


                {{-- subheading --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Status</label>
                </div>




                {{-- select --}}
                <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                    <select class="form-select form--select form--delivery-select" data-instance='searchStatus'
                        data-clear='true'>
                        <option value=""></option>

                        {{-- loop - statuses --}}
                        @foreach ($statuses ?? [] as $status)

                        <option value="{{ $status }}">{{ $status }}</option>

                        @endforeach
                        {{-- end loop --}}


                    </select>
                </div>
            </div>








            {{-- 4: fromDate --}}
            <div class="col-2">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">From</label>
                </div>

                <input class="form-control form--input mb-4" type="date" wire:model.live='searchFromDate'>
            </div>








            {{-- 5: untilDate --}}
            <div class="col-2">

                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 40%">
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Until</label>
                </div>


                <input class="form-control form--input mb-4" type="date" wire:model.live='searchUntilDate'>
            </div>




        </div>
        {{-- end topRow --}}
















        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}









        {{-- mainRow --}}
        <div class="row pt-2 align-items-center mb-5">







            <div class="col-12 mt-4" data-view="table">
                <div class="table-responsive memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- thead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--sm">Customer</th>
                                <th class="th--sm">Plan</th>
                                <th class="th--sm">Time</th>
                                <th class="th--md">Location</th>
                                <th class="th--md">Apartment - Floor</th>
                                <th class="th--sm">Date</th>
                                <th class="th--sm"></th>
                            </tr>
                        </thead>






                        {{-- -------------------- --}}
                        {{-- -------------------- --}}




                        {{-- tbody --}}
                        <tbody>


                            {{-- loop - deliveries --}}
                            @foreach ($deliveries as $delivery)



                            {{-- singelDelivery --}}
                            <tr>


                                {{-- id - name --}}
                                <td class="fw-bold">D-{{ $delivery->id }}</td>
                                <td>{{ $delivery->customer->fullName() }}</td>



                                {{-- plan - deliveryTime (ByCustomerAddress) --}}
                                <td>{{ $delivery->plan->name }}</td>
                                <td>
                                    {{
                                    $delivery->customer->addressByDay($delivery->deliveryDate)?->deliveryTime->title
                                    ?? ''
                                    }}
                                </td>




                                {{-- locationAddress (byCustomerAddress) --}}
                                <td class="scale--3">
                                    {!! $delivery->customer
                                    ->addressByDay($delivery->deliveryDate)?->halfAddress() ?? '' !!}
                                </td>

                                <td class="scale--3">
                                    {{
                                    $delivery->customer->addressByDay($delivery->deliveryDate)?->apartmentAndFloor()
                                    ?? ''
                                    }}
                                </td>






                                {{-- deliveryDate --}}
                                <td class="fw-bold text-theme">{{ date('d / m / Y',
                                    strtotime($delivery->deliveryDate)) }}</td>







                                {{-- status --}}
                                <td>
                                    <span class="badge fs-11 scale--self-05
                                    @if ($delivery->status == 'Pending')
                                    badge--warning
                                    @elseif ($delivery->status == 'Paused')
                                    badge--secondary
                                    @elseif ($delivery->status == 'Canceled' || $delivery->status == 'Skipped')
                                    badge--remove
                                    @else
                                    badge--theme-secondary
                                    @endif">{{ $delivery->status }}
                                    </span>
                                </td>



                            </tr>
                            {{-- end singelDelivery --}}


                            @endforeach
                            {{-- end loop --}}



                        </tbody>
                    </table>
                    {{-- endTable --}}



                </div>
            </div>
            {{-- endCol --}}






            {{-- ---------------------- --}}
            {{-- ---------------------- --}}






            {{-- pagination --}}
            <div class="col-12 mt-3">
                {{ $deliveries->links() }}
            </div>









        </div>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>








</section>
{{-- endSection --}}