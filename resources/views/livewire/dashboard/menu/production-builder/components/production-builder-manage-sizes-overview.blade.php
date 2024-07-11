{{-- row --}}
<div class="row justify-content-center align-items-end">




    {{-- 1: initSize --}}
    @php $initSizeId = $meal?->sizes?->first()?->sizeId ?? null; @endphp








    {{-- wrapper --}}
    <div class="col-10 mt-5">





        {{-- avialbleSizes --}}
        <div class="row mb-3">
            <div class="col text-center">
                <div class="btn-group submenu--group for-builder" role="group">


                    {{-- loop - mealSizes --}}
                    @foreach ($meal?->sizes ?? [] as $mealSize)

                    <button class="btn fs-13 btn--switch-regular
                    @if ($initSizeId == $mealSize->size->id) active @endif" data-instance='mealSizes'
                        data-view='size-{{ $mealSize->size->id }}' type="button" wire:ignore.self>
                        {{ $mealSize->size->shortName }}
                    </button>

                    @endforeach
                    {{-- end loop --}}

                </div>
            </div>
        </div>







        {{-- ----------------------------------- --}}
        {{-- ----------------------------------- --}}












        {{-- loop - mealSizes--}}
        @foreach ($meal?->sizes ?? [] as $mealSize)






        {{-- pricesForSize --}}
        <div class="row justify-content-center @if ($initSizeId != $mealSize->size->id) d-none @endif"
            data-instance='mealSizes' data-view='size-{{ $mealSize->size->id }}' wire:ignore.self>



            {{-- 1: fixedPrice --}}
            <div class="col-6">



                {{-- label --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 45%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Price</label>
                </div>



                {{-- input --}}
                <input class="form-control form--input text-center mb-4" type="number" step='0.01'
                    value='{{ $mealSize?->price }}'
                    wire:change="updatePrice('{{ $mealSize->id }}', $event.target.value)" />


            </div>







            {{-- ------------------------------- --}}
            {{-- ------------------------------- --}}





            {{-- 2: autoPrice --}}




            {{-- :: permission - hasCostOverview --}}
            @if ($versionPermission->menuModuleHasBuilderCostOverview || session('hasTechAccess'))

            <div class="col-6">


                {{-- label --}}
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 45%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Cost Price

                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            class="bi bi-info-circle fs-6 scale--3 ms-2 pointer" data-bs-toggle='modal'
                            data-bs-target='#cost-details' wire:click="viewCostDetails('{{ $mealSize->id }}')"
                            viewBox="0 0 16 16" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="right"
                            style="fill: var(--bs-warning);" data-bs-title="View Details">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0">
                            </path>
                        </svg>


                    </label>
                </div>
                {{-- endLabel --}}





                {{-- input --}}
                <input class="form-control form--input text-center mb-4 readonly meal--automatic-price" readonly
                    type="number" step='0.01' value='{{ $mealSize->costPrice() }}' />


            </div>

            @endif
            {{-- end if - permission --}}





        </div>
        {{-- endRow --}}









        {{-- ------------------------------------ --}}
        {{-- ------------------------------------ --}}








        {{-- :: permission inline - hasSizeOverview --}}
        <div class="row @if ($initSizeId != $mealSize->size->id) d-none @endif
            @if (!$versionPermission->menuModuleHasBuilderSizeOverview) d-none-permission @endif"
            data-instance='mealSizes' data-view='size-{{ $mealSize->size->id }}' wire:ignore.self>




            {{-- 1: calories --}}
            <div class="col text-end px-1">
                <div class="overview--box shrink--self macros-version">
                    <h6 class="fs-12">Calories</h6>
                    <p>
                        <input class="form-control form--input form--table-input-xs text-center readonly" type="number"
                            value="{{ $mealSize?->size?->calories }}" readonly="" step="0.01" />
                    </p>
                </div>
            </div>




            {{-- proteins --}}
            <div class="col text-end px-1">
                <div class="overview--box shrink--self macros-version">
                    <h6 class="fs-12">Proteins<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                    <p>
                        <input class="form-control form--input form--table-input-xs text-center readonly" type="number"
                            value="{{ $mealSize?->meal?->diet?->proteins ?? 0 }}" readonly="" step="0.01" />
                    </p>
                </div>
            </div>




            {{-- carbs --}}
            <div class="col text-end px-1">
                <div class="overview--box shrink--self macros-version">
                    <h6 class="fs-12">Carbs<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                    <p>
                        <input class="form-control form--input form--table-input-xs text-center readonly" type="number"
                            value="{{ $mealSize->meal->diet->carbs ?? 0 }}" readonly="" step="0.01" />
                    </p>
                </div>
            </div>



            {{-- fats --}}
            <div class="col text-end px-1">
                <div class="overview--box shrink--self macros-version">
                    <h6 class="fs-12">Fats<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                    <p>
                        <input class="form-control form--input form--table-input-xs text-center readonly" type="number"
                            value="{{ $mealSize->meal->diet->fats ?? 0 }}" readonly="" step="0.01" />
                    </p>
                </div>
            </div>



        </div>
        {{-- endRow --}}




        @endforeach
        {{-- end loop --}}





    </div>
    {{-- endCol --}}





</div>
{{-- endRow --}}