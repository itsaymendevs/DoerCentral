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
    <div class="section half-slider" data-dispimgpath="{{ url('assets/plugins/subscription/images/clouds.jpg') }}">
        <div class="swiper-container plans--swiper">
            <div class="swiper-wrapper">




                {{-- loop - plans --}}
                @foreach ($plans ?? [] as $plan)

                <div class="swiper-slide plan--slide">



                    {{-- imageFile --}}
                    <div class="slide">
                        <img src='{{ url("{$storagePath}/menu/plans/{$plan->fifthImageFile}") }}'
                            class="half-slide-item__image" alt="" />
                    </div>





                    {{-- ------------------------------- --}}
                    {{-- ------------------------------- --}}






                    {{-- wrapper --}}
                    <div
                        class="slide-titles @if ($settings->planCardAlignment == 'center') justify-content-center text-center @endif">
                        <div class="titles">


                            {{-- caption --}}
                            @if ($plan?->caption)

                            <div class="label splitting-text-anim-1 plan--slide-caption fs-6" data-splitting>{{
                                $plan->caption }}</div>

                            @endif
                            {{-- end if --}}






                            {{-- name --}}
                            <div class="title">
                                <a href="{{ route('website.plans.details', [$plan->nameURL]) }}">
                                    <span class="title-inner splitting-text-anim-2 plan--slide-title"
                                        data-splitting>{{$plan->name}}</span></a>
                            </div>


                            {{-- subtitle --}}
                            <div class="text scrolla-element-anim-1 plan--slide-subtitle
                                @if ($settings->planCardAlignment == 'center') mx-auto @endif">
                                {{ $plan->desc }}</div>

                        </div>




                        {{-- ---------------------------- --}}
                        {{-- ---------------------------- --}}





                        {{-- viewButton --}}
                        <div
                            class="view-btn @if ($settings->planCardAlignment == 'center') left-0 right-0 mx-auto @endif">
                            <a href="{{ route('website.plans.details', [$plan->nameURL]) }}" data-splitting
                                class="splitting-text-anim-1 plan--slide-button fw-500">View Plan</a>
                        </div>



                    </div>
                </div>

                @endforeach
                {{-- end loop --}}




            </div>
            {{-- endWrapper --}}






            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}






            {{-- pagination --}}
            <div class="swiper-pagination scrolla-element-anim-1 scroll-animate" data-animate="active"></div>




            {{-- naviation --}}
            <div class="swiper-buttons">

                {{-- next --}}
                <div class="swiper-button-prev scene-nav scene-nav--prev scrolla-element-anim-1 scroll-animate"
                    data-animate="active"></div>


                {{-- previous --}}
                <div class="swiper-button-next scene-nav scene-nav--next scrolla-element-anim-1 scroll-animate"
                    data-animate="active"></div>
            </div>

        </div>
        {{-- endWrapper --}}






        {{-- ------------------------- --}}
        {{-- ------------------------- --}}




        {{-- canvas --}}
        <div class="canvas half-slider-items__image"></div>





    </div>
    {{-- endSwiper --}}







</div>
{{-- endWrapper --}}