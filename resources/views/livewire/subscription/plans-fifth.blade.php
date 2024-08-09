<div class="wrapper">



    {{-- head --}}
    @section('head')




    {{-- title - description - keywords meta --}}
    <title>Our Plans</title>

    <meta name="description"
        content="Effortlessly plan your meals with our intuitive meal planner software. Create customized meal plans, track your nutrition, and discover delicious recipes to suit your dietary preferences. Simplify your meal planning today!">




    @endsection
    {{-- endHead --}}










    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}







    {{-- colors --}}
    <livewire:website.components.colors.colors-plans />







    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}














    {{-- swiper --}}
    <div class="section hero-main-slider">
        <div class="swiper-container plans--swiper">
            <div class="swiper-wrapper">



                {{-- loop - plans --}}
                @foreach ($plans ?? [] as $plan)


                <div class="swiper-slide plan--slide" key='single-plan-{{ $plan->id }}'>



                    {{-- imageFile --}}
                    <div class="slide"
                        style='background-image: url({{ url("{$storagePath}/menu/plans/{$plan->fifthImageFile}") }});'>
                    </div>





                    {{-- -------------------------- --}}
                    {{-- -------------------------- --}}






                    {{-- content --}}
                    <div class="slide-titles
                        @if ($settings->planCardAlignment == 'center') text-center justify-content-center @endif">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



                                {{-- inner --}}
                                <div class="titles @if ($settings->planSliderArrows == 'dark') dark @endif">


                                    {{-- caption --}}
                                    @if ($plan?->caption)

                                    <div class="label scrolla-element-anim-1 plan--slide-caption fw-500">{{
                                        $plan->caption }}
                                    </div>

                                    @endif
                                    {{-- end if --}}








                                    {{-- name --}}
                                    <div class="title @if ($settings->planCardAlignment == 'center') hr--center @endif">
                                        <span class="title-inner splitting-text-anim-2 plan--slide-title fw-bold"
                                            data-splitting>{{ $plan->name }}</span>
                                    </div>



                                    {{-- subtitle --}}
                                    <div class="subtitle scrolla-element-anim-1 plan--slide-subtitle
                                    @if ($settings->planCardAlignment == 'center') mx-auto @endif">{{ $plan->desc }}
                                    </div>
                                </div>






                                {{-- -------------------------- --}}
                                {{-- -------------------------- --}}




                                {{-- viewButton --}}
                                <div class="more-bts @if ($settings->planCardAlignment == 'center') text-center @endif">
                                    <a href="{{ route('website.plans.details', [$plan->nameURL]) }}" data-splitting
                                        class="btn more-btn scrolla-element-anim-1 plan--slide-button fw-500">View
                                        Plan</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- endContent --}}



                </div>

                @endforeach
                {{-- end loop --}}



            </div>
            {{-- endWrapper --}}





            {{-- ------------------------------------ --}}
            {{-- ------------------------------------ --}}






            {{-- pagination --}}
            <div class="swiper-pagination scrolla-element-anim-1 scroll-animate" data-animate="active"></div>



            {{-- navigation --}}
            <div class="swiper-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </div>
    {{-- endSwiper --}}







</div>
{{-- endWrapper --}}