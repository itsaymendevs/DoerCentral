{{-- content --}}
<section class="content--section" id="content--section">
   <div class="container">
      <div class="row">
         <div class="col-12">



            {{-- tabWraps --}}
            <div class="tabs--wrap">


               {{-- tabLinks --}}
               <ul class="nav nav-tabs mb-4" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
                  data-aos-once="true" role="tablist">

                  {{-- 1: ingredients --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">Ingredients</a>
                  </li>


                  {{-- supplier --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Suppliers</a>
                  </li>


                  {{-- purchases --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Purchases</a>
                  </li>


                  {{-- stock --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-4" role="tab">Stock</a>
                  </li>


                  {{-- configurations --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-5" role="tab">Configurations</a>
                  </li>
               </ul>






               {{-- ------------------------------------------------ --}}
               {{-- ------------------------------------------------ --}}






               {{-- tabContent --}}
               <div class="tab-content">




                  {{-- 1: ingredientsTab --}}
                  <div class="tab-pane fade show active no--card" id="tab-1" role="tabpanel">



                     {{-- :: viewIngredients --}}
                     <livewire:dashboard.inventory.components.inventory-view-ingredients />


                  </div>
                  {{-- end Tab --}}










                  {{-- ------------------------------------------------ --}}
                  {{-- ------------------------------------------------ --}}








                  {{-- 2: suppliersTab --}}
                  <div class="tab-pane fade no--card" id="tab-2" role="tabpanel">



                     {{-- :: viewSuppliers --}}
                     <livewire:dashboard.inventory.components.inventory-view-suppliers />


                  </div>
                  {{-- endTab --}}










                  {{-- ------------------------------------------------ --}}
                  {{-- ------------------------------------------------ --}}







                  {{-- 3: purchasesTab  --}}
                  <div class="tab-pane fade no--card" id="tab-3" role="tabpanel">


                     {{-- :: viewPurchases --}}
                     <livewire:dashboard.inventory.components.inventory-view-purchases />



                  </div>
                  {{-- endTab --}}








                  {{-- ------------------------------------------------ --}}
                  {{-- ------------------------------------------------ --}}












                  {{-- 5: configurationsTab --}}
                  <div class="tab-pane fade no--card" id="tab-5" role="tabpanel">




                     {{-- 1: categories --}}
                     <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">
                        <div class="row">
                           <div class="col-12">
                              <div>



                                 {{-- collapse --}}
                                 <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    href="#collapse-1" role="button" aria-expanded="false"
                                    aria-controls="collapse-1">Categories<svg class="bi bi-chevron-expand"
                                       xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                       fill="currentColor" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd"
                                          d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                       </path>
                                    </svg>
                                 </a>





                                 {{-- collapseContent --}}
                                 <div class="collapse collapse--content" id="collapse-1">
                                    <div class="row align-items-end pt-2">


                                       {{-- cover --}}
                                       <div class="col-5 text-center">
                                          <img class="w-100 inventory--image-frame"
                                             src="{{ asset('assets/img/Allergies/allergy.png') }}" />
                                       </div>



                                       {{-- name - desc --}}
                                       <div class="col-4">
                                          <label class="form-label form--label">Name</label>
                                          <input class="form-control form--input mb-4" type="text" />

                                          <label class="form-label form--label">Description</label>
                                          <textarea class="form-control form--input form--textarea"></textarea>
                                       </div>



                                       {{-- submit --}}
                                       <div class="col-3 text-center">
                                          <button
                                             class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                             data-bs-dismiss="modal" type="button">
                                             Save
                                          </button>
                                       </div>








                                       {{-- ------------------------------------------------- --}}
                                       {{-- ------------------------------------------------- --}}






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
                                                   <tr>





                                                      {{-- name - desc --}}
                                                      <td class="fw-bold">CA-001</td>

                                                      <td class="fw-bold">
                                                         <input class="form-control form--input form--table-input"
                                                            type="text" required />
                                                      </td>


                                                      <td class="fw-bold">
                                                         <textarea class="form-control form--input form--textarea" required></textarea>
                                                      </td>






                                                      {{-- remove --}}
                                                      <td>
                                                         <div class="d-flex align-items-center justify-content-center">
                                                            <button class="btn btn--raw-icon inline remove scale--3"
                                                               type="button">
                                                               <svg class="bi bi-trash-fill"
                                                                  xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" fill="currentColor"
                                                                  viewBox="0 0 16 16">
                                                                  <path
                                                                     d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                                  </path>
                                                               </svg>
                                                            </button>
                                                         </div>
                                                      </td>

                                                   </tr>
                                                   {{-- end loop --}}



                                                </tbody>
                                                {{-- end tbody --}}


                                             </table>
                                          </div>
                                       </div>
                                       {{-- end tableView --}}





                                    </div>
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
                                 <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    href="#collapse-2" role="button" aria-expanded="false"
                                    aria-controls="collapse-2">Groups<svg class="bi bi-chevron-expand"
                                       xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                       fill="currentColor" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd"
                                          d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                       </path>
                                    </svg>
                                 </a>






                                 {{-- collapseContent --}}
                                 <div class="collapse collapse--content" id="collapse-2">
                                    <div class="row align-items-end pt-2">



                                       {{-- cover --}}
                                       <div class="col-5 text-center">
                                          <img class="w-100 inventory--image-frame"
                                             src="{{ asset('assets/img/Allergies/allergy.png') }}" />
                                       </div>



                                       {{-- name - desc --}}
                                       <div class="col-4">
                                          <label class="form-label form--label">Name</label>
                                          <input class="form-control form--input mb-4" type="text" />

                                          <label class="form-label form--label">Description</label>
                                          <textarea class="form-control form--input form--textarea"></textarea>
                                       </div>



                                       {{-- submitButton --}}
                                       <div class="col-3 text-center">
                                          <button
                                             class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                             data-bs-dismiss="modal" type="button">
                                             Save
                                          </button>
                                       </div>







                                       {{-- --------------------------------------- --}}
                                       {{-- --------------------------------------- --}}




                                       {{-- tableView --}}
                                       <div class="col-12 mt-5" data-view="table">
                                          <div class="table-responsive memoir--table w-100">
                                             <table class="table table-bordered" id="memoir--table">


                                                {{-- thead --}}
                                                <thead>
                                                   <tr>
                                                      <th class="th--xs"></th>
                                                      <th class="th--md" s="">Group</th>
                                                      <th class="th--md">Description</th>
                                                      <th class="th--xs"></th>
                                                   </tr>
                                                </thead>



                                                {{-- tbody --}}
                                                <tbody>


                                                   {{-- loop - categories --}}
                                                   <tr>





                                                      {{-- name - desc --}}
                                                      <td class="fw-bold">CA-001</td>

                                                      <td class="fw-bold">
                                                         <input class="form-control form--input form--table-input"
                                                            type="text" required />
                                                      </td>


                                                      <td class="fw-bold">
                                                         <textarea class="form-control form--input form--textarea" required></textarea>
                                                      </td>






                                                      {{-- remove --}}
                                                      <td>
                                                         <div class="d-flex align-items-center justify-content-center">
                                                            <button class="btn btn--raw-icon inline remove scale--3"
                                                               type="button">
                                                               <svg class="bi bi-trash-fill"
                                                                  xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" fill="currentColor"
                                                                  viewBox="0 0 16 16">
                                                                  <path
                                                                     d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                                  </path>
                                                               </svg>
                                                            </button>
                                                         </div>
                                                      </td>

                                                   </tr>
                                                   {{-- end loop --}}



                                                </tbody>
                                                {{-- end tbody --}}


                                             </table>
                                          </div>
                                       </div>
                                       {{-- end tableView --}}




                                    </div>
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
                                 <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    href="#collapse-3" role="button" aria-expanded="false"
                                    aria-controls="collapse-3">Excludes<svg class="bi bi-chevron-expand"
                                       xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                       fill="currentColor" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd"
                                          d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                       </path>
                                    </svg>
                                 </a>




                                 {{-- collapseContent --}}
                                 <div class="collapse collapse--content" id="collapse-3">
                                    <div class="row align-items-end pt-2">


                                       {{-- cover --}}
                                       <div class="col-5 text-center">
                                          <img class="w-100 inventory--image-frame"
                                             src="{{ asset('assets/img/Allergies/allergy.png') }}" />
                                       </div>



                                       {{-- name - description --}}
                                       <div class="col-4">
                                          <label class="form-label form--label">Name</label>
                                          <input class="form-control form--input mb-4" type="text" />

                                          <label class="form-label form--label">Description</label>
                                          <textarea class="form-control form--input form--textarea"></textarea>
                                       </div>




                                       {{-- submitButton --}}
                                       <div class="col-3 text-center">
                                          <button
                                             class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                             data-bs-dismiss="modal" type="button">
                                             Save
                                          </button>
                                       </div>






                                       {{-- --------------------------------------- --}}
                                       {{-- --------------------------------------- --}}




                                       {{-- tableView --}}
                                       <div class="col-12 mt-5" data-view="table">
                                          <div class="table-responsive memoir--table w-100">
                                             <table class="table table-bordered" id="memoir--table">


                                                {{-- thead --}}
                                                <thead>
                                                   <tr>
                                                      <th class="th--xs"></th>
                                                      <th class="th--md" s="">Exclude</th>
                                                      <th class="th--md">Description</th>
                                                      <th class="th--xs"></th>
                                                   </tr>
                                                </thead>



                                                {{-- tbody --}}
                                                <tbody>


                                                   {{-- loop - categories --}}
                                                   <tr>





                                                      {{-- name - desc --}}
                                                      <td class="fw-bold">CA-001</td>

                                                      <td class="fw-bold">
                                                         <input class="form-control form--input form--table-input"
                                                            type="text" required />
                                                      </td>


                                                      <td class="fw-bold">
                                                         <textarea class="form-control form--input form--textarea" required></textarea>
                                                      </td>






                                                      {{-- remove --}}
                                                      <td>
                                                         <div class="d-flex align-items-center justify-content-center">
                                                            <button class="btn btn--raw-icon inline remove scale--3"
                                                               type="button">
                                                               <svg class="bi bi-trash-fill"
                                                                  xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" fill="currentColor"
                                                                  viewBox="0 0 16 16">
                                                                  <path
                                                                     d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                                  </path>
                                                               </svg>
                                                            </button>
                                                         </div>
                                                      </td>

                                                   </tr>
                                                   {{-- end loop --}}



                                                </tbody>
                                                {{-- end tbody --}}


                                             </table>
                                          </div>
                                       </div>
                                       {{-- end tableView --}}



                                    </div>
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
                                 <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    href="#collapse-4" role="button" aria-expanded="false"
                                    aria-controls="collapse-4">Allergies<svg class="bi bi-chevron-expand"
                                       xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                       fill="currentColor" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd"
                                          d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                       </path>
                                    </svg>
                                 </a>






                                 {{-- collapseContent --}}
                                 <div class="collapse collapse--content" id="collapse-4">
                                    <div class="row align-items-end pt-2">


                                       {{-- cover --}}
                                       <div class="col-5 text-center">
                                          <img class="w-100 inventory--image-frame"
                                             src="{{ asset('assets/img/Allergies/allergy.png') }}" />
                                       </div>



                                       {{-- name - desc --}}
                                       <div class="col-4">
                                          <label class="form-label form--label">Name</label>
                                          <input class="form-control form--input mb-4" type="text" />

                                          <label class="form-label form--label">Description</label>
                                          <textarea class="form-control form--input form--textarea"></textarea>
                                       </div>





                                       {{-- submitButton --}}
                                       <div class="col-3 text-center">
                                          <button
                                             class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                             data-bs-dismiss="modal" type="button">
                                             Save
                                          </button>
                                       </div>








                                       {{-- --------------------------------------- --}}
                                       {{-- --------------------------------------- --}}




                                       {{-- tableView --}}
                                       <div class="col-12 mt-5" data-view="table">
                                          <div class="table-responsive memoir--table w-100">
                                             <table class="table table-bordered" id="memoir--table">


                                                {{-- thead --}}
                                                <thead>
                                                   <tr>
                                                      <th class="th--xs"></th>
                                                      <th class="th--md" s="">Allergy</th>
                                                      <th class="th--md">Description</th>
                                                      <th class="th--xs"></th>
                                                   </tr>
                                                </thead>



                                                {{-- tbody --}}
                                                <tbody>


                                                   {{-- loop - categories --}}
                                                   <tr>





                                                      {{-- name - desc --}}
                                                      <td class="fw-bold">CA-001</td>

                                                      <td class="fw-bold">
                                                         <input class="form-control form--input form--table-input"
                                                            type="text" required />
                                                      </td>


                                                      <td class="fw-bold">
                                                         <textarea class="form-control form--input form--textarea" required></textarea>
                                                      </td>






                                                      {{-- remove --}}
                                                      <td>
                                                         <div class="d-flex align-items-center justify-content-center">
                                                            <button class="btn btn--raw-icon inline remove scale--3"
                                                               type="button">
                                                               <svg class="bi bi-trash-fill"
                                                                  xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                  height="1em" fill="currentColor"
                                                                  viewBox="0 0 16 16">
                                                                  <path
                                                                     d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                                  </path>
                                                               </svg>
                                                            </button>
                                                         </div>
                                                      </td>

                                                   </tr>
                                                   {{-- end loop --}}



                                                </tbody>
                                                {{-- end tbody --}}


                                             </table>
                                          </div>
                                       </div>
                                       {{-- end tableView --}}





                                    </div>
                                 </div>
                                 {{-- end tableView --}}



                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- end collapse --}}


                  </div>
                  {{-- endTab --}}


               </div>
            </div>
            {{-- end tabsWrap --}}



         </div>
      </div>
   </div>
   {{-- endContainer --}}


















   {{-- ------------------------------------------ --}}
   {{-- ------------------------------------------ --}}




   @section('modals')
      {{-- 1: createIngredient --}}
      <livewire:dashboard.inventory.components.inventory-create-ingredient />

      {{-- 1.2: editIngredient --}}
      <livewire:dashboard.inventory.components.inventory-edit-ingredient />



      {{-- --------------------------- --}}


      {{-- 2: createSupplier --}}
      <livewire:dashboard.inventory.components.inventory-create-supplier />

      {{-- 2.2: editSupplier --}}
      <livewire:dashboard.inventory.components.inventory-edit-supplier />

      {{-- 2.2: supplierIngredients --}}
      <livewire:dashboard.inventory.components.inventory-manage-supplier-ingredients />


      {{-- --------------------------- --}}


      {{-- 2: createPurchase --}}
      <livewire:dashboard.inventory.components.inventory-create-purchase />

      {{-- 2.2: editPurchase --}}
      <livewire:dashboard.inventory.components.inventory-edit-purchase />

      {{-- 2.2: viewPurchaseIngredients --}}
      <livewire:dashboard.inventory.components.inventory-view-purchase-ingredients />
   @endsection





   {{-- ------------------------------------------ --}}
   {{-- ------------------------------------------ --}}





</section>
{{-- endContent --}}
