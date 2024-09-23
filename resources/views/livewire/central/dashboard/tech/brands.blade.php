<section id="content--section" class="content--section">
    <div class="container">


        {{-- filtersRow --}}
        <div class="row mb-4">




            {{-- 1: search --}}
            <div class="col-3">
                <input wire:model.live='searchBrand' class="form--input w-100" type="text"
                    placeholder="Search by Name" />
            </div>




            {{-- 2: counter --}}
            <div class="col-1 text-start d-flex align-items-center justify-content-start">

                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Brands">{{ $brands?->count() ?? 0
                    }}</h3>

            </div>
            {{-- endCol --}}








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}









            {{-- sub-menu --}}
            <div class="text-end col-8">
                <livewire:central.dashboard.tech.components.sub-menu key='submenu' />
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-5">



            {{-- 1: standardView --}}
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">



                    {{-- loop - brands --}}
                    @foreach ($brands ?? [] as $brand)


                    <div class="col-4 col-xl-3 col-xxl-3" key='single-brand-card-{{ $brand->id }}'>
                        <div class="overview--card client-version brands--card scale--self-05 mb-floating">
                            <div class="row align-items-end">


                                {{-- image --}}
                                <div class="col-2">
                                    <h5 class="text-center sideways--title sideways--left
                                    fw-bold m-0 fs-14">{{ $brand->name }}</h5>
                                </div>



                                <div class="col-10 text-center position-relative">


                                    {{-- 1: PDF --}}
                                    @if (str_contains($brand?->tradeFile, '.pdf'))

                                    <img class="client--card-logo mb-4" src="{{ url('assets/img/helpers/PDF.png') }}" />



                                    {{-- 1.2: regular --}}
                                    @else

                                    <img class="client--card-logo mb-4"
                                        src="{{ url('storage/clients/trades/' . $brand->tradeFile) }}" />

                                    @endif
                                    {{-- end if --}}




                                    {{-- 1.3: status --}}
                                    <p class='client--card-status {{ $brand->status }}'>
                                        <i class="bi bi-circle-fill me-2"></i>
                                        <span>{{ ucwords($brand->status) }}</span>
                                    </p>





                                    {{-- 2: manage --}}
                                    <a wire:navigate
                                        href="{{ route('central.dashboard.tech.singleBrand', [$brand->id]) }}"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-1 scale--self-05"
                                        type="button">Manage</a>

                                </div>


                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
            {{-- endView --}}







            {{-- -------------------------------------------------- --}}
            {{-- -------------------------------------------------- --}}







        </div>
    </div>
    {{-- endContainer --}}








</section>
{{-- endSection --}}