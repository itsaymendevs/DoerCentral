{{-- viewPuchase --}}
<div class="modal fade modal--shadow" id="view-purchase" role="dialog" tabindex="-1" wire:ignore.self>
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body py-0 px-0">



            {{-- header --}}
            <header class="modal--header px-4">
               <h5 class="mb-0 fw-bold text-white">View Purchase</h5>
               <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                  data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                  <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                  </svg>
               </button>
            </header>






            {{-- ----------------------------------------- --}}
            {{-- ----------------------------------------- --}}





            {{-- form --}}
            <form class="px-4">
               <div class="row row pt-2 mb-4">


                  {{-- supplierName --}}
                  <div class="col-4">
                     <label class="form-label form--label">Supplier</label>
                     <input class="form-control form--input mb-4 readonly" type="text" value="LLC Vendor"
                        readonly="" />
                  </div>


                  {{-- empty --}}
                  <div class="col-4"></div>


                  {{-- po. --}}
                  <div class="col-4">
                     <label class="form-label form--label">P.O Number</label>
                     <input class="form-control form--input mb-4 readonly" type="text" value="00001"
                        readonly="" />
                  </div>





                  {{-- overviewTable --}}
                  <div class="col-12">
                     <div class="row align-items-center">
                        <div class="col-12 mt-3">
                           <div class="table-responsive memoir--table">
                              <table class="table table-bordered" id="memoir--table">


                                 {{-- head --}}
                                 <thead>
                                    <tr>
                                       <th>Ingredient</th>
                                       <th>Unit</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Total Price</th>
                                    </tr>
                                 </thead>



                                 {{-- body --}}
                                 <tbody>


                                    {{-- loop - --}}
                                    <tr>
                                       <td>Garlic Bread</td>
                                       <td>KG</td>
                                       <td>12</td>
                                       <td>100</td>
                                       <td>12,000</td>
                                    </tr>

                                 </tbody>
                              </table>
                           </div>
                           {{-- end tableView --}}

                        </div>
                     </div>
                  </div>
                  {{-- endCol --}}



               </div>
            </form>
            {{-- endForm --}}



         </div>
      </div>
   </div>
</div>
{{-- endModal --}}
