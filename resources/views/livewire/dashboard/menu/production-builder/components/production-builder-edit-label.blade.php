<div class="d-block text-center">



    {{-- labels --}}
    <div class="select--single-wrapper mb-4 mx-auto text-center" wire:loading.class='no-events' wire:ignore>
        <select class="form-select form--select label--select" data-clear='true' id='label-select-1'
            data-placeholder='Select Label' data-instance='label' data-trigger='true' @if($currentLabel)
            value='{{ $currentLabel->id }}' @endif>

            <option value=""></option>

            @foreach ($labels as $label)
            <option value="{{ $label->id }}">{{ $label->name }}</option>
            @endforeach

        </select>
    </div>










    {{-- :: permission - hasLabelPreview --}}
    @if ($versionPermission->menuModuleHasBuilderLabelPreview)



    {{-- labelPreview --}}
    <div>
        <img class="w-100 of-contain" id='label-preview' @if ($currentLabel)
            src="{{ asset('storage/stock/items/labels/' . $currentLabel->imageFile) }}" @else
            src="{{ asset('assets/img/placeholder.png') }}" @endif style="height: 110px" />
    </div>




    @endif
    {{-- end if - permission --}}










    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}









    {{-- servingTags --}}
    <div class="serving--tags-wrapper d-block mx-auto mt-4">



        {{-- loop - servingInstructions --}}
        @foreach ($servingInstructions ?? [] as $servingInstruction)



        {{-- Tag --}}
        <div class="form-check form-switch mb-2 mealType--checkbox"
            key='serving-instruction-{{ $servingInstruction->id }}'>


            {{-- input --}}
            <input class="form-check-input pointer" style="height: 13px" type="checkbox"
                wire:change='toggleTag({{ $servingInstruction->id }})' wire:loading.attr='disabled'
                id="serving-instruction-{{ $servingInstruction->id }}" @if ($servingInstruction?->isActive)
            checked
            @endif />


            {{-- label --}}
            <label class="form-check-label fs-13" for="serving-instruction-{{ $servingInstruction?->id }}">
                {{ $servingInstruction?->instruction?->name }}</label>



        </div>
        {{-- endTag --}}



        @endforeach
        {{-- end loop --}}




    </div>













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