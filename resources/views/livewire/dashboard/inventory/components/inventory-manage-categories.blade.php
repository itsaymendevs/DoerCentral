{{-- wrapper --}}
<div>


   {{-- form --}}
   <form class="row align-items-end pt-2" wire:submit='store'>




      {{-- cover --}}
      <div class="col-5 text-center">
         <img class="w-100 inventory--image-frame" src="{{ asset('assets/img/Allergies/allergy.png') }}" />
      </div>



      {{-- name - desc --}}
      <div class="col-4">
         <label class="form-label form--label">Name</label>
         <input class="form-control form--input mb-4" type="text" wire:model='instance.name' required />

         <label class="form-label form--label">Description</label>
         <textarea class="form-control form--input form--textarea" wire:model='instance.desc' required></textarea>
      </div>



      {{-- submit --}}
      <div class="col-3 text-center">
         <button
            class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
            wire:loading.attr='disabled'>
            Save
         </button>
      </div>


   </form>
   {{-- endForm --}}








   {{-- ------------------------------------------------- --}}
   {{-- ------------------------------------------------- --}}







   {{-- tableView Row --}}
   <div class="row align-items-end pt-2">


      {{-- tableView --}}
      <div class="col-12 mt-5" data-view="table">
         <div class="table-responsive memoir--table w-100">
            <table class="table table-bordered" id="memoir--table">


               {{-- thead --}}
               <thead>
                  <tr>
                     <th class="th--xs"></th>
                     <th class="th--md" s="">Category</th>
                     <th class="th--md">Description</th>
                     <th class="th--xs"></th>
                  </tr>
               </thead>



               {{-- tbody --}}
               <tbody>


                  {{-- loop - categories --}}
                  @foreach ($categories as $category)
                     <livewire:dashboard.inventory.components.inventory-view-category key='{{ now() }}'
                        :id='$category->id' />
                  @endforeach
                  {{-- end loop --}}



               </tbody>
               {{-- end tbody --}}


            </table>
         </div>
      </div>
   </div>
   {{-- endRow --}}



</div>
{{-- endWrapper --}}
