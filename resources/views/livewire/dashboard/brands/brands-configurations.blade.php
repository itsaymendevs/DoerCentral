<section id="content--section" class="content--section">
    <div class="container">





        {{-- submenu --}}
        <livewire:dashboard.brands.brands-details.components.sub-menu id='{{ $brand->id }}' key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- outerRow --}}
        <form wire:submit='update' class="row justify-content-end align-items-start pt-3 mb-5">



            <div class="col-6"></div>

            {{-- leftCol --}}
            <div class="col-12 col-xl-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>


                <div class="row">




                    {{-- plans --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0"><i class="bi bi-copy me-2 copy--icon"
                                    onclick="copy('{{ $brand->websiteURL }}/plans')" data-bs-toggle="tooltip"
                                    data-bss-tooltip="" data-bs-placement="top" title="Copy"></i>Website</label>
                        </div>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-11" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-11"
                                style="width: 60%; letter-spacing: 1.2px">plans</label>
                        </div>
                    </div>








                    {{-- dashboard --}}
                    <div class="col-12">

                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0"><i class="bi bi-copy me-2 copy--icon"
                                    onclick="copy('{{ $brand->websiteURL }}/doer/public')" data-bs-toggle="tooltip"
                                    data-bss-tooltip="" data-bs-placement="top" title="Copy"></i>Admin Dashboard</label>
                        </div>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-11" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-11"
                                style="width: 60%; letter-spacing: 1.2px">doer/public</label>
                        </div>
                    </div>







                    {{-- license --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0"><i class="bi bi-copy me-2 copy--icon"
                                    onclick="copy('{{ $brand->websiteURL }}/doer-server/public')"
                                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                                    title="Copy"></i>License Permission</label>
                        </div>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-11" readonly required
                                value='{{ $brand->websiteURL }}'
                                onclick="copy('{{ $brand->websiteURL }}doer-server/public')" />
                            <label class="form-label form--label mb-0 fs-11"
                                style="width: 60%; letter-spacing: 1.2px">doer-server/public</label>
                        </div>
                    </div>












                    {{-- driverLogin --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0"><i class="bi bi-copy me-2 copy--icon"
                                    onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/driver')"
                                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                                    title="Copy"></i>Driver Login</label>
                        </div>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-11" readonly required
                                value='{{ $brand->websiteURL }}' />
                            <label class="form-label form--label mb-0 fs-11"
                                style="width: 60%; letter-spacing: 1.2px">doer/public/portals/driver</label>
                        </div>
                    </div>










                    {{-- customerLogin --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0"><i class="bi bi-copy me-2 copy--icon"
                                    onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/customer')"
                                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="top"
                                    title="Copy"></i>Customer Login</label>
                        </div>

                        <div class="input--with-label reverse mb-4">
                            <input type="text" class="form--input fs-11" readonly required
                                value='{{ $brand->websiteURL }}'
                                onclick="copy('{{ $brand->websiteURL }}/doer/public/portals/customer')" />
                            <label class="form-label form--label mb-0 fs-11"
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