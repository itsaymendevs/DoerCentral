{{-- contentSection --}}
<section id="content--section" class="content--section" style="margin-top: 50px">
   <div class="container">











      <div class="row pt-2">
         <div class="col-12 align-self-center">
            <div class="row align-items-end">



               {{-- filters --}}





               {{-- 1: mealType --}}
               <div class="col-3">


                  {{-- heading --}}
                  <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                     <hr style="width: 55%" />
                     <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Type</label>
                  </div>


                  {{-- select --}}
                  <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                     <select class="form--select" data-instance='searchMealType' data-clear='true' required>
                        <option value=""></option>

                        @foreach ($mealTypes as $mealType)
                        <option value="{{ $mealType->id }}">{{ $mealType->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>









               {{-- 2: cuisines --}}
               <div class="col-3">


                  {{-- heading --}}
                  <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                     <hr style="width: 55%" />
                     <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Cuisine</label>
                  </div>


                  {{-- select --}}
                  <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                     <select class="form--select" data-instance='searchCuisine' data-clear='true' required>
                        <option value=""></option>

                        @foreach ($cuisines as $cuisine)
                        <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>








               {{-- 3: tag --}}
               <div class="col-3">


                  {{-- heading --}}
                  <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                     <hr style="width: 55%" />
                     <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Tag</label>
                  </div>


                  {{-- select --}}
                  <div class="select--single-wrapper" wire:loading.class='no-events' wire:ignore>
                     <select class="form--select" data-instance='searchTag' data-clear='true' required>
                        <option value=""></option>

                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>









               {{-- -------------------------------------------- --}}
               {{-- -------------------------------------------- --}}







               {{-- counter - submitButton --}}
               <div class="col-3 d-flex align-items-center justify-content-end">

                  <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                     class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1 me-2"
                     title="Number of Meals">{{ $recipes->total() + $sides->total() + $drinks->total() +
                     $snacks->total() }}</h3>
               </div>










               {{-- -------------------------------- --}}
               {{-- -------------------------------- --}}









               {{-- tabWrapper --}}
               <div class="col-12 mt-4">
                  <div class="tabs--wrap">



                     {{-- tabLinks --}}
                     <ul class="nav nav-tabs inner justify-content-center" role="tablist">


                        {{-- loop - types --}}
                        @foreach ($types as $type)



                        {{-- ** changeLabel --}}
                        @php $type->name == 'Recipe' ? $type->name = 'Meal' : null; @endphp



                        <li class="nav-item" role="presentation">
                           <a class="nav-link @if ($types->first()->id == $type->id) active @endif" role="tab"
                              data-bs-toggle="tab" href="#tab-type-{{ $type->id }}" wire:ignore.self>{{
                              $type->name }}</a>
                        </li>

                        @endforeach
                        {{-- end loop --}}


                     </ul>
                     {{-- end tabLinks --}}









                     {{-- ------------------------ --}}
                     {{-- ------------------------ --}}










                     {{-- tabContent --}}
                     <div class="tab-content">



                        {{-- loop - types --}}
                        @foreach ($types as $type)


                        {{-- tabContent --}}
                        <div class="tab-pane @if ($type->first()->id == $type->id) active @endif no--card"
                           role="tabpanel" id="tab-type-{{ $type->id }}" wire:ignore.self>

                           <div class="row pt-2 mt-zone-cards align-items-center">



                              {{-- loop - recipes --}}
                              @foreach ($combine[$type->id] ?? [] as $item)



                              <div class="col-4 col-xl-3 col-xxl-3">
                                 <div class="overview--card client-version scale--self-05 mb-floating">
                                    <div class="row">



                                       {{-- cover --}}
                                       <div class="col-12 text-center position-relative">
                                          <img class="client--card-logo"
                                             src="{{ url('storage/menu/meals/' . ($item->imageFile ?? $defaultPlate)) }}" />
                                       </div>





                                       {{-- col --}}
                                       <div class="col-12">


                                          {{-- name --}}
                                          <h6 class="text-center fw-bold mt-3 mb-2
                                                            truncate-text-2l height-2l">{{ $item->name}}</h6>



                                          {{-- recipe - mealTypes --}}
                                          @if ($type->name == 'Meal')


                                          <p class="text-center mb-2">
                                             @foreach ($item?->types?->sortBy('mealTypeId') ?? []
                                             as $singleType)
                                             <span class="fs-13 text-warning scale--3 recipe--card-tag ">{{
                                                $singleType->mealType->shortName }}</span>
                                             @endforeach
                                          </p>





                                          {{-- items - source --}}
                                          @else


                                          <p class="text-center fs-13 fw-bold text-danger mb-0">
                                             <button
                                                class="btn btn--raw-icon fs-14 text-warning d-flex align-items-center justify-content-center fw-bold"
                                                type="button">{{ $item?->partType ?? 'Not
                                                Specified'}}</button>
                                          </p>


                                          @endif
                                          {{-- end if --}}


                                       </div>
                                       {{-- endCol --}}




                                       {{-- -------------------------------------- --}}
                                       {{-- -------------------------------------- --}}




                                       {{-- sizes --}}



                                       {{-- :: permission - hasMealView --}}
                                       @if ($versionPermission->menuModuleHasMealFullView ||
                                       session('hasTechAccess'))





                                       <div class="col-12">
                                          <div class="tabs--wrap">

                                             {{-- tabLinks --}}
                                             <ul class="nav nav-tabs inner for-sizes" role="tablist">


                                                {{-- loop - sizes --}}
                                                @foreach ($item->sizes as $mealSize)
                                                <li class="nav-item" role="presentation">
                                                   <a class="nav-link @if ($item->sizes->first()->id == $mealSize->id) active @endif"
                                                      data-bs-toggle="tab"
                                                      href="#tab-{{ $item->id }}-{{ $mealSize->id }}" role="tab">{{
                                                      $mealSize->size->shortName }}</a>
                                                </li>
                                                @endforeach
                                                {{-- end loop --}}


                                             </ul>
                                             {{-- end tabLinks --}}







                                             {{-- --------------------- --}}
                                             {{-- --------------------- --}}




                                             {{-- tabContent --}}
                                             <div class="tab-content">





                                                {{-- loop - sizesMacros --}}
                                                @foreach ($item->sizes as $mealSize)



                                                {{-- 1: sizeTab --}}
                                                <div
                                                   class="tab-pane no--card py-0 px-3 @if ($item->sizes->first()->id == $mealSize->id) active @endif"
                                                   id="tab-{{ $item->id }}-{{ $mealSize->id }}" role="tabpanel">
                                                   <div class="row">



                                                      {{-- price --}}
                                                      <div class="col-12 text-center">
                                                         <h6 class='fw-semibold fs-18 mt-2 mb-2'>{{
                                                            number_format($mealSize->price ?? 0)
                                                            }}<small
                                                               class="ms-1 fw-semibold text-gold fs-10">(AED)</small>
                                                         </h6>
                                                      </div>



                                                      {{-- calories --}}
                                                      <div class="col-3 text-end px-2">
                                                         <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">CA</h6>
                                                            <p class="fs-12">{{
                                                               $mealSize->afterCookCalories }}</p>
                                                         </div>
                                                      </div>

                                                      {{-- proteins --}}
                                                      <div class="col-3 text-end px-2">
                                                         <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">P</h6>
                                                            <p class="fs-12">{{
                                                               $mealSize->afterCookProteins }}</p>
                                                         </div>
                                                      </div>


                                                      {{-- carbs --}}
                                                      <div class="col-3 text-end px-2">
                                                         <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">C</h6>
                                                            <p class="fs-12">{{
                                                               $mealSize->afterCookCarbs }}</p>
                                                         </div>
                                                      </div>



                                                      {{-- fats --}}
                                                      <div class="col-3 text-end px-2">
                                                         <div class="overview--box shrink--self macros-version sm">
                                                            <h6 class="fs-12">F</h6>
                                                            <p class="fs-12">{{
                                                               $mealSize->afterCookFats }}</p>
                                                         </div>
                                                      </div>




                                                   </div>
                                                </div>


                                                @endforeach
                                                {{-- end loop --}}






                                             </div>
                                             {{-- end tabContent --}}



                                          </div>
                                       </div>
                                       {{-- endSizes --}}






                                       @endif
                                       {{-- end if - permission --}}




                                       {{-- ---------------------------------------- --}}
                                       {{-- ---------------------------------------- --}}








                                       {{-- actionButtons --}}
                                       <div class="col-12 mt-3">
                                          <div class="row mx-0 align-items-center">





                                             {{-- counter --}}
                                             <div class="col-8">



                                                {{-- rangeWrapper --}}
                                                <div class="range--input-wrapper">


                                                   {{-- minus --}}
                                                   <button class="btn btn--scheme px-2 range--button minus"
                                                      type="button" data-type="minus"
                                                      data-target="{{ $item->id }}-range-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         class="bi bi-dash-circle">
                                                         <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                         </path>
                                                         <path
                                                            d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z">
                                                         </path>
                                                      </svg>
                                                   </button>






                                                   {{-- input --}}
                                                   <input class="form-control form--input range--input darker"
                                                      type="number" step="1" min="0"
                                                      data-input="{{ $item->id }}-range-1"
                                                      wire:model='instance.mealTypes.{{ $item->id }}'
                                                      data-instance='instance.mealTypes.{{ $item->id }}' required />





                                                   {{-- plus --}}
                                                   <button class="btn btn--scheme px-2 range--button plus" type="button"
                                                      data-type="plus" data-target="{{ $item->id }}-range-1">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         class="bi bi-plus-circle">
                                                         <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                         </path>
                                                         <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                         </path>
                                                      </svg>
                                                   </button>
                                                </div>



                                             </div>
                                             {{-- endCounter --}}




                                             {{-- ------------------------ --}}
                                             {{-- ------------------------ --}}





                                             {{-- submitButton --}}
                                             <div class="col-4 px-2">


                                                <button
                                                   class="btn btn--scheme-outline-1 fs-12 px-1 scale--self-05 w-100 h-100"
                                                   type="button" wire:loading.attr="disabled">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                      fill="currentColor" class="bi bi-cart-plus-fill fs-5"
                                                      viewBox="0 0 16 16">
                                                      <path
                                                         d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
                                                   </svg>
                                                </button>

                                             </div>
                                          </div>

                                       </div>
                                       {{-- end actionCol --}}






                                    </div>
                                 </div>
                              </div>

                              @endforeach
                              {{-- end loop --}}





                              {{-- --------------------------------------- --}}
                              {{-- --------------------------------------- --}}






                              {{-- pagination --}}
                              @if ($combine[$type->id] ?? null)


                              <div class="col-12 mb-4">
                                 {{ $combine[$type->id]->links() }}
                              </div>


                              @endif
                              {{-- end if --}}






                           </div>
                        </div>
                        {{-- end tabContent --}}



                        @endforeach
                        {{-- end loop --}}




                     </div>
                     {{-- end tabContent --}}





                  </div>
               </div>
               {{-- end outerCol --}}



            </div>
         </div>
      </div>
      {{-- endContainer --}}













      {{-- -------------------------------------------------- --}}
      {{-- -------------------------------------------------- --}}









      {{-- -------------------------------------------------- --}}
      {{-- -------------------------------------------------- --}}









   </div>
</section>
{{-- endSection --}}