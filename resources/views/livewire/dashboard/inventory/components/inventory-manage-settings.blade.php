{{-- wrapper --}}
<div class='d-block'>





   {{-- 1: categories --}}
   <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">
      <div class="row">
         <div class="col-12">
            <div>



               {{-- collapse --}}
               <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-1" role="button"
                  aria-expanded="false" aria-controls="collapse-1">Categories<svg class="bi bi-chevron-expand"
                     xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                     </path>
                  </svg>
               </a>







               {{-- collapseContent --}}
               <div class="collapse collapse--content" id="collapse-1">



                  {{-- :: store - view - update --}}
                  <livewire:dashboard.inventory.components.inventory-manage-categories />


               </div>
               {{-- end collapseDiv --}}


            </div>
         </div>
      </div>
   </div>
   {{-- end collapse --}}







   {{-- ---------------------------------------- --}}
   {{-- ---------------------------------------- --}}








   {{-- 2: groupsCollapse --}}
   <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">
      <div class="row">
         <div class="col-12">
            <div>


               {{-- collapseButton --}}
               <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-2" role="button"
                  aria-expanded="false" aria-controls="collapse-2">Groups<svg class="bi bi-chevron-expand"
                     xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                     </path>
                  </svg>
               </a>






               {{-- collapseContent --}}
               <div class="collapse collapse--content" id="collapse-2">



                  {{-- :: store - view - update --}}
                  <livewire:dashboard.inventory.components.inventory-manage-groups />



               </div>
               {{-- end collapseContent --}}



            </div>
         </div>
      </div>
   </div>
   {{-- end collapse --}}











   {{-- ---------------------------------------- --}}
   {{-- ---------------------------------------- --}}










   {{-- 3: excludeCollapse --}}
   <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">
      <div class="row">
         <div class="col-12">
            <div>



               {{-- collapse --}}
               <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-3" role="button"
                  aria-expanded="false" aria-controls="collapse-3">Excludes<svg class="bi bi-chevron-expand"
                     xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                     </path>
                  </svg>
               </a>




               {{-- collapseContent --}}
               <div class="collapse collapse--content" id="collapse-3">



                  {{-- :: store - view - update --}}
                  <livewire:dashboard.inventory.components.inventory-manage-excludes />


               </div>
               {{-- end tableView --}}


            </div>
         </div>
      </div>
   </div>
   {{-- endCollapse --}}












   {{-- ----------------------------------------- --}}
   {{-- ----------------------------------------- --}}









   {{-- 4: allergyCollapse --}}
   <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">
      <div class="row">
         <div class="col-12">
            <div>



               {{-- collapseButton --}}
               <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse" href="#collapse-4" role="button"
                  aria-expanded="false" aria-controls="collapse-4">Allergies<svg class="bi bi-chevron-expand"
                     xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                     viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                     </path>
                  </svg>
               </a>






               {{-- collapseContent --}}
               <div class="collapse collapse--content" id="collapse-4">


                  {{-- :: store - view - update --}}
                  <livewire:dashboard.inventory.components.inventory-manage-allergies />


               </div>
               {{-- end tableView --}}



            </div>
         </div>
      </div>
   </div>
   {{-- end collapse --}}




</div>
{{-- endWrap --}}
