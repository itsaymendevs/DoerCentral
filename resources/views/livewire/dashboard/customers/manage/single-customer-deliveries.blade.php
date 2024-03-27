<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.manage.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row align-items-start">
            <div class="col-12">




                {{-- filtersRow --}}
                <div class="row align-items-end">



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







                    {{-- status --}}
                    <div class="col-3" wire:ignore>
                        <label class="form-label form--label">Status</label>
                        <div class="select--single-wrapper">
                            <select class="form-select form--select" data-instance='searchStatus' data-clear='true'>
                                <option value=""></option>

                                @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>




                    {{-- fromDate --}}
                    <div class="col-2">
                        <label class="form-label form--label">From</label>
                        <input class="form--input" type="date" wire:model.live='searchFromDate' />
                    </div>




                    {{-- untilDate --}}
                    <div class="col-2">
                        <label class="form-label form--label">Until</label>
                        <input class="form--input" type="date" wire:model.live='searchUntilDate' />
                    </div>



                    {{-- counter --}}
                    <div class="col-2 text-end">
                        <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                            class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                            title="Number of Deliveries">
                            {{ $deliveries->count() }}
                        </h3>
                    </div>
                </div>
                {{-- endRow --}}











                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}








                {{-- tableRow --}}
                <div class="row mb-4">
                    <div class="col-12 mt-4 pt-2" data-view="table">
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
                                        <td>{{ $delivery->customer->name }}</td>



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



                                        <td class="fw-bold text-theme">{{ date('d / m / Y',
                                            strtotime($delivery->deliveryDate)) }}</td>





                                        {{-- status --}}
                                        <td>
                                            <span class="badge fs-11 scale--self-05
                                                @if ($delivery->status == 'Pending')
                                                badge--warning
                                                @else
                                                badge--theme-secondary
                                                @endif">{{ $delivery->status }}</span>
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
                {{-- endRow --}}


            </div>
        </div>
    </div>
    {{-- endContainer --}}


















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



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