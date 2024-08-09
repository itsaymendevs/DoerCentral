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
    <div class="section m-works-carousel default" wire:ignore>
        <div class="swiper-container">
            <div class="swiper-wrapper">


                {{-- loop - plans --}}
                @foreach ($plans ?? [] as $plan)

                <div class="swiper-slide plan--slide" key='single-plan-{{ $plan->id }}'>
                    <div class="works-slide">
                        <a href="{{ route('website.plans.details', [$plan->nameURL]) }}">


                            {{-- imageFile --}}
                            <span class="image">
                                <span class="img">
                                    <span class="slide"
                                        style='background-image: url({{ url("{$storagePath}/menu/plans/{$plan->thirdImageFile}") }});'></span>
                                </span>
                            </span>




                            {{-- ---------------------------------- --}}
                            {{-- ---------------------------------- --}}





                            {{-- information --}}
                            <span class="desc">


                                {{-- title --}}
                                <span class="name splitting-text-anim-1 plan--slide-title pb-1"
                                    data-splitting="chars">{{
                                    $plan->name }}</span>


                                {{-- hr --}}
                                <div class='plan--slide-hr'>
                                    <hr>
                                </div>


                                {{-- subtitle --}}
                                <span class="subname splitting-text-anim-1 mt-3 plan--slide-subtitle"
                                    data-splitting="chars">{{ $plan->desc }}</span>
                            </span>


                        </a>
                    </div>
                </div>

                @endforeach
                {{-- end loop --}}


            </div>
            {{-- endWrapper --}}




            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}





            {{-- pagination --}}
            <div class="swiper-pagination"></div>



        </div>
    </div>
    {{-- endSwiper --}}



</div>
{{-- endWrapper --}}