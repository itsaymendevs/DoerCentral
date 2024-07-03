<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.stock.components.sub-menu title='Stock Containers' key='stock-submenu' />











        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- filtersRow --}}
        <div class="row mb-4">





            {{-- 1: counter --}}
            <div class="col-4 text-start d-flex align-items-center justify-content-start">



                {{-- :: permission - hasMasterView --}}
                @if ($versionPermission->hasMasterView || session('hasTechAccess'))



                {{-- switchGroup --}}
                <div class="btn-group btn--swtich-group" role="group" wire:ignore>


                    {{-- cardView --}}
                    <button class="btn btn--switch-view" data-view="cards" data-target="stock-column" data-instance="1"
                        type="button">
                        <svg class="bi bi-card-text" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z">
                            </path>
                            <path
                                d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z">
                            </path>
                        </svg>
                    </button>



                    {{-- 2: tableView --}}
                    <button class="btn btn--switch-view active" data-view="table" data-target="stock-column"
                        data-instance="1" type="button">
                        <svg class="bi bi-table" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z">
                            </path>
                        </svg>
                    </button>
                </div>



                @endif
                {{-- end if - permission --}}






                {{-- ---------------------------- --}}
                {{-- ---------------------------- --}}






                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Containers">
                    {{ $stockItems?->groupBy('containerId')?->count() ?? 0 }}
                </h3>



            </div>
            {{-- endCol --}}








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}





            {{-- 2: containerFilter --}}
            <div class="col-4">
                <input wire:model.live='searchItem' class="form-control form--input main-version mx-auto" type="search"
                    placeholder="Search by Container" />
            </div>









            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}









            {{-- sub-menu --}}
            <div class="text-end col-4">
                <livewire:dashboard.stock.stock.components.sub-menu key='inner-submenu' />
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">







            {{-- 1: tableView --}}
            <div class="col-12 stock-column mt-4" data-view="table" wire:ignore.self>



                {{-- table --}}
                <div class="table-responsive memoir--table w-100 mb-4">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--lg">Container</th>
                                <th class="th--md">Available</th>
                                <th class="th--md">Used</th>
                            </tr>
                        </thead>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- tbody --}}
                        <tbody>






                            {{-- loop - groupByItem --}}
                            @foreach ($stockItems?->groupBy('containerId') ?? [] as $commonItem =>
                            $stockItemsByItem)


                            <tr>


                                {{-- 1: name --}}
                                <td class="fw-bold">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold">{{ $stockItemsByItem?->first()->item->name }}</td>





                                {{-- 2: available --}}
                                <td class='fw-bold text-warning fs-6'>{{
                                    $stockItemsByItem?->sum('receivedQuantity') }}
                                    <span class='fs-9 ms-1  text-heading'>({{
                                        $stockItemsByItem?->first()?->unit?->name }})</span>
                                </td>





                                {{-- 3: used --}}
                                <td class='fw-bold text-danger fs-6'>{{ 0 }}
                                    <span class='fs-9 ms-1 text-heading'>({{
                                        $stockItemsByItem?->first()?->unit?->name }})</span>
                                </td>




                            </tr>


                            @endforeach
                            {{-- end loop - groupByItem --}}




                        </tbody>
                        {{-- end tbody --}}

                    </table>
                </div>
                {{-- endRow --}}





            </div>
            {{-- endCol - tableView --}}











            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}
            {{-- ---------------------------------------------- --}}












            {{-- 2: cardsView --}}
            <div class="col-12 stock-column" data-view="cards" style="display: none" wire:ignore.self>
                <div class="row mt-zone-cards" style="margin-top: 70px;">




                    {{-- singleCol --}}
                    @foreach ($stockItems?->groupBy('containerId') ?? [] as $commonItem =>
                    $stockItemsByItem)


                    <div class="col-4 col-xl-4 col-xxl-3">
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- 1: imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo"
                                        src="{{ asset('storage/stock/items/containers/' . ($stockItemsByItem?->first()->item->imageFile ?? $defaultPreview)) }}">
                                </div>



                                {{-- 1.2: name --}}
                                <div class="col-12">
                                    <h6 class="text-center fw-bold mt-4 mb-2 truncate-text-1l fs-14 text-heading">{{
                                        $stockItemsByItem?->first()->item->name }}</h6>
                                </div>






                                {{-- wrapper --}}
                                <div class="col-12 px-2">




                                    {{-- 1.3: used --}}
                                    <div class="d-flex align-items-center justify-content-center mb-2 mt-2">
                                        <span
                                            class="btn--raw-icon fs-13 d-flex align-items-center justify-content-center scale--3 text-heading">Used</span>
                                        <button
                                            class="btn btn--raw-icon d-flex align-items-baseline justify-content-center scale--3 fw-bold text-danger"
                                            type="button">0
                                            <span class='fs-9 ms-1 text-heading'>({{
                                                $stockItemsByItem?->first()?->unit?->name
                                                }})</span>
                                        </button>
                                    </div>




                                    {{-- 1.4: available --}}
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span
                                            class="btn--raw-icon fs-13 d-flex align-items-center justify-content-center scale--3 text-heading">Current</span>
                                        <button
                                            class="btn btn--raw-icon d-flex align-items-baseline justify-content-center scale--3 fw-bold text-warning"
                                            type="button">
                                            {{ $stockItemsByItem?->sum('receivedQuantity') }}
                                            <span class='fs-9 ms-1 text-heading'>({{
                                                $stockItemsByItem?->first()?->unit?->name }})</span>

                                        </button>
                                    </div>
                                </div>
                                {{-- endCol --}}




                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- end loop --}}




                </div>
            </div>
        </div>
        {{-- endRow --}}




    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}