<div class="col-3">



    {{-- labels --}}
    <label class="form-label form--label justify-content-center">Label Type</label>


    {{-- select --}}
    <div class="select--single-wrapper mb-4 mx-auto" wire:loading.class='no-events' wire:ignore>
        <select class="form-select form--select label--select" data-clear='true' id='label-select-1'
            data-instance='label' data-trigger='true' @if($currentLabel) value='{{ $currentLabel->id }}' @endif>

            <option value=""></option>

            @foreach ($labels as $label)
            <option value="{{ $label->id }}">{{ $label->name }}</option>
            @endforeach

        </select>
    </div>






    {{-- labelCost --}}
    <input type="hidden" id='labelCost' value='{{ $currentLabel ? $currentLabel?->charge ?? 0 : 0 }}'>










    {{-- :: permission - hasLabelPreview --}}
    @if ($versionPermission->menuModuleHasBuilderLabelPreview)



    {{-- labelPreview --}}
    <div>
        <img class="w-100 of-contain" id='container-preview' @if ($currentLabel)
            src="{{ asset('storage/kitchen/labels/' . $currentLabel->imageFile) }}" @else
            src="{{ asset('assets/img/placeholder.png') }}" @endif style="height: 170px" />
    </div>




    @endif
    {{-- end if - permission --}}













    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





    {{-- cutlery --}}


    {{-- :: permission - hasCutlery --}}
    @if ($versionPermission->menuModuleHasBuilderCutlery)




    <div class="mt-4 w-100 mx-auto">
        <div class="form-check form-switch mb-2 mealType--checkbox justify-content-center">


            {{-- input --}}
            <input class="form-check-input pointer" @if ($useCutlery) checked @endif type="checkbox"
                id="cutlery-checkbox-1" wire:model='useCutlery' wire:change='toggleCutlery' wire:loading.attr='disabled'
                wire:target='update, toggleCutlery' />


            {{-- label --}}
            <label class="form-check-label" for="cutlery-checkbox-1">Include Cutlery</label>
        </div>
    </div>






    {{-- cutleryCost --}}
    <input type="hidden" id='cutleryCost' value='{{ $useCutlery ? $cutleryPrice : 0 }}'>



    @endif
    {{-- end if - permission --}}







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".label--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);
         @this.update();



      }); //end function
    </script>





    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





</div>
{{-- endCol --}}