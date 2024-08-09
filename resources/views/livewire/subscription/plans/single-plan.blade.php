{{-- wrapper --}}
<div class="wrapper">







    {{-- head --}}
    @section('head')



    {{-- title - description - keywords meta --}}
    <title>{{ $plan->name }} - Details</title>

    <meta name="description" content="{{ $plan->name }} Details Page">

    <meta name="keywords"
        content="Healthy Meal Plans Provider in Dubai, Best Healthy Meal Plans Provider in Dubai, Healthy Meal Plans Provider">


    @endsection
    {{-- endHead --}}









    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}









    {{-- colors --}}
    <livewire:website.components.colors.colors-plans />







    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}









    {{-- 1: hero --}}
    <div class="section hero-started  bottom mb-5 plan--hero-section" style="max-height: 500px !important"
        data-dispimgpath='{{ url("{$storagePath}/menu/plans/{$plan->thirdImageFile}") }}'>



        {{-- background --}}
        <div class="slide">
            <img src='{{ url("{$storagePath}/menu/plans/{$plan->fifthImageFile}") }}' class="started-item__image" />
        </div>



        <div class="canvas started-items__image" data-top="top: 0px;" data-top-bottom="top: -200px;"></div>




        {{-- content --}}
        <div class="container flex-column justify-content-end align-items-start">
            <div class="titles">
                <div class="title splitting-text-anim-1 scroll-animate  pb-4 plan--single-title" data-splitting="chars"
                    data-animate="active">{{ $plan->name }}</div>
            </div>

        </div>
    </div>
    {{-- endSection --}}









    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}








    {{-- section --}}
    <div class="section section-inner m-description section--spacing">
        <div class="container">


            {{-- planDescription --}}
            <div class="row">



                {{-- title --}}
                <div class="col-xs-12 col-sm-12 col-md-12 align-left
                    @if ($settings->planSideTitleDisplay == 'inline') col-lg-3 @else col-lg-12 @endif">
                    <div class="m-titles mb-4">
                        <div class="m-title scrolla-element-anim-1 scroll-animate plan--single-title"
                            data-animate="active">Know More
                        </div>
                    </div>
                </div>



                {{-- content --}}
                <div class="col-xs-12 col-sm-12 col-md-12
                    @if ($settings->planSideTitleDisplay == 'inline') col-lg-9 @else col-lg-12 @endif">
                    <div class="description-text scrolla-element-anim-1 scroll-animate" data-animate="active">{{
                        $plan->longDesc }}</p>
                    </div>


                    <div class="d-flex mt-4 justify-content-md-start scrolla-element-anim-1 scroll-animate"
                        data-animate="active">
                        <div class="readmore">
                            <a href="{{ route('website.plans.customization', [$plan->nameURL]) }}"
                                class="btn-link plan--action-button">Start Your Journey</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}






    {{-- customSection --}}
    @if ($plan->sectionTitle)


    <div class="section section-inner m-description section--spacing">
        <div class="container">
            <div class="row">


                {{-- title --}}
                <div class="col-xs-12 col-sm-12 col-md-12 align-left
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-3 @else col-lg-12 @endif">
                    <div class="m-titles">
                        <div class="m-title scrolla-element-anim-1 scroll-animate mb-4 plan--single-title"
                            data-animate="active">{{ $plan?->sectionTitle }}
                        </div>
                    </div>
                </div>






                {{-- reasons --}}
                <div class="col-xs-12 col-sm-12 col-md-12
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-9 @else col-lg-12 @endif">
                    <div class="description-list-items plan--list">



                        @foreach ($plan?->points ?? [] as $key => $point)

                        <div class="description-list-item scrolla-element-anim-1 scroll-animate" data-animate="active">
                            <div class="desc">
                                <div class="name">
                                    <span class="number">{{ ($key + 1) >= 10 ? $key + 1 : '0' . ($key + 1) }}.</span>
                                    {{ $point->content }}
                                </div>
                            </div>
                        </div>

                        @endforeach
                        {{-- end loop --}}

                    </div>
                </div>
                {{-- end reasons --}}

            </div>
        </div>
    </div>



    @endif
    {{-- end if --}}



    {{-- endSection --}}








    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}








    {{-- customSection --}}

    {{-- :: permission - showCustomSection --}}
    @if ($settings?->showPlanCustomSection)




    <div class="section section-inner m-services mb-0">
        <div class="container">
            <div class="row">


                {{-- title --}}
                <div class="col-xs-12 col-sm-12 col-md-12 align-left
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-3 @else col-lg-12 @endif">
                    <div class="m-titles">
                        <h2 class="m-title scrolla-element-anim-1 scroll-animate plan--single-title"
                            data-animate="active">{{ $settings?->planCustomSectionTitle }}
                        </h2>
                    </div>
                </div>





                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}






                {{-- content --}}
                <div class="col-xs-12 col-sm-12 col-md-12
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-9 @else col-lg-12 @endif">
                    <div class="services-items row">




                        {{-- loop - customFiles --}}
                        @foreach ($customFiles ?? [] as $key => $customFile)


                        <div class="services-col col-xs-12 col-sm-6 col-md-6 col-lg-4"
                            key='single-custom-file-{{ $key }}'>
                            <div class="services-item text-lg-center scrolla-element-anim-1 scroll-animate"
                                data-animate="active">


                                {{-- image --}}
                                <img src='{{ url("{$storagePath}/extra/subscription/custom/{$customFile[0]}") }}'
                                    class='of-contain mb-3' style="height: 200px;">


                                {{-- name - diet --}}
                                <div class="name">{{ $customFile[1] }}</div>
                                <div class="text plan--meal-diet">{{ $customFile[2] }}</div>

                            </div>
                        </div>

                        @endforeach
                        {{-- end loop --}}




                    </div>
                </div>
                {{-- endContent --}}



            </div>
        </div>
    </div>





    @endif
    {{-- end if - permission --}}



    {{-- endSection --}}









    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}









    {{-- videoSection --}}
    <div class="section section-inner m-video-large">
        <div class="video scrolla-element-anim-1 scroll-animate" data-animate="active">
            <div class="img js-parallax"
                style='background-image: url({{ url("{$storagePath}/menu/plans/{$plan->fifthImageFile}") }}); filter: blur(6px)'>
            </div>
            <iframe class="js-video-iframe" data-src="{{ $plan?->videoURL }}?showinfo=0&rel=0&autoplay=1"></iframe>
            <div class="play"></div>
        </div>
    </div>








    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}







    {{-- testimonials --}}
    <div class="section section-inner m-testimonials section--spacing">
        <div class="container">
            <div class="row">


                {{-- title --}}
                <div class="col-xs-12 col-sm-12 col-md-12 align-left
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-3 @else col-lg-12 @endif">
                    <div class="m-titles">
                        <h2 class="m-title scrolla-element-anim-1 scroll-animate plan--single-title"
                            data-animate="active">Plan
                            Testimonials
                        </h2>
                    </div>
                </div>




                {{-- ----------------------------------------- --}}
                {{-- ----------------------------------------- --}}






                {{-- reviews --}}
                <div class="col-xs-12 col-sm-12 col-md-12
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-9 @else col-lg-12 @endif">


                    {{-- swiper --}}
                    <div class="swiper-container js-testimonials plan--testimonials">
                        <div class="swiper-wrapper">



                            {{-- loop - reviews --}}
                            <div class="testimonials-item swiper-slide">
                                <div class="scrolla-element-anim-1 scroll-animate" data-animate="active">
                                    <div class="image">
                                        <img src="{{url('assets/plugins/subscription/images/rev1.png')}}"
                                            alt="John Smith" />
                                    </div>
                                    <div class="desc">
                                        <div class="title">John Smith</div>
                                        <div class="name">Teacher</div>
                                        <div class="text">Meal Plans have completely transformed my life. I've lost
                                            20 pounds in three months, and my energy levels are through the roof! The
                                            meals are delicious and keep me full throughout the day.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonials item -->
                            <div class="testimonials-item swiper-slide">
                                <div class="scrolla-element-anim-1 scroll-animate" data-animate="active">
                                    <div class="image">
                                        <img src="{{url('assets/plugins/subscription/images/rev3.png')}}"
                                            alt=" Emily R" />
                                    </div>
                                    <div class="desc">
                                        <div class="title"> Emily R</div>
                                        <div class="name">Nurse</div>
                                        <div class="text">As a busy professional, I love the convenience of Our Meal
                                            Plans. The food is tasty and saves me so much time on meal prep. I've also
                                            noticed a significant improvement in my digestion and overall health.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonials item -->
                            <div class="testimonials-item swiper-slide">
                                <div class="scrolla-element-anim-1 scroll-animate" data-animate="active">
                                    <div class="image">
                                        <img src="{{url('assets/plugins/subscription/images/rev2.png')}}"
                                            alt="Jason K." />
                                    </div>
                                    <div class="desc">
                                        <div class="title">Jason K.</div>
                                        <div class="name">Marketing Manager</div>
                                        <div class="text">This have been a game-changer for my family. We all enjoy the
                                            meals, and it's great knowing we're eating healthy. My kids love the
                                            variety, and I've even seen improvements in their concentration and school
                                            performance.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonials item -->
                            <div class="testimonials-item swiper-slide">
                                <div class="scrolla-element-anim-1 scroll-animate" data-animate="active">
                                    <div class="image">
                                        <img src="{{url('assets/plugins/subscription/images/rev4.png')}}"
                                            alt="Robert Long" />
                                    </div>
                                    <div class="desc">
                                        <div class="title">Robert Long</div>
                                        <div class="name">Fitness Trainer</div>
                                        <div class="text">As someone who works out regularly, finding the right
                                            nutrition plan is crucial. Our Meal Plans have helped me meet my fitness
                                            goals by providing the perfect balance of macros. I've gained muscle and
                                            reduced body fat efficiently</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Pagination  -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- /Carousel -->

                </div>
            </div>
        </div>
    </div>












    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}







    {{-- today's menu --}}
    <div class="section section-inner m-testimonials ">
        <div class="container">
            <div class="row">



                {{-- title --}}
                <div class="col-xs-12 col-sm-12 col-md-12 align-left
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-3 @else col-lg-12 @endif">
                    <div class="m-titles">
                        <h2 class="m-title scrolla-element-anim-1 scroll-animate plan--single-title"
                            data-animate="active">Today's Menu
                        </h2>
                    </div>
                </div>






                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}




                {{-- content --}}
                <div class="col-xs-12 col-sm-12 col-md-12
                @if ($settings->planSideTitleDisplay == 'inline') col-lg-9 @else col-lg-12 @endif">





                    {{-- :: permission - showFilters --}}
                    @if ($settings?->showPlanMealsTypeFilter)



                    {{-- 1: filters --}}
                    <div class="filter-links plan--filter-links">

                        <a href="#" class="scrolla-element-anim-1 scroll-animate" data-animate="active"
                            data-href=".works-col">Full Menu</a>




                        {{-- loop - types --}}
                        @foreach ($types ?? [] as $type)


                        {{-- 1: convertRecipe --}}
                        @php $type->name == 'Recipe' ? $type->name = 'Meal' : null; @endphp



                        <a href="#" class="scrolla-element-anim-1 scroll-animate" data-animate="active"
                            key='meal-type-filter-{{ $type->id }}' data-href=".sorting-{{ $type->id }}">{{
                            $type->name }}</a>


                        @endforeach
                        {{-- end loop --}}



                    </div>
                    {{-- endFilters --}}




                    @endif
                    {{-- end if - permission --}}







                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}







                    {{-- meals --}}
                    <div
                        class="works-items row classic column-3-offset portfolio-infinite-scrolling hide_title hide_category hide_description">



                        {{-- loop - types --}}
                        @foreach ($types ?? [] as $type)



                        {{-- loop - meals --}}
                        @foreach ($meals?->where('typeId', $type->id)?->take(4) ?? [] as $meal)



                        <div class="works-col col-xs-6 col-sm-6 col-md-4 col-lg-4 sorting-{{ $type->id }}"
                            key='meal-type-content-{{ $type->id }}'>
                            <div class="works-item meals--item v1 scrolla-element-anim-1 scroll-animate"
                                data-animate="active">
                                <a href='{{ url("{$storagePath}/menu/meals/{$meal->imageFile}") }}'
                                    class="has-popup-image">


                                    {{-- imageFile --}}
                                    <span class="image">
                                        <span class="img">
                                            <img src='{{ url("{$storagePath}/menu/meals/{$meal->imageFile}") }}'
                                                alt="Melanin Goddess" />
                                        </span>
                                    </span>



                                    {{-- content --}}
                                    <span class="desc">
                                        <span class="category splitting-text-anim-4 scroll-animate"
                                            data-splitting="chars" data-animate="active">{{ $meal?->diet?->name
                                            }}</span>
                                        <span class="name splitting-text-anim-4 scroll-animate" data-splitting="words"
                                            data-animate="active">{{ $meal->name }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>



                        @endforeach
                        {{-- end loop - meals --}}



                        @endforeach
                        {{-- end loop - types --}}





                    </div>
                    {{-- endMeals --}}

                </div>
                {{-- endCol --}}


            </div>
            {{-- endRow --}}






        </div>
    </div>
    {{-- endSection --}}











    {{-- ------------------------------------------------- --}}
    {{-- ------------------------------------------------- --}}



    @section('scripts')


    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                    $('.logo--wrap').fadeOut();
                } else {
                    $('.logo--wrap').fadeIn();
                }
            });
        });
    </script>


    @endsection






    {{-- ------------------------------------------------- --}}
    {{-- ------------------------------------------------- --}}





</div>
{{-- endWrapper --}}