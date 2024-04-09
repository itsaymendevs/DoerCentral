<div class="col-6 col-lg-4 col-xl-3 col-xxl-2 mt-2 mb-5" data-view="table">
    <div class="row align-items-center">


        {{-- mealType - subtitle --}}
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-2 hr--title">
                <hr class="w-25">
                <label class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">{{
                    $instance->mealTypeName }}</label>
            </div>
        </div>





        {{-- size - calories - price --}}
        <div class="col-12 text-center">



            <div class="select--single-wrapper mb-3" wire:loading.class='no-events' wire:ignore>
                <select class="form-select form--select" data-instance='instance.sizeId' required
                    data-placeholder='Size' value='{{ $instance->sizeId }}'>
                    <option value=""></option>

                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>







            {{-- price --}}
            <input type="number" step='0.01' class="form--input mb-3 text-center" placeholder="Price"
                wire:model='instance.price' data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                title="{{ $instance->mealTypeName }} Price" wire:change='update' wire:loading.attr='readonly'
                wire:target='updateSize, update' required>






            {{-- caloriesFromSize --}}
            <div class="overview--box shrink--self macros-version">
                <h6>Calories</h6>
                <p>
                    <input type="number" step='0.01' class="form--input form--table-input-xs text-center"
                        wire:model='instance.calories' wire:change='update' wire:loading.attr='readonly'
                        wire:target='updateSize, update' required>
                </p>
            </div>
        </div>






    </div>
    {{-- endRow --}}














    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);
         @this.updateSize();


      }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</div>
{{-- endCol --}}