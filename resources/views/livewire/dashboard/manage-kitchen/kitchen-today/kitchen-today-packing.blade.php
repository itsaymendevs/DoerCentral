<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Kitchen Today' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- midRow --}}
        <div class="row align-items-end">


            {{-- date --}}
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Date</label>
                </div>

                {{-- input --}}
                <input class="form--input" type="date" wire:model.live='searchScheduleDate'
                    min='{{ $globalTodayDate }}' />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu />


        </div>
        {{-- end midRow --}}









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- bottomRow --}}
        <div class="row align-items-center mt-5">


            {{-- search --}}
            <div class="col-4 text-center">
                <input type="text" class="form--input main-version w-100" placeholder="Search by Customer"
                    wire:model.live='searchCustomer' />
            </div>



            {{-- actions --}}
            <div class="col-4 text-center">





                {{-- 1: print --}}
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                    disabled type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>






                {{-- 2: exportExcel --}}
                <button
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2 disabled"
                    type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>


            </div>
            {{-- endActions --}}





            {{-- -------------------- --}}
            {{-- -------------------- --}}



            {{-- counter --}}
            <div class="col-4 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Meals">
                    {{ $scheduleMeals->count() }}
                </h3>
            </div>
        </div>
    </div>
    {{-- endBottomRow --}}








    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 mb-2">
            <div class="col-12 mt-4">
                <div id="print--table" class="memoir--table w-100 kitchen--table">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>


                                {{-- SN - customer--}}
                                <th class="th--xs"></th>
                                <th class="th--xs">Customer</th>




                                {{-- mealTypes --}}
                                @foreach ($mealTypes as $mealType)
                                <th class="th--sm">{{ $mealType->name }}</th>
                                @endforeach
                                {{-- end loop --}}


                            </tr>
                        </thead>
                        {{-- endHeaders --}}








                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}










                        {{-- body --}}
                        <tbody>




                            {{-- 1: loop - scheduleMeals - groupBySubscription --}}
                            @foreach ($scheduleMeals?->groupBy('customerSubscriptionId') ?? [] as $commonSubscription =>
                            $scheduleMealsBySubscription)







                            {{-- singleRow --}}
                            <tr>


                                {{-- SN --}}
                                <td class="fw-bold text-start">
                                    <span class="fs-6 text-center d-block fw-bold">{{ $globalSNCounter++ }}</span>
                                </td>






                                {{-- customer - plan --}}
                                <td class="fw-bold text-start">
                                    <span class="d-block fs-14">{{
                                        $scheduleMealsBySubscription?->first()?->customer->fullName() }}
                                        <small class="fw-semibold text-gold fs-14 d-block">
                                            {{ $scheduleMealsBySubscription?->first()->subscription?->plan->name }}
                                        </small>
                                    </span>
                                </td>










                                {{-- ------------------------- --}}
                                {{-- ------------------------- --}}









                                {{-- 2: loop - mealTypes --}}
                                @foreach ($mealTypes as $mealType)




                                {{-- meal - size --}}
                                <td class="text-start">




                                    {{-- :: getScheduleMeal --}}
                                    @php $scheduleMealBySubscription =
                                    $scheduleMealsBySubscription?->where('mealTypeId', $mealType->id)?->first()
                                    @endphp







                                    {{-- 1.2: mealExists --}}
                                    @if ($scheduleMealBySubscription)





                                    <span class="d-block fs-13 mb-4 fw-normal">{{
                                        $scheduleMealBySubscription?->meal?->name }}
                                        <small class="fw-semibold text-gold fs-13 d-block">
                                            {{ $scheduleMealBySubscription?->size?->name }}
                                        </small>
                                    </span>






                                    {{-- 1.3: remarks --}}
                                    @if ($scheduleMealBySubscription?->remarks)

                                    <span class="d-block fs-13 kitchen--table-remarks">
                                        <small class="fw-semibold text-theme-secondary fs-11 d-block">Remarks</small>
                                        <span class="d-block fs-13 fw-normal">
                                            {{ $scheduleMealBySubscription?->remarks }}
                                        </span>
                                    </span>

                                    @endif
                                    {{-- end if - remarks --}}






                                    @endif
                                    {{-- end if - mealExists --}}





                                </td>
                                @endforeach
                                {{-- end loop - mealTypes --}}








                            </tr>
                            @endforeach
                            {{-- end loop - scheduleMeals - groupBySubscription --}}




                        </tbody>
                    </table>
                    {{-- endTable --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}