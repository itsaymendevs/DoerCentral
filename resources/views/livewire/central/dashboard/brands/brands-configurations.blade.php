<section id="content--section" class="content--section">
    <div class="container">





        {{-- submenu --}}
        <livewire:central.dashboard.brands.brands-details.components.submenu id='{{ $brand->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- outerRow --}}
        <form wire:submit='update' class="row justify-content-start align-items-center pt-3 mb-5">




            {{-- sideTitle --}}
            <div class="col-2 col-lg-1" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>
                <h1 class='sideways--title sideways--left fw-semibold'>Client Links</h1>
            </div>





            {{-- leftCol --}}
            <div class="col-10 col-lg-8 col-xl-7 position-relative" data-aos="fade" data-aos-duration="1000"
                data-aos-once="true" wire:ignore.self>



                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}



                @if ($brand->status == 'processing')

                <div class='processing--fallback'>
                    <h4 class='fw-500'>Links are not active yet</h4>
                </div>

                @endif
                {{-- end if --}}




                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}






                <div class="row justify-content-end">


                    {{-- plans --}}
                    <div class="col-12">
                        <label class="form-label form--label"><i class="bi bi-copy me-2 copy--icon"
                                onclick="copy('{{ $brand->websiteURL }}/plans')" data-bs-toggle="tooltip"
                                data-bss-tooltip="" data-bs-placement="top" title="Copy"></i>Plans</label>


                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-12" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-12"
                                style="width: 60%; letter-spacing: 1.2px">plans</label>
                        </div>
                    </div>








                    {{-- dashboard --}}
                    <div class="col-12">
                        <label class="form-label form--label"><i class="bi bi-copy me-2 copy--icon"
                                onclick="copy('{{ $brand->websiteURL }}/doer/public')" data-bs-toggle="tooltip"
                                data-bss-tooltip="" data-bs-placement="top" title="Copy"></i>Admin</label>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-12" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-12"
                                style="width: 60%; letter-spacing: 1.2px">doer/public</label>
                        </div>
                    </div>







                    {{-- license --}}
                    <div class="col-12">
                        <label class="form-label form--label">
                            <i class="bi bi-copy me-2 copy--icon"
                                onclick="copy('{{ $brand->websiteURL }}/doer-server/public')" data-bs-toggle="tooltip"
                                data-bss-tooltip="" data-bs-placement="top" title="Copy"></i>License</label>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-12" readonly required
                                value='{{ $brand->websiteURL }}'
                                onclick="copy('{{ $brand->websiteURL }}doer-server/public')" />
                            <label class="form-label form--label mb-0 fs-12"
                                style="width: 60%; letter-spacing: 1.2px">doer-server/public</label>
                        </div>
                    </div>












                    {{-- driverLogin --}}
                    <div class="col-12">
                        <label class="form-label form--label">
                            <i class="bi bi-copy me-2 copy--icon"
                                onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/driver')"
                                data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                                title="Copy"></i>Driver</label>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-12" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-12"
                                style="width: 60%; letter-spacing: 1.2px">doer/public/portals/driver</label>
                        </div>
                    </div>










                    {{-- customerLogin --}}
                    <div class="col-12">
                        <label class="form-label form--label">
                            <i class="bi bi-copy me-2 copy--icon"
                                onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/customer')"
                                data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                                title="Copy"></i>Customer</label>


                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-12" readonly required
                                value='{{ $brand->websiteURL }}'
                                onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/customer')" />
                            <label class="form-label form--label mb-0 fs-12"
                                style="width: 60%; letter-spacing: 1.2px">doer/public/portals/customer</label>
                        </div>
                    </div>





                </div>
                {{-- end generalInformation --}}


            </div>
            {{-- end leftCol --}}



        </form>
    </div>
    {{-- endContainer --}}









</section>
{{-- endSection --}}
