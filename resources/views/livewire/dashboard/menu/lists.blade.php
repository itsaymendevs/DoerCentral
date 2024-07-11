<section class="content--section" id="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- midRow --}}
        <div class="row">



            {{-- Type --}}

            {{-- :: permission - hasTypeFilter --}}
            @if ($versionPermission->menuModuleHasMealTypeFilters || session('hasTechAccess'))


            <div class="col-2">
                <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                    <select class="form--select" data-instance='searchType' data-placeholder='Select Type'
                        data-clear='true'>
                        <option value=""></option>

                        @foreach ($types ?? [] as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>


            @endif
            {{-- end if - permission --}}






            {{-- search --}}
            <div class="@if ($versionPermission->menuModuleHasMealTypeFilters) col-2 @else col-3 @endif">
                <input wire:model.live='searchMeal' class="form--input main-version mx-auto" type="search"
                    style="width: 80% !important" placeholder="Search by Name" />
            </div>



            {{-- counter --}}
            <div class="col-2 text-start">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Items">
                    {{ $meals->total() }}
                </h3>
            </div>




            {{-- sub-menu --}}
            <div class="@if ($versionPermission->menuModuleHasMealTypeFilters) col-6 @else col-7 @endif text-end">
                <livewire:dashboard.menu.lists.components.sub-menu key='inner-submenu' />
            </div>





        </div>
        {{-- end midRow --}}













        {{-- ------------------------------------------------- --}}
        {{-- ------------------------------------------------- --}}













        {{-- viewRow --}}
        <div class="row row pt-2 align-items-center mb-5">



            {{-- 1: standardView --}}
            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">



                    {{-- loop - meals --}}
                    @foreach ($meals ?? [] as $meal)



                    <div class="col-4 col-xl-3 col-xxl-3" key='single-meal-recipe-{{ $meal->id }}'>
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">



                                {{-- cover --}}
                                <div class="col-12 text-center">
                                    <div class="position-relative">


                                        {{-- imageFile --}}
                                        <img class="client--card-logo"
                                            src="{{ asset('storage/menu/meals/' . ($meal->imageFile ?? $defaultPlate)) }}" />







                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}








                                        {{-- menuList --}}

                                        {{-- :: permission - hasMealAddons --}}
                                        @if ($versionPermission->menuModuleHasMealAddons || session('hasTechAccess'))



                                        <button class="btn client--floating-button" type="button"
                                            wire:click="toggleMenu('{{ $meal->id }}')">




                                            {{-- A: inList --}}
                                            @if ($meal?->inMenu($menu->id))




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
                                {{-- endCover --}}









                                {{-- -------------------------------------- --}}
                                {{-- -------------------------------------- --}}








                                {{-- col --}}
                                <div class="col-12">


                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-2l height-2l">{{
                                        $meal->name}}</h6>



                                </div>
                                {{-- endCol --}}








                                {{-- -------------------------------------- --}}
                                {{-- -------------------------------------- --}}






                                {{-- sizes --}}



                                {{-- :: permission - hasMealView --}}
                                @if ($versionPermission->menuModuleHasMealFullView || session('hasTechAccess'))





                                <div class="col-12">
                                    <div class="tabs--wrap">

                                        {{-- tabLinks --}}
                                        <ul class="nav nav-tabs inner for-sizes" role="tablist">


                                            {{-- loop - sizes --}}
                                            @foreach ($meal->sizes as $mealSize)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link @if ($meal->sizes->first()->id == $mealSize->id) active @endif"
                                                    data-bs-toggle="tab" href="#tab-{{ $meal->id }}-{{ $mealSize->id }}"
                                                    role="tab">{{
                                                    $mealSize->size->shortName }}</a>
                                            </li>
                                            @endforeach
                                            {{-- end loop --}}


                                        </ul>
                                        {{-- end tabLinks --}}







                                        {{-- --------------------- --}}
                                        {{-- --------------------- --}}




                                        {{-- tabContent --}}
                                        <div class="tab-content">





                                            {{-- loop - sizesMacros --}}
                                            @foreach ($meal->sizes as $mealSize)
                                            <div class="tab-pane no--card py-0 px-3 @if ($meal->sizes->first()->id == $mealSize->id) active @endif"
                                                id="tab-{{ $meal->id }}-{{ $mealSize->id }}" role="tabpanel">
                                                <div class="row">


                                                    {{-- calories --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">{{ $mealSize->afterCookCalories }}</p>
                                                        </div>
                                                    </div>

                                                    {{-- proteins --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">{{ $mealSize->afterCookProteins }}</p>
                                                        </div>
                                                    </div>


                                                    {{-- carbs --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">{{ $mealSize->afterCookCarbs }}</p>
                                                        </div>
                                                    </div>



                                                    {{-- fats --}}
                                                    <div class="col-3 text-end px-2">
                                                        <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">{{ $mealSize->afterCookFats }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            {{-- end loop --}}






                                        </div>
                                        {{-- end tabContent --}}



                                    </div>
                                </div>
                                {{-- endSizes --}}






                                @endif
                                {{-- end if - permission --}}




                                {{-- ---------------------------------------- --}}
                                {{-- ---------------------------------------- --}}




                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- end loop --}}







                    {{-- ----------------------------------------- --}}
                    {{-- ----------------------------------------- --}}






                    {{-- pagination --}}
                    <div class="col-12">
                        {{ $meals?->links() }}
                    </div>



                </div>
            </div>
        </div>
    </div>
    {{-- endWrapper --}}














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










    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








</section>
{{-- endSection --}}