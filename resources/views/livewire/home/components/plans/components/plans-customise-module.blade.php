{{-- features --}}
<div class="d-flex flex-column">



    {{-- moduleName --}}
    <h5 class="fw-semibold mb-1 fs-sm-16">{{ $module?->name }}</h5>

    {{-- description --}}
    <p class="service--subtitle mb-2
           fs-sm-14 fs-15 truncate--3l h-72">{{$module?->desc}}</p>





    {{-- ---------------------------------- --}}
    {{-- ---------------------------------- --}}




    {{-- featuresWrapper --}}
    <div class='customise--feature-wrapper'>


        {{-- loop - features --}}
        @foreach ($module?->features?->sortByDesc('isDefault') ?? [] as $moduleFeature)


        <div class="service--checkbox-wrapper" key='customized-plan-service-{{ $moduleFeature->id }}'>
            <div class="form-check form--checkbox-with-label mb-0 w-100">



                {{-- input --}}
                <input class="form-check-input @if ($moduleFeature->isDefault) inactive @endif" type="checkbox"
                    wire:model='instance.features.{{ $moduleFeature?->id }}' wire:change='update'
                    id="customized-plan-service-checkbox-{{ $moduleFeature->id }}">


                {{-- label --}}
                <label class="form-check-label @if ($moduleFeature->isDefault) inactive @endif"
                    for="customized-plan-service-checkbox-{{ $moduleFeature->id }}">{{
                    $moduleFeature?->name }}
                    <small class="currency--span sm ms-1 fw-semibold fs-15">{{ number_format($moduleFeature?->price, 2)
                        }}</small>
                </label>
            </div>
        </div>

        @endforeach
        {{-- end loop - features --}}


    </div>
    {{-- endWrapper --}}






    {{-- -------------------------------- --}}
    {{-- -------------------------------- --}}



    {{-- total --}}
    <div class="d-block">
        <h3 class="text-center fw-bold mt-2 mb-2 ls--price">
            <span class="currency--span sm me-1 fw-700 fs-sm-12">$</span>{{ number_format($instance?->totalPrice ?? 0,
            2) }}
            <span class="fs-15 ms-1 text-secondary fw-600">/ module</span>
        </h3>
    </div>


</div>
{{-- endFeatures --}}