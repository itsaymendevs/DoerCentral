{{-- features --}}
<div class="d-flex flex-column">



    {{-- moduleName --}}
    <h5 class="fw-semibold mb-1 fs-sm-16">{{ $module?->name }}</h5>

    {{-- description --}}
    <p class="service--subtitle mb-2
           fs-sm-14 fs-15 truncate--3l h-72 fst-italic">{{$module?->desc ?? "Module Description"}}</p>





    {{-- -------------------------------- --}}
    {{-- -------------------------------- --}}





    {{-- total --}}
    <div class="d-block">
        <h3 class="fw-bold mt-2 mb-2 ls--price">
            <span class="currency--span sm me-1 fw-700 fs-sm-12">$</span>{{ number_format($instance?->totalPrice ??
            0,
            2) }}
            <span class="fs-15 ms-1 fst-italic fw-600">/ module</span>
        </h3>
    </div>








    {{-- ---------------------------------- --}}
    {{-- ---------------------------------- --}}





    {{-- subheading --}}
    <div class='fw-500 fs-15 key-features--title mt-4'>
        <h6>Key Features</h6>
        <hr>
    </div>





    {{-- featuresWrapper --}}
    @if ($parent == 'swiper')

    <div class='customise--feature-wrapper'>


        {{-- loop - features --}}
        @foreach ($module?->features?->sortByDesc('isDefault')?->take(8) ?? [] as $moduleFeature)


        <div class="service--checkbox-wrapper" key='customized-plan-service-{{ $moduleFeature->id }}'>
            <div class="form-check form--checkbox-with-label mb-0 w-100">



                {{-- input --}}
                <input class="form-check-input feature--sync-checkbox @if ($moduleFeature->isDefault) inactive @endif"
                    type="checkbox" wire:model='instance.features.{{ $moduleFeature?->id }}' wire:change='update'
                    id="customized-plan-service-checkbox-{{ $parent }}-{{ $moduleFeature->id }}"
                    data-sync='{{ $otherParent }}'>


                {{-- label --}}
                <label class="form-check-label @if ($moduleFeature->isDefault) inactive @endif w-100"
                    for="customized-plan-service-checkbox-{{ $parent }}-{{ $moduleFeature->id }}">{{
                    $moduleFeature?->name }}
                    <small class="currency--span sm ms-1 fw-semibold fs-15">{{ number_format($moduleFeature?->price, 2)
                        }}</small>
                </label>
            </div>
        </div>

        @endforeach
        {{-- end loop - features --}}


    </div>





    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}





    {{-- modal --}}
    @elseif ($parent == 'modal')





    <div class='customise--feature-wrapper h-100'>


        {{-- loop - features --}}
        @foreach ($module?->features?->sortByDesc('isDefault') ?? [] as $moduleFeature)


        <div class="service--checkbox-wrapper" key='customized-plan-service-{{ $parent }}-{{ $moduleFeature->id }}'>
            <div class="form-check form--checkbox-with-label mb-0 w-100">



                {{-- input --}}
                <input class="form-check-input feature--sync-checkbox @if ($moduleFeature->isDefault) inactive @endif"
                    type="checkbox" wire:model='instance.features.{{ $moduleFeature?->id }}' wire:change='update'
                    id="customized-plan-service-checkbox-{{ $parent }}-{{ $moduleFeature->id }}"
                    data-sync='{{ $otherParent }}'>


                {{-- label --}}
                <label class="form-check-label @if ($moduleFeature->isDefault) inactive @endif w-100"
                    for="customized-plan-service-checkbox-{{ $parent }}-{{ $moduleFeature->id }}">{{
                    $moduleFeature?->name }}
                    <small class="currency--span sm ms-1 fw-semibold fs-15">{{ number_format($moduleFeature?->price, 2)
                        }}</small>
                </label>
            </div>
        </div>

        @endforeach
        {{-- end loop - features --}}


    </div>



    @endif
    {{-- end if --}}









    {{-- -------------------------------- --}}
    {{-- -------------------------------- --}}







    {{-- viewFeatures --}}
    @if ($module?->features?->sortByDesc('isDefault')?->count() > 8 && $parent != 'modal')

    <div class="d-flex justify-content-center mt-3 mb-1 invisible">
        <button type="button" class="btn  btn--features" data-bs-toggle="modal" data-bs-target='#plan--module-modal'
            wire:click="viewModule('{{ $module->id }}')">Show More</button>
    </div>


    {{-- else --}}
    @else

    <div class="d-flex justify-content-center mt-3 mb-1">
        <button type="button" class="btn  btn--features invisible disabled">Show More</button>
    </div>


    @endif
    {{-- end if --}}










    {{-- --------------------------------------------------------- --}}
    {{-- --------------------------------------------------------- --}}





    <script>
        $(document).on('change', '.feature--sync-checkbox', function() {


            // 1: get id - replace
            sync = $(this).attr('data-sync');
            checkboxID = $(this).attr('id');



            if (sync == 'modal') {

                checkboxID = checkboxID.replace('swiper', sync);

            } else {

                checkboxID = checkboxID.replace('modal', sync);

            } // end if





            // -----------------------------------------------------
            // -----------------------------------------------------



            console.log(sync);
            console.log(checkboxID);



            // 2: isChecked
            if ($(this).is(':checked')) {

                $(`#${checkboxID}`).prop('checked', true);

            } else {

                $(`#${checkboxID}`).prop('checked', false);

            } // end if




        });
    </script>




</div>
{{-- endFeatures --}}