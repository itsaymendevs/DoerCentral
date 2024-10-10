{{-- section --}}
<section id="reviews--section" class="samples--section mt-5" data-aos='zoom-out' data-aos-duration="700"
    data-aos-delay="500" wire:ignore>
    <div class="container">
        <div class="row">
            <div class="col-12">


                {{-- swiper --}}
                <div class="swiper reviews--swiper-1 with--pagination">
                    <div class="swiper-wrapper align-items-end">


                        {{-- wrapper --}}



                        {{-- loop - reviews --}}
                        @foreach ($reviews ?? [] as $key => $review)


                        {{-- review --}}
                        <div class="swiper-slide reviews--card-col" key="single-review-{{ $key }}">
                            <div class="reviews--card">

                                {{-- overlay --}}
                                <div class="reviews--card-overlay"></div>


                                {{-- content --}}
                                <div class="reviews--content">
                                    <p class="fw-600 text-center fs-12 meal--card-name mb-0">{{ $review['position']
                                        }}</p>
                                    <h6 class="text-center fw-500 fs-14 mb-0">{{ $review['name'] }}</h6>
                                    <img src="{{ url('assets/plugins/website/img/clients/' . $review['imageFile']) }}"
                                        width="360" height="11">
                                </div>



                                {{-- play --}}
                                <div class="reviews--play">
                                    <button class="btn btn--link p-0" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-volume-off">
                                            <path
                                                d="M10.717 3.55A.5.5 0 0 1 11 4v8a.5.5 0 0 1-.812.39L7.825 10.5H5.5A.5.5 0 0 1 5 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06zM10 5.04 8.312 6.39A.5.5 0 0 1 8 6.5H6v3h2a.5.5 0 0 1 .312.11L10 10.96V5.04z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>


                                <video class="w-100 h-100" autoplay="" loop="" muted="" preload="auto" playsinline
                                    width="400" height="400">
                                    <source src="{{ url('assets/plugins/website/videos/' . $review['videoURL']) }}"
                                        type="video/mp4">
                                </video>
                            </div>



                        </div>



                        @endforeach
                        {{-- end loop --}}



                    </div>
                    {{-- endSwiperWrapper --}}






                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}




                    {{-- pagination --}}
                    <div class="swiper-pagination reviews"></div>




                    {{-- ---------------------------------------- --}}
                    {{-- ---------------------------------------- --}}




                    {{-- autoplay --}}
                    <div class="autoplay-progress reviews colored">
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