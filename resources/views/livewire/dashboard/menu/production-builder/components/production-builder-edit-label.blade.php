<div class="d-block">



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
            src="{{ asset('assets/img/placeholder.png') }}" @endif style="height: 170px" />
    </div>




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