<section id="content--section" class="content--section">
    <div class="container">





        {{-- submenu --}}
        <livewire:dashboard.brands.brands-details.components.submenu id='{{ $brand->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- outerRow --}}
        <form wire:submit='update' class="row align-items-start pt-3 row mb-5">



            {{-- leftCol --}}
            <div class="col-12 col-xl-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>



                {{-- overviewRow --}}
                <div class="row align-items-center">



                    {{-- tradeFile --}}
                    <div class="col-6">


                        {{-- 1: PDF --}}
                        @if (str_contains($brand?->tradeFile, '.pdf'))


                        <img src="{{ url('assets/img/helpers/PDF.png') }}" class='of-contain w-100 mb-4 p-2'
                            style="height: 200px">


                        {{-- 2: regular --}}
                        @else


                        <img src="{{ url('https://doer.ae/on-boarding/public/storage/clients/trades/' . $brand->tradeFile) }}"
                            class='of-contain w-100 mb-4' style="height: 200px">

                        @endif
                        {{-- end if --}}




                    </div>




                    {{-- leftCol --}}
                    <div class="col-6">
                        <div class="d-block text-center">





                            {{-- 1: print --}}
                            <button
                                class="btn btn--scheme btn-outline-warning align-items-center d-inline-flex w-75 fs-13 justify-content-center fw-semibold mb-2 print--btn"
                                data-print="#trade--{{ $brand->id }}" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-printer fs-6 me-2">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                    </path>
                                </svg>Print
                            </button>







                            {{-- 1.2: download --}}
                            <a href="{{ url('https://doer.ae/on-boarding/public/storage/clients/trades/' . $brand->tradeFile) }}"
                                class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex w-75 fs-13 justify-content-center fw-semibold mb-2 download--btn"
                                target='_blank'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-download fs-6 me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5">
                                    </path>
                                    <path
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z">
                                    </path>
                                </svg>Download
                            </a>










                        </div>
                    </div>
                    {{-- endWrapper --}}







                    {{-- ----------------------------------------------- --}}
                    {{-- ----------------------------------------------- --}}
                    {{-- ----------------------------------------------- --}}






                    {{-- subscription --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Subscription</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d M, Y', strtotime($brand->created_at)) }}</p>
                        </div>
                    </div>




                    {{-- subscription - untilDate --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Until Date</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d M, Y', strtotime($brand->created_at .
                                '+30 days')) }}</p>
                        </div>
                    </div>




                </div>
            </div>
            {{-- end leftCol --}}








            {{-- -------------------------------------------- --}}
            {{-- -------------------------------------------- --}}








            {{-- rightCol --}}
            <div class="col-12 col-xl-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>


                {{-- topRow --}}
                <div class="row mb-3">






                    {{-- businessName --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Business Name</label>
                        </div>
                        <input type="text" step='0.01' class="form--input mb-4" wire:model='instance.name' />
                    </div>



                    {{-- officialEmail --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Official Email</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.email' />
                    </div>










                    {{-- address --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 mb-0">Full Address</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.address' />
                    </div>









                    {{-- ----------------------- --}}
                    {{-- ----------------------- --}}







                    {{-- website --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Website</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.websiteURL' />
                    </div>





                    {{-- users --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Users</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.users' />
                    </div>













                    {{-- landlineNumber --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Landline</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.landline' />
                    </div>





                    {{-- mobile --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Mobile</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.phone' />
                    </div>









                    {{-- -------------------------------------------------- --}}
                    {{-- -------------------------------------------------- --}}
                    {{-- -------------------------------------------------- --}}
                    {{-- -------------------------------------------------- --}}








                    {{-- contactPerson --}}
                    <div class="col-12">
                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mt-5 mb-3">
                            Contact Person
                        </h6>
                    </div>








                    {{-- name --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Full Name</label>
                        </div>
                        <input type="text" step='0.01' class="form--input mb-4" wire:model='instance.contactPerson' />
                    </div>



                    {{-- Phone --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">Mobile</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01'
                            wire:model='instance.contactPersonPhone' />
                    </div>





                    {{-- Phone --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">Whatsapp</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01'
                            wire:model='instance.contactPersonWhatsapp' />
                    </div>









                </div>
                {{-- end topRow --}}








                {{-- ----------------------- --}}
                {{-- ----------------------- --}}








                {{-- submitButton --}}
                <div class="row">
                    <div class="col">
                        <button
                            class="btn btn--scheme btn--scheme-2 w-100 py-2 d-inline-flex align-items-center mx-1 justify-content-center shrink--self fs-15"
                            style="border: 1px solid var(--color-theme-secondary)" wire:loading.attr='disabled'
                            wire:target='update'>
                            Update Profile
                        </button>
                    </div>
                </div>


            </div>
        </form>
    </div>
    {{-- endContainer --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    @section('modals')





    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</section>
{{-- endSection --}}