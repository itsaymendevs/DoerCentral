<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Kitchen Today' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}









        {{-- midRow --}}
        <div class="row align-items-end">


            {{-- date --}}
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <hr style="width: 65%" />
                    <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Date</label>
                </div>

                {{-- input --}}
                <input class="form--input" type="date" />
            </div>





            {{-- :: innerSubMenu --}}
            <livewire:dashboard.manage-kitchen.components.inner-sub-menu />


        </div>
        {{-- end midRow --}}









        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- bottomRow --}}
        <div class="row align-items-center mt-5">


            {{-- search --}}
            <div class="col-4 text-center">
                <input type="text" class="form--input main-version w-100" placeholder="Search by Recipes" />
            </div>



            {{-- actions --}}
            <div class="col-4 text-center">





                {{-- 1: print --}}
                <button
                    class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold"
                    type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg>Print
                </button>






                {{-- 2: exportExcel --}}
                <button
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2"
                    type="button" data-bs-target="#extend-subscription" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>


            </div>
            {{-- endActions --}}





            {{-- -------------------- --}}
            {{-- -------------------- --}}



            {{-- counter --}}
            <div class="col-4 text-end">
                <h3 data-bs-toggle="tooltip" data-bss-tooltip=""
                    class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    title="Number of Recipes">
                    34
                </h3>
            </div>
        </div>
    </div>
    {{-- endBottomRow --}}








    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}









    {{-- tableContainer --}}
    <div class="container-fluid">
        <div class="row mt-4 mb-2">
            <div class="col-12 mt-4">
                <div id="print--table" class="memoir--table w-100 kitchen--table">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- headers --}}
                        <thead>
                            <tr>
                                <th class="th--xs">Type</th>
                                <th class="th--xs">Name</th>
                                <th class="th--sm">Total Grams</th>
                                <th class="th--xs">Meals</th>
                                <th class="th--sm">Total P/S</th>
                                <th class="th--md">Size &amp; Ingredients</th>
                                <th class="th--sm">Allergies</th>
                                <th class="th--lg">Actions</th>
                            </tr>
                        </thead>
                        {{-- endHeaders --}}





                        {{-- body --}}
                        <tbody>


                            {{-- singleRow --}}
                            <tr>



                                {{-- 1: mealType --}}
                                <td class="fw-bold text-start">
                                    <span class="text-center d-block fs-14 fw-normal">Breakfast</span>
                                </td>




                                {{-- mealName --}}
                                <td class="fw-bold text-start">
                                    <span class="d-block fw-normal">Mango Chia Puddin
                                        <small class="fw-semibold text-gold fs-10 d-block">Standard</small>
                                    </span>
                                </td>






                                {{-- totalGrams --}}
                                <td class="text-start">

                                    {{-- 1st item --}}
                                    <span class="mb-2 d-block fw-normal">
                                        <small class="fw-semibold text-gold fs-14 me-1">750.0</small>
                                        Mango chia pudding
                                    </span>


                                    {{-- 2nd --}}
                                    <span class="mb-2 d-block fw-normal">
                                        <small class="fw-semibold text-gold fs-14 me-1">300.0</small>
                                        Mango Comport</span>
                                </td>






                                {{-- totalMeals --}}
                                <td class="scale--3 text-start">
                                    <span class="fs-5 d-block text-center fw-bold">34</span>
                                </td>




                                {{-- --------------------------- --}}
                                {{-- --------------------------- --}}







                                {{-- totalPerSize --}}
                                <td class="text-start">


                                    {{-- size / quantity --}}
                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">Medium</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">20</small>
                                        </span>
                                    </div>




                                    {{-- large --}}
                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">Large</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">14</small>
                                        </span>
                                    </div>
                                </td>










                                {{-- quantityPerSize + its Ingredients (items) --}}
                                <td class="text-start">


                                    {{-- quantityPerSize --}}
                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">Medium</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">20</small>
                                        </span>
                                    </div>





                                    {{-- :: ingredients --}}
                                    <div class="mb-3">



                                        {{-- singlePart --}}
                                        <span class="mb-2 d-block fw-normal">
                                            <small class="fw-semibold text-gold fs-13 me-1">750.0</small>
                                            Mango chia pudding


                                            {{-- :: viewIngredient --}}
                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                                type="button" data-bs-target="#plan-ranges" data-bs-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                    </path>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>






                                        {{-- singlePart --}}
                                        <span class="mb-2 d-block fw-normal">
                                            <small class="fw-semibold text-gold fs-13 me-1">750.0</small>Mango
                                            Comport


                                            {{-- viewPart --}}
                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                                type="button" data-bs-target="#plan-ranges" data-bs-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                    </path>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>

                                    </div>
                                    {{-- end ingredients --}}








                                    {{-- --------------------------------- --}}
                                    {{-- --------------------------------- --}}




                                    {{-- repeat LikeAbove --}}
                                    <div class="kitchen--size-box mb-2">
                                        <h1 class="fs-13 my-0">Large</h1>
                                        <span class="d-block">
                                            <small class="fw-semibold text-gold fs-14">14</small>
                                        </span>
                                    </div>


                                    <div>
                                        <span class="mb-2 d-block fw-normal">
                                            <small class="fw-semibold text-gold fs-13 me-1">1200.0</small>
                                            Mango chia pudding


                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                                type="button" data-bs-target="#plan-ranges" data-bs-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                    </path>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>





                                        <span class="mb-2 d-block fw-normal">
                                            <small class="fw-semibold text-gold fs-13 me-1">115.0</small>
                                            Mango Comport

                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-block scale--3 w-auto ms-1"
                                                type="button" data-bs-target="#plan-ranges" data-bs-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye fs-6"
                                                    style="fill: var(--bs-warning)">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                                    </path>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </td>




                                {{-- empty --}}
                                <td class="text-start"></td>



                                {{-- empty --}}
                                <td class="text-start"></td>


                            </tr>
                        </tbody>
                    </table>
                    {{-- endTable --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}