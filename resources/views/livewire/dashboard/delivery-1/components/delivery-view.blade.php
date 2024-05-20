{{-- wrapper --}}
<div>

    {{-- filters --}}
    <div class="row align-items-end">


    </div>
    {{-- endFilters --}}









    {{-- --------------------------------------------- --}}
    {{-- --------------------------------------------- --}}







    {{-- tableRow --}}
    <div class="row align-items-center mb-4">




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
                            <th class="th--sm">Driver</th>
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








                            {{-- driver --}}
                            <td>{{ $delivery?->driver?->name }}</td>






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
    {{-- endContainer --}}


















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- rangeHandle --}}
    <script>
        $(".form--delivery-select").on("change", function(event) {



         // 1.1: getValue - instance
         rangeValue = $(this).val();
         instance = $(this).attr('data-instance');


         @this.set(instance, rangeValue);



      }); //end function
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</div>
{{-- end wrapper --}}