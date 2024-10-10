<section data-aos="fade" data-aos-duration="600" data-aos-once="true" id="w-features--section-1"
    class="w-features--section mb-0" wire:ignore>
    <div class="container">
        <div class="row">

            {{-- title --}}
            <div class="col-12 text-center mb-2">
                <h1 class="text-center w-section--title with--arrow">Packed with Unique Features
                    <a href="#services--section-content"></a>
                </h1>
            </div>




            {{-- ----------------------------------- --}}
            {{-- ----------------------------------- --}}





            {{-- feature --}}
            <div class="col-12">


                {{-- swiper --}}
                <div class="swiper features--swiper-1 with--pagination">
                    <div class="swiper-wrapper">



                        {{-- loop - features --}}
                        @foreach ($features ?? [] as $key => $feature)

                        <div class="swiper-slide row align-items-center px-0 mx-0  @if ($key % 2 != 0) flex-row-reverse @endif"
                            key="single-feature-{{ $key }}" style="background-color: #2f343a">



                            {{-- screenshot --}}
                            <div class="col-12 col-lg-6 col-xl-7 order-last order-lg-first ">
                                <div data-aos="zoom-out" data-aos-duration="700" data-aos-delay="500"
                                    data-aos-once="true" class="w-features--content">
                                    <img class="w-100"
                                        src="{{ url('assets/plugins/website/img/features/' . $feature['imageFile']) }}">
                                </div>
                            </div>



                            {{-- module - infromation --}}
                            <div class="col-12 col-lg-6 col-xl-5 order-first order-lg-last" data-aos="fade"
                                data-aos-duration="700" data-aos-delay="300" data-aos-once="true">

                                {{-- title --}}
                                <h4 class="text-start fw-semibold fs-md-24 fs-sm-18 mb-3">{{ $feature['name'] }}</h4>

                                {{-- description --}}
                                <p class="fs-18 fst-italic fs-md-16 fs-sm-14">{{ $feature['description'] }}</p>
                            </div>
                        </div>



                        @endforeach
                        {{-- end loop --}}


                    </div>
                    {{-- endSwiperWrapper --}}






                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}





                    {{-- pagination --}}
                    <div class="swiper-pagination features"></div>







                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}




                    {{-- autoplay --}}
                    <div class="autoplay-progress features colored">
                        <svg viewBox="0 0 45 45">
                            <circle cx="23" cy="23" r="18"></circle>
                        </svg>
                        <span></span>
                    </div>






                </div>
                {{-- endSwiper --}}







            </div>
        </div>
    </div>
</section>
{{-- endSection --}}