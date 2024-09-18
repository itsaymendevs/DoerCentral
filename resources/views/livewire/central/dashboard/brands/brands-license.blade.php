<section id="content--section" class="content--section">
    <div class="container">





        {{-- submenu --}}
        <livewire:central.dashboard.brands.brands-details.components.submenu id='{{ $brand->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- outerRow --}}
        <form wire:submit='update' class="row align-items-start pt-3 row mb-5">



            {{-- leftCol --}}
            <div class="col-12 col-xl-7" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>



                {{-- overviewRow --}}
                <div class="row align-items-center">






                    {{-- PIN --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-75" />
                            <label class="form-label form--label px-3 mb-0">PIN</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.PIN' />
                    </div>









                    {{-- licenseNumber --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">License Number</label>
                        </div>
                        <input type="text" step='0.01' class="form--input mb-4" wire:model='instance.licenseNumber' />
                    </div>






                    {{-- clientNumber --}}
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-25" />
                            <label class="form-label form--label px-3 mb-0">Client Number</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.serial' />
                    </div>










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



        </form>
    </div>
    {{-- endContainer --}}




</section>
{{-- endSection --}}