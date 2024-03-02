{{-- contentSection --}}
<section class="content--section" id="content--section">
   <div class="container">





      {{-- :: SubMenu --}}
      <livewire:dashboard.menu.components.sub-menu />




      {{-- ----------------------------------------- --}}
      {{-- ----------------------------------------- --}}






      {{-- contentRow --}}
      <div class="row row pt-2 align-items-center mb-5">
         <div class="col-12 plans-column" data-view="standard" data-instance="1">


            {{-- tabWrap --}}
            <div class="tabs--wrap">


               {{-- navLinks --}}
               <ul class="nav nav-tabs inner" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">General</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Ingredients</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Packings</a>
                  </li>
               </ul>
               {{-- end navLinks --}}







               {{-- -------------------------------------------- --}}
               {{-- -------------------------------------------- --}}






               {{-- tabContetn --}}
               <div class="tab-content">




                  {{-- 1: generalTab --}}
                  <div class="tab-pane active no--card" id="tab-1" role="tabpanel">

                     <livewire:dashboard.menu.production-builder.components.production-builder-update-general
                        :id='$meal->id' key='{{ now() }}' />

                  </div>
                  {{-- endTab --}}









                  {{-- --------------------------------------------------- --}}
                  {{-- --------------------------------------------------- --}}








                  {{-- 2: ingredientsTab --}}
                  <div class="tab-pane no--card" id="tab-2" role="tabpanel">


                     <livewire:dashboard.menu.production-builder.components.production-builder-manage-ingredients
                        key='{{ now() }}' :id='$meal->id' />

                  </div>
                  {{-- endTab --}}





                  {{-- -------------------------------------------------- --}}
                  {{-- -------------------------------------------------- --}}






                  <div class="tab-pane no--card" id="tab-3" role="tabpanel">
                     <form>
                        <div class="row align-items-start pt-2 mb-5 pb-4">
                           <div class="col-9">
                              <div class="row align-items-center">
                                 <div class="col-11">
                                    <label class="form-label form--label">Serving Description</label>
                                    <textarea class="form-control form--input form--textarea mb-4"></textarea>
                                 </div>
                              </div>
                              <div class="row align-items-center">
                                 <div class="col-11">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                       <hr class="w-75" />
                                       <label
                                          class="form-label form--label px-3 w-25 justify-content-center mb-0">Packing
                                          Items</label>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <label class="form-label form--label">Packing</label><input
                                       class="form-control form--input mb-4" type="text" />
                                 </div>
                                 <div class="col-3">
                                    <label class="form-label form--label">Remarks</label><input
                                       class="form-control form--input mb-4" type="text" />
                                 </div>
                                 <div class="col-2">
                                    <label class="form-label form--label">Amount&nbsp;</label><input
                                       class="form-control form--input mb-4" type="number" />
                                 </div>
                                 <div class="col-3 text-center">
                                    <button
                                       class="btn btn--scheme btn--scheme-2 px-4 scalemix--3 py-1 d-inline-flex align-items-center fs-13"
                                       type="button">
                                       <svg class="bi bi-plus-circle-dotted fs-6 me-2"
                                          xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                          fill="currentColor" viewBox="0 0 16 16">
                                          <path
                                             d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                                          </path>
                                       </svg>Append
                                    </button>
                                 </div>
                              </div>
                              <div class="row align-items-center">
                                 <div class="col-11">
                                    <div class="table-responsive memoir--table w-100">
                                       <table class="table table-bordered" id="memoir--table">
                                          <thead>
                                             <tr>
                                                <th class="th--xs"></th>
                                                <th class="th--md">Packing</th>
                                                <th class="th--xs">Amount</th>
                                                <th class="th--md">Remark</th>
                                                <th class="th--xs"></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="fw-bold">01</td>
                                                <td class="fw-bold">Packing Item 1</td>
                                                <td>30</td>
                                                <td class="scale--3">
                                                   Note about packing item
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center justify-content-center">
                                                      <button class="btn btn--raw-icon inline remove scale--3"
                                                         type="button">
                                                         <svg class="bi bi-trash-fill"
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                               d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                            </path>
                                                         </svg>
                                                      </button>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <label class="form-label form--label justify-content-center">Label Type</label>
                              <div class="select--single-wrapper mb-4 mx-auto">
                                 <select class="form-select form--select2">
                                    <option value=""></option>
                                    <option value="1">FIrst Option</option>
                                 </select>
                              </div>
                              <div>
                                 <img class="w-100 of-contain" src="../assets/img/Containers/3.png"
                                    style="height: 170px" />
                              </div>
                              <div class="mt-4 w-100 mx-auto">
                                 <div class="form-check form-switch mb-2 mealType--checkbox justify-content-center">
                                    <input class="form-check-input pointer" id="formCheck-5" type="checkbox"
                                       checked="" /><label class="form-check-label" for="formCheck-5">Include
                                       Cutlery</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end contentSection --}}
