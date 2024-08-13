<section class="content--section" id="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- midRow --}}
        <div class="row">


            {{-- partType --}}

            {{-- :: permission - hasTypeFilter --}}
            @if ($versionPermission->menuModuleHasMealTypeFilters )



            <div class="col-2">
                <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                    <select class="form--select" data-instance='searchPartType' data-placeholder='Select Type'
                        data-clear='true'>
                        <option value=""></option>

                        @foreach ($drinkTypes as $drinkType)
                        <option value="{{ $drinkType }}">{{ $drinkType }}</option>
                        @endforeach

                    </select>
                </div>
            </div>



            @endif
            {{-- end if - permission --}}







            {{-- search --}}
            <div class="@if ($versionPermission->menuModuleHasMealTypeFilters) col-2 @else col-3 @endif">
                <input wire:model.live='searchDrink' class="form--input main-version mx-auto" type="search"
                    style="width: 80% !important" placeholder="Search for Drinks" />
            </div>



            {{-- counter --}}
            <div class="col-2 text-start">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Drinks">
                    {{ $drinks->total() }}
                </h3>
            </div>




            {{-- sub-menu --}}
            <div class="@if ($versionPermission->menuModuleHasMealTypeFilters) col-6 @else col-7 @endif text-end">
                <livewire:dashboard.menu.items.components.sub-menu key='inner-submenu' />
            </div>





        </div>
        {{-- end midRow --}}













        {{-- ------------------------------------------------- --}}
        {{-- ------------------------------------------------- --}}







        {{-- drinks Row --}}
        <div class="row row pt-2 align-items-center mb-5">



            {{-- 1: standardView --}}
            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">



                    {{-- loop - drinks --}}
                    @foreach ($drinks as $drink)


                    <div class="col-4 col-xl-3 col-xxl-3" key='single-drink-{{ $drink->id }}'>
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- image --}}
                                <div class="col-12 text-center position-relative">
                                    <div class="position-relative">


                                        {{-- imageFile --}}
                                        <img class="client--card-logo"
                                            src="{{ asset('storage/menu/meals/' . ($drink->imageFile ?? $defaultPlate)) }}" />






                                        {{-- ratings --}}

                                        {{-- :: permission - hasMealAddons --}}
                                        @if ($versionPermission->menuModuleHasMealAddons || session('hasTechAccess'))


                                        <button class="btn client--floating-button left" type="button"
                                            data-bs-target="#menu-ratings" data-bs-toggle="modal">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-star">
                                                <path
                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                </path>
                                            </svg>

                                        </button>


                                        @endif
                                        {{-- end if - permission --}}










                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}








                                        {{-- menuList --}}

                                        {{-- :: permission - hasMealAddons --}}
                                        @if ($versionPermission->menuModuleHasMealAddons || session('hasTechAccess'))



                                        <button class="btn client--floating-button" type="button"
                                            data-bs-target="#menu-list" data-bs-toggle="modal"
                                            wire:click="editMenuList('{{ $drink->id }}')">




                                            {{-- A: inList --}}
                                            @if ($drink?->menus?->count() > 0)




                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="bi bi-journal-check active"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                                <path
                                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                                <path
                                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                            </svg>





                                            {{-- B: noList --}}
                                            @else


                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                                <path
                                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                                <path
                                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                            </svg>


                                            @endif
                                            {{-- end if --}}



                                        </button>


                                        @endif
                                        {{-- end if - permission --}}




                                    </div>
                                </div>
                                {{-- endCol --}}








                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}










                                {{-- col --}}
                                <div class="col-12">

                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                        $drink->name }}</h6>


                                    {{-- source / type --}}
                                    <p class="text-center fs-13 fw-bold text-danger mb-0">
                                        <button
                                            class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center fw-bold"
                                            type="button">{{ $drink->partType ?? 'Not Specified' }}</button>
                                    </p>
                                </div>





                                {{-- ---------------------------------------- --}}
                                {{-- ---------------------------------------- --}}



                                {{-- --------- --}}
                                @php

                                $initDrinkSizeId = $drink?->sizes?->first()?->id ?? null;

                                @endphp
                                {{-- --------- --}}







                                {{-- :: permission - hasMealView --}}
                                @if ($versionPermission->menuModuleHasMealFullView || session('hasTechAccess'))




                                {{-- sizes --}}
                                <div class="col-12">
                                    <div class="tabs--wrap">


                                        {{-- navTabs --}}
                                        <ul class="nav nav-tabs inner for-sizes" role="tablist">


                                            {{-- loop - sizes --}}
                                            @foreach ($drink->sizes as $drinkSize)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link @if ($initDrinkSizeId == $drinkSize->id) active @endif"
                                                    data-bs-toggle="tab" href="#tab-1-{{ $drinkSize->id }}" role="tab">
                                                    {{ $drinkSize->size->shortName }}
                                                </a>
                                            </li>
                                            @endforeach
                                            {{-- end loop --}}


                                        </ul>
                                        {{-- end navTabs --}}






                                        {{-- tabContent --}}
                                        <div class="tab-content">


                                            {{-- loop - sizes --}}
                                            @foreach ($drink->sizes as $drinkSize)
                                            <div class="tab-pane  no--card py-0 px-3 @if ($initDrinkSizeId == $drinkSize->id) active @endif"
                                                id="tab-1-{{ $drinkSize->id }}" role="tabpanel">


                                                <div class="row">
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">{{ $drinkSize->afterCookCalories }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">{{ $drinkSize->afterCookProteins }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">{{ $drinkSize->afterCookCarbs }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">{{ $drinkSize->afterCookFats }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            {{-- end loop --}}

                                        </div>
                                    </div>
                                </div>
                                {{-- endSizes --}}






                                @endif
                                {{-- end if - permission --}}




                                {{-- -------------------------------------- --}}
                                {{-- -------------------------------------- --}}






                                {{-- actions --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">


                                        {{-- 1: editButton --}}


                                        {{-- :: permission - hasBuilder --}}
                                        @if ($versionPermission->menuModuleHasBuilder || session('hasTechAccess'))


                                        <a class="btn btn--scheme btn--theme fs-12 px-2 mx-1 scale--self-05 h-32"
                                            href="{{ route('dashboard.menuProductionBuilder', [$drink->id]) }}">
                                            <svg class="bi bi-pencil fs-5" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </a>

                                        @endif
                                        {{-- end if - permission --}}







                                        {{-- 2: ingredients tooltip --}}

                                        {{-- :: permission - hasMealView --}}
                                        @if ($versionPermission->menuModuleHasMealFullView || session('hasTechAccess'))


                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-html='true'
                                            data-bs-placement="bottom" type="button"
                                            title="{{ implode(' &#8226; ', $drink->partsInArray()) }}">
                                            <svg class="bi bi-info-circle fs-5" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                                </path>
                                            </svg>
                                        </button>



                                        @endif
                                        {{-- end if - permission --}}










                                        {{-- 3: print excel --}}

                                        {{-- :: permission - hasMealView --}}
                                        @if ($versionPermission->menuModuleHasMealFullView || session('hasTechAccess'))



                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button" title="Print Drink">
                                            <svg class="bi bi-printer fs-5" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                                <path
                                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                                </path>
                                            </svg>
                                        </button>



                                        @endif
                                        {{-- end if - permission --}}






                                        {{-- 4: preview --}}

                                        {{-- :: permission - hasMealView --}}
                                        @if ($versionPermission->menuModuleHasMealFullView || session('hasTechAccess'))


                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-1 scale--self-05 h-32"
                                            data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom"
                                            type="button" title="Preview">
                                            <svg class="bi bi-eye fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                </path>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                </path>
                                            </svg>
                                        </button>


                                        @endif
                                        {{-- end if - permission --}}







                                        {{-- 5: remove --}}

                                        {{-- :: permission - hasBuilder --}}
                                        @if ($versionPermission->menuModuleHasBuilder || session('hasTechAccess'))


                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-1 scale--self-05 h-32"
                                            wire:loading.attr='disabled' type="button"
                                            wire:click='remove({{ $drink->id }})'>
                                            <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                        </button>


                                        @endif
                                        {{-- end if - permission --}}



                                    </div>
                                </div>
                                {{-- end actionCol --}}



                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}







                    {{-- pagination --}}
                    <div class="col-12">
                        {{ $drinks->links() }}
                    </div>





                </div>
            </div>
            {{-- endView --}}


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









    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}






    @section('modals')



    {{-- 1: menuList --}}
    <livewire:dashboard.menu.items.components.items-menu-list key='items-menu-list-modal' />



    @endsection






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</section>
{{-- endSection --}}