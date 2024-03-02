{{-- wrapper --}}
<div class='d-block'>


   {{-- container --}}
   <label class="form-label form--label justify-content-center">Container</label>


   <div class="select--single-wrapper mb-4 mx-auto" wire:ignore>
      <select class="form-select form--select" id='container-select-1' data-instance='container'
         @if ($currentContainer) value='{{ $currentContainer->id }}' @endif>

         <option value=""></option>

         @foreach ($containers as $container)
            <option value="{{ $container->id }}">{{ $container->name }}</option>
         @endforeach

      </select>
   </div>




   {{-- containerPreview --}}
   <div>
      <img class="w-100 of-contain" id='container-preview' style="height: 170px"
         @if ($currentContainer) src="{{ asset('storage/kitchen/containers/' . $currentContainer->imageFile) }}"
         @else src="{{ asset('assets/img/placeholder.png') }}" @endif />
   </div>









   {{-- -------------------------------------------------- --}}
   {{-- -------------------------------------------------- --}}







   {{-- select-handle --}}
   <script>
      $(".form--select, .form--modal-select").on("change", function(event) {



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
