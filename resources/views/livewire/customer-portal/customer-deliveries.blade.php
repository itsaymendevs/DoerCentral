<section id="content--section" class="content--section">
    <div class="container">






        {{-- :: SubMenu --}}
        <livewire:customer-portal.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- row --}}
        <div class="row align-items-start">
            <div class="col-12">


                {{-- filtersRow --}}
                <div class="row align-items-end">



                    {{-- fromDate --}}
                    <div class="col-8 col-sm-6 col-md-6 col-lg-5 col-xl-4">


                        {{-- title --}}
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <hr style="width: 65%" />
                            <label class="form-label form--label px-2 w-50 justify-content-center mb-0">
                                From Date
                            </label>
                        </div>


                        {{-- input --}}
                        <input class="form--input mb-0" type="date" wire:model.live='searchFromDate' />

                    </div>






                    {{-- counter --}}
                    <div class="col-4 col-sm-6 col-md-6 col-lg-7 col-xl-8 text-end">
                        <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                            class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 py-1 mb-0"
                            title="Number of Deliveries">
                            {{ $deliveries->count() }}
                        </h3>
                    </div>

                </div>
                {{-- end filtersrRow --}}










                {{-- --------------------------------------- --}}
                {{-- --------------------------------------- --}}






                {{-- tableRow --}}
                <div class="row mb-4">
                    <div class="col-12 mt-4 pt-2" data-view="table">
                        <div class="table-responsive memoir--table w-100">
                            <table class="table table-bordered" id="memoir--table">


                                {{-- headers --}}
                                <thead>
                                    <tr>
                                        <th class="th--sm">Date</th>
                                        <th class="th--md">Location</th>
                                        <th class="th--xs"></th>
                                    </tr>
                                </thead>
                                {{-- endHeaders --}}






                                {{-- ------------------ --}}
                                {{-- ------------------ --}}






                                {{-- tbody --}}
                                <tbody>


                                    {{-- loop - deliveries --}}
                                    @foreach ($deliveries as $delivery)



                                    <tr>



                                        {{-- date - time --}}
                                        <td>
                                            <span class="d-block mb-2">
                                                {{ $delivery->customer
                                                ->addressByDay($delivery->deliveryDate)?->deliveryTime->title ?? '' }}
                                            </span>


                                            <span class="text-gold d-block">{{ date('d/m/Y',
                                                strtotime($delivery->deliveryDate)) }}</span>
                                        </td>








                                        {{-- city - district - address - apartment - floor --}}
                                        <td class="scale--3 fs-xs-12">
                                            {!! $delivery->customer
                                            ->addressByDay($delivery->deliveryDate)?->halfAddress() ?? '' !!}

                                            <br />

                                            {{ $delivery->customer
                                            ->addressByDay($delivery->deliveryDate)?->apartmentAndFloor() ?? ''
                                            }}

                                        </td>






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



                                    @endforeach
                                    {{-- end loop --}}

                                </tbody>
                            </table>
                            {{-- endTable --}}




                        </div>
                    </div>





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
</section>
{{-- endSectino --}}