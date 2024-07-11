{{-- wrapper --}}
<div class='d-block'>


    {{-- container --}}
    <div class="select--single-wrapper mb-4 mx-auto text-center" wire:loading.class='no-events' wire:ignore>
        <select class="form-select form--select container--select " id='container-select-1' data-instance='container'
            data-trigger='true' data-placeholder='Select Container' data-clear='true' @if ($currentContainer)
            value='{{ $currentContainer->id }}' @endif>

            <option value=""></option>

            @foreach ($containers ?? [] as $container)
            <option value="{{ $container->id }}">{{ $container->name }}</option>
            @endforeach

        </select>
    </div>







    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}







    {{-- containerPreview --}}


    {{-- :: permission - hasContainerPreview --}}
    @if ($versionPermission->menuModuleHasBuilderContainerPreview || session('hasTechAccess'))



    <div>
        <img class="w-100 of-contain" id='container-preview' style="height: 170px" @if ($currentContainer)
            src="{{ asset('storage/stock/items/containers/' . $currentContainer->imageFile) }}" @else
            src="{{ asset('assets/img/placeholder.png') }}" @endif />
    </div>



    @endif
    {{-- end if - permission --}}








    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".container--select").on("change", function(event) {



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
{{-- endWrapper --}}