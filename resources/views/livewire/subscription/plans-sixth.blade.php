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







    <!-- Section Started Heading -->
    <div class="section section-inner started-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="h-titles">
                        <div class="h-title splitting-text-anim-2 scroll-animate plan--single-title plan--sixth-title fw-bold"
                            data-splitting="chars" data-animate="active">Our Plans</div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    {{-- --------------------------------- --}}
    {{-- --------------------------------- --}}






    {{-- section --}}
    <div class="section section-inner m-works">
        <div class="container">



            <!-- works items -->
            <div class="works-items row column-2-offset portfolio-infinite-scrolling">



                {{-- loop - plans --}}
                @foreach ($plans ?? [] as $plan)

                <div class="works-col col-xs-12 col-sm-6 col-md-6 col-lg-6 sorting-photography plan--sixth-col"
                    key='single-plan-{{ $plan->id }}'>
                    <div class="works-item meals--item v2 scrolla-element-anim-1 scroll-animate" data-animate="active">
                        <a href="{{ route('website.plans.details', [$plan->nameURL]) }}">


                            {{-- imageFile --}}
                            <span class="image">
                                <span class="img">
                                    <img src='{{ url("{$storagePath}/menu/plans/{$plan->thirdImageFile}") }}' />
                                </span>
                            </span>


                            {{-- content --}}
                            <span class="desc">
                                <span class="name splitting-text-anim-4 scroll-animate plan--custom-title fw-bold"
                                    data-splitting="words" data-animate="active">{{ $plan->name }}</span>

                                <span class="category splitting-text-anim-4 scroll-animate plan--custom-subtitle fw-500"
                                    data-splitting="chars" data-animate="active">{{ $plan->desc }}</span>
                            </span>

                        </a>
                    </div>
                </div>

                @endforeach
                {{-- end loop --}}




            </div>
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