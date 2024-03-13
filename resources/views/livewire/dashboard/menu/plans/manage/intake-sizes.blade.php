{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.plans.manage.components.sub-menu :$id />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row row mt-4 align-items-center mb-5">
            <div class="col-12">



                {{-- bundlesTab --}}
                <div class="tabs--wrap">


                    {{-- navLinks --}}
                    <ul class="nav nav-tabs mb-4" role="tablist" data-aos="flip-up" data-aos-duration="600"
                        data-aos-delay="800" data-aos-once="true" wire:ignore.self>


                        {{-- loop - bundles --}}
                        @foreach ($bundles as $bundle)

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" role="tab" data-bs-toggle="tab"
                                href="#tab-bundle-{{ $bundle->id }}">{{ $bundle->name
                                }}</a>
                        </li>

                        @endforeach
                        {{-- end loop --}}

                    </ul>
                    {{-- end navLinks --}}







                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}











                    {{-- tabContent --}}
                    <div class="tab-content">
                        <div class="tab-pane fade show active no--card" role="tabpanel" id="tab-1">
                            <div>
                                <ul class="nav nav-tabs inner" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                            data-bs-toggle="tab" href="#tab-10">800 - 1000</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                            data-bs-toggle="tab" href="#tab-11">1000 - 1200</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                            data-bs-toggle="tab" href="#tab-12">1200 - 1400</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                            data-bs-toggle="tab" href="#tab-13">1400 - 1600</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane no--card" role="tabpanel" id="tab-10">
                                        <div class="row row pt-2 align-items-center mb-4">
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Breakfast</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-1" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-1">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-2" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-2">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-3" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-3">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-29" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-29">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-30" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-30">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-31" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-31">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack II</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-26" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-26">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-27" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-27">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-28" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-28">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-23" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-23">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-24" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-24">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-25" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-25">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch
                                                                Side</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-20" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-20">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-21" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-21">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-22" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-22">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Afternoon
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-17" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-17">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-18" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-18">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-19" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-19">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane no--card" role="tabpanel" id="tab-11">
                                        <div class="row row pt-2 align-items-center mb-4">
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Breakfast</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-32" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-32">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-33" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-33">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-34" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-34">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-35" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-35">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-36" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-36">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-37" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-37">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack II</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-38" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-38">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-39" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-39">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-40" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-40">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-41" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-41">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-42" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-42">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-43" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-43">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch
                                                                Side</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-44" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-44">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-45" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-45">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-46" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-46">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Afternoon
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-47" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-47">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-48" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-48">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-49" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-49">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane no--card" role="tabpanel" id="tab-12">
                                        <div class="row row pt-2 align-items-center mb-4">
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Breakfast</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-50" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-50">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-51" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-51">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-52" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-52">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-53" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-53">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-54" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-54">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-55" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-55">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack II</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-56" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-56">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-57" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-57">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-58" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-58">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-59" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-59">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-60" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-60">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-61" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-61">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch
                                                                Side</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-62" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-62">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-63" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-63">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-64" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-64">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Afternoon
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-65" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-65">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-66" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-66">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-67" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-67">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane active no--card" role="tabpanel" id="tab-13">
                                        <div class="row row pt-2 align-items-center mb-4">
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Breakfast</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-68" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-68">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-69" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-69">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-70" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-70">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-71" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-71">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-72" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-72">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-73" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-73">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Morning
                                                                Snack II</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-74" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-74">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-75" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-75">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-76" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-76">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-77" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-77">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-78" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-78">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-79" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-79">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Lunch
                                                                Side</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-80" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-80">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-81" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-81">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-82" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-82">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-2 mb-5" data-view="table">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <hr class="w-100"><label
                                                                class="form-label form--label px-3 mb-0 w-75 justify-content-center fs-12">Afternoon
                                                                Snack</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center"><input type="text"
                                                            class="form--input mb-3" placeholder="Meal Price">
                                                        <div class="overview--box shrink--self macros-version">
                                                            <h6>Calories</h6>
                                                            <p class="truncate-text-1l"><input type="number"
                                                                    class="form--input form--table-input-xs text-center"
                                                                    value="250"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="ms-3">
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-83" checked="" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-83">Small</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-84" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-84">Medium</label></div>
                                                            <div class="form-check mb-2 itemType--radio"><input
                                                                    class="form-check-input fs-15" type="radio"
                                                                    id="formCheck-85" name="snackType"><label
                                                                    class="form-check-label fs-14 ms-2"
                                                                    for="formCheck-85">Large</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>