{{-- wrapper --}}
<div class="wrapper">







    {{-- head --}}
    @section('head')



    {{-- title - description - keywords meta --}}
    <title>{{ $plan->name }} - Customization</title>

    <meta name="description" content="{{ $plan->name }} - {{ $plan->desc }}">

    <meta name="keywords"
        content="Healthy Meal Plans Provider in Dubai, Best Healthy Meal Plans Provider in Dubai, Healthy Meal Plans Provider">


    @endsection
    {{-- endHead --}}









    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}






    {{-- colors --}}
    <livewire:website.components.colors.colors-plans-customization />







    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}








    {{-- blobBG --}}
    <livewire:website.components.items.background-blob />







    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}








    {{-- section --}}
    <div class="section section-inner m-description plan--section section--bg mb-0 pb-5" id='customization--section'>
        <div class="container">
            <div class="row">





                {{-- leftCol --}}
                <div class="col-12 col-lg-8">




                    {{-- topRow --}}
                    <div class="row justify-content-center mb-5 u--slideUp d-none" wire:ignore>
                        <div class="col-12 col-lg-5 text-center">



                            {{-- switch --}}
                            <div class="btn-group mx-auto" role="group" aria-label="Basic example">


                                {{-- regular --}}
                                <button type="button"
                                    class="btn btn--regular sm border--bottom btn--collapse fw-500 fs-14"
                                    data-bs-toggle="collapse" data-bs-target="#collapse--regular-plan"
                                    aria-expanded="false" aria-controls="collapse--regular-plan">Regular</button>


                                {{-- cart --}}
                                <button type="button"
                                    class="btn btn--regular sm border--bottom btn--collapse collapsed fw-500 fs-14"
                                    data-bs-toggle="collapse" data-bs-target="#collapse--cart-plan"
                                    aria-expanded="false" aria-controls="collapse--cart-plan">Cart To Go</button>
                            </div>

                        </div>
                    </div>
                    {{-- endRow --}}







                    {{-- -------------------------------------- --}}
                    {{-- -------------------------------------- --}}







                    {{-- planInformation --}}
                    <div class="row justify-content-center justify-content-sm-start" wire:ignore>


                        {{-- wrapper --}}
                        <div class="col-12 col-lg-5 mb-4">




                            {{-- swiper --}}
                            <div class="swiper plans--overview-swiper ">
                                <div class="swiper-wrapper">



                                    {{-- slide --}}
                                    @if ($plan->imageFile)

                                    <div class="swiper-slide">
                                        <img src='{{ url("{$storagePath}/menu/plans/{$plan->imageFile}") }}'
                                            class='customization--plan-image'>
                                    </div>

                                    @endif
                                    {{-- end if --}}





                                    {{-- slide --}}
                                    @if ($plan->secondImageFile)

                                    <div class="swiper-slide">
                                        <img src='{{ url("{$storagePath}/menu/plans/{$plan->secondImageFile}") }}'
                                            class='customization--plan-image'>
                                    </div>

                                    @endif
                                    {{-- end if --}}








                                </div>
                                {{-- endWrapper --}}




                                {{-- ------------------------- --}}
                                {{-- ------------------------- --}}




                                {{-- pagination --}}
                                <div class="swiper-pagination"></div>




                            </div>
                        </div>
                        {{-- endWrapper --}}








                        {{-- ---------------------- --}}
                        {{-- ---------------------- --}}






                        {{-- information --}}
                        <div class="col-12 col-sm-12 col-lg-6 mb-4 text-center">

                            {{-- name --}}
                            <div class="m-titles mb-4">
                                <div class="m-title plan--single-title plan--name  text-center">{{ $plan->name }}
                                </div>
                            </div>




                            {{-- description --}}
                            <span class="desc me-4" style='max-width: 100px !important;'>
                                <span
                                    class="category text-center splitting-text-anim-3 scroll-animate plan--custom-subtitle fw-500 fs-6"
                                    data-splitting="chars" data-animate="active">{{ $plan->desc }}</span>
                            </span>





                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}




                            {{-- macros --}}

                            @if ($settings?->showPlanMacros)

                            <div class="row mt-4 justify-content-center">



                                {{-- percentages --}}
                                <div class="col-4 col-sm-auto  scrolla-element-anim-1 scroll-animate motion--slow"
                                    data-animate="active" wire:ignore.self>
                                    <div class="d-flex flex-column plan--macros for--proteins">
                                        <span class='fw-bold percentage'>30%</span>
                                        <span class='fw-bold text-uppercase caption'>Protein</span>
                                    </div>
                                </div>





                                {{-- percentages --}}
                                <div class="col-4 col-sm-auto scrolla-element-anim-1 scroll-animate motion--slow"
                                    data-animate="active" wire:ignore.self>
                                    <div class="d-flex flex-column plan--macros for--carbs">
                                        <span class='fw-bold percentage'>50%</span>
                                        <span class='fw-bold text-uppercase caption'>Carb</span>
                                    </div>
                                </div>





                                {{-- percentages --}}
                                <div class="col-4 col-sm-auto  scrolla-element-anim-1 scroll-animate motion--slow"
                                    data-animate="active" wire:ignore.self>
                                    <div class="d-flex flex-column plan--macros for--fats">
                                        <span class='fw-bold percentage'>20%</span>
                                        <span class='fw-bold text-uppercase caption'>Fat</span>
                                    </div>
                                </div>




                            </div>

                            @endif
                            {{-- endRow --}}







                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}





                            {{-- viewButton --}}
                            <div class='d-flex justify-content-end mt-4 px-1 px-sm-0'>
                                <a href='javascript:void(0);' class='btn--with-hr active'>
                                    <hr>
                                    <span class='ms-2'>See More</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    {{-- endRow --}}











                    {{-- -------------------------------------- --}}
                    {{-- -------------------------------------- --}}





                    {{-- bundles and Ranges --}}
                    <div class="row mt-5 justify-content-center justify-content-md-start">


                        {{-- mainTitle --}}
                        <div class="col-12 col-sm-12" wire:ignore>
                            <div class="m-titles mb-0">
                                <div class="m-title plan--single-title fs-4 mb-0 fw-semibold  pointer">
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                        {{-- hr --}}
                                        <hr>

                                        {{-- collapseToggler --}}
                                        <div class="ps-2 splitting-text-anim-1 scroll-animate collapse--title motion--slow w-100"
                                            data-splitting="chars" data-animate="active" data-bs-toggle="collapse"
                                            data-bs-target="#collapse--bundles" aria-expanded="false"
                                            aria-controls="collapse--bundles" data-splitting="chars">
                                            <div class="d-flex justify-content-between">
                                                <span>Customize Your Plan</span>
                                                <i class="bi bi-chevron-compact-down collapse--icon"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endMainTitle --}}





                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}





                        {{-- collapseContent --}}
                        <div class="col-12">
                            <div class="collapse show mt-4" id="collapse--bundles" wire:ignore.self>


                                {{-- 1: bundles --}}
                                <div class="row justify-content-center justify-content-md-start">



                                    {{-- bundles --}}
                                    @foreach ($planBundles ?? [] as $bundle)






                                    {{-- 1: version --}}
                                    <div class="col-6 col-sm-6 col-lg-4 mb-4 scrolla-element-anim-1 scroll-animate"
                                        key='single-bundle-{{ $bundle->id }}' data-animate="active" wire:ignore.self>


                                        <label wire:loading.class='processing--card' wire:target='changePlanBundle'
                                            class="bundle--card sm zoom--wrapper motion--slow pointer
                                            @if ($settings?->showBundlePicture) with--picture @endif
                                            @if ($settings?->showBundleMotion) bundle--motion @endif
                                            @if ($instance?->planBundleId == $bundle->id) active @endif"
                                            for='bundle--checkbox-{{ $bundle->id }}'>







                                            {{-- radioButton --}}
                                            <input type="radio" id="bundle--checkbox-{{ $bundle->id }}"
                                                class='bundle--indicator d-none' wire:model='instance.planBundleId'
                                                name='bundle--checkbox' value='{{ $bundle->id }}'
                                                wire:change='changePlanBundle'>








                                            {{-- imageFile --}}
                                            <div class="motion--slow overflow-hidden bundle--image position-relative">


                                                {{-- select --}}
                                                <span
                                                    class='bundle--select motion--slow animation--floating'>Pick</span>


                                                <img src='{{ url("{$storagePath}/menu/plans/bundles/{$bundle->imageFile}") }}'
                                                    class='of-contain zoom--target '>
                                            </div>




                                            {{-- title --}}
                                            <div class="bundle--title-wrap scrolla-element-anim-1 scroll-animate motion--slow"
                                                data-animate="active" wire:ignore.self>
                                                <h5 class='bundle--title '>{{
                                                    $bundle->name }}</h5>
                                            </div>



                                        </label>
                                    </div>




                                    @endforeach
                                    {{-- end loop --}}


                                </div>
                                {{-- endRow --}}







                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}
                                {{-- -------------------------------- --}}







                                {{-- 2: bundleRanges --}}
                                @if ($pickedPlanBundle)


                                {{-- row --}}
                                <div class="row mt-4 justify-content-center justify-content-md-start">
                                    <div class="col-12 col-sm-12">


                                        {{-- title --}}
                                        <div class="m-title plan--single-title fs-6 mb-0 fw-semibold  pointer">
                                            <div
                                                class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">
                                                <hr>

                                                <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow w-100"
                                                    data-splitting="chars" data-animate="active" data-splitting="chars">
                                                    <span>How many calories per day?</span>
                                                </div>
                                            </div>
                                        </div>





                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}






                                        {{-- groupButtons --}}
                                        <div class="btn-group mx-auto ranges--wrapper" data-animate="active"
                                            role="group">



                                            {{-- loop - ranges --}}
                                            @foreach ($planBundleRanges ?? [] as $bundleRange)


                                            {{-- checkRange --}}
                                            @if ($bundleRange->isForWebsite == true && $bundleRange->range->isForWebsite
                                            == true)



                                            <button type="button" wire:loading.class='processing--button'
                                                wire:target='changePlanBundleRange'
                                                key='single-bundle-range-{{ $bundleRange->id }}'
                                                class="btn btn--regular sm fw-500 fs-14 ranges--btn @if ($instance?->planBundleRangeId == $bundleRange->id) btn--collapse @endif"
                                                wire:click="changePlanBundleRange('{{ $bundleRange?->id }}')"
                                                data-bs-toggle="collapse" data-bs-target="#collapse--regular-plan"
                                                aria-expanded="false" aria-controls="collapse--regular-plan">
                                                {{ $bundleRange?->range?->name }}
                                            </button>




                                            @endif
                                            {{-- end if --}}




                                            @endforeach
                                            {{-- end loop --}}



                                        </div>
                                    </div>
                                </div>
                                {{-- endRow --}}


                                @endif
                                {{-- end if --}}












                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}
                                {{-- --------------------------------- --}}









                                {{-- 2: perferences --}}
                                @if ($pickedPlanBundle && $instance?->planBundleRangeId)



                                {{-- row --}}
                                <div class="row mt-4 justify-content-center justify-content-sm-start">



                                    {{-- 1: planDays --}}
                                    <div class="col-12 col-sm-7 mb-5">



                                        {{-- title --}}
                                        <div class="m-title plan--single-title fs-6 mb-3 fw-semibold  pointer">
                                            <div
                                                class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">
                                                <hr>

                                                <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow w-100"
                                                    data-splitting="chars" data-animate="active" data-splitting="chars">
                                                    <span>Plan days</span>
                                                </div>
                                            </div>
                                        </div>





                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}




                                        {{-- options --}}
                                        <div class="d-inline-flex flex-wrap plan--days-wrapper">



                                            {{-- loop - days --}}
                                            @foreach ($pickedPlanBundle?->days ?? [] as $bundleDay)





                                            <label class='pointer plan--days motion--slow
                                                @if ($instance->planDays == $bundleDay->days) active @endif'
                                                key='plan-bundle-days-{{ $bundleDay->id }}'
                                                wire:loading.class='processing--button'
                                                wire:target='recalculate, instance.planDays'
                                                for='bundle--days-radio-{{ $bundleDay->id }}'>{{
                                                $bundleDay?->days }}
                                                @if ($bundleDay?->discount > 0 && $settings->showPlanDaysDiscount)
                                                <span class='plan--days-discount'>{{ $bundleDay?->discount }}
                                                    <small style="font-size: 8px">%</small>
                                                </span>
                                                @endif
                                            </label>





                                            {{-- radioButton --}}
                                            <input type="radio" id="bundle--days-radio-{{ $bundleDay->id }}"
                                                class='d-none' wire:model.live='instance.planDays'
                                                wire:change='recalculate' name='bundle--days-radio'
                                                value='{{ $bundleDay?->days }}'>




                                            @endforeach
                                            {{-- end loop --}}


                                        </div>
                                        {{-- endOptions --}}



                                    </div>
                                    {{-- endCol --}}







                                    {{-- ------------------------------------ --}}
                                    {{-- ------------------------------------ --}}
                                    {{-- ------------------------------------ --}}
                                    {{-- ------------------------------------ --}}







                                    {{-- 2: startDate --}}
                                    <div class="col-12 col-sm-5 mb-5">




                                        {{-- title --}}
                                        <div class="m-title plan--single-title fs-6 mb-3 fw-semibold  pointer">
                                            <div
                                                class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">
                                                <hr>

                                                <div class="ps-2 splitting-text-anim-1 scroll-animate motion--slow w-100"
                                                    data-splitting="chars" data-animate="active" data-splitting="chars">
                                                    <span>Start date</span>
                                                </div>
                                            </div>
                                        </div>





                                        {{-- --------------------------- --}}
                                        {{-- --------------------------- --}}




                                        {{-- input --}}
                                        <div class="d-flex form--input-wrapper">
                                            <input id='date--picker' type="text" name="text"
                                                class='form--input form--datepicker' autocomplete="off">
                                        </div>



                                    </div>
                                    {{-- endCol --}}




                                </div>
                                {{-- endRow --}}



                                @endif
                                {{-- end if --}}





                            </div>
                        </div>
                    </div>
                    {{-- endRow --}}















                    {{-- -------------------------------------- --}}
                    {{-- -------------------------------------- --}}









                    {{-- 2: preferences --}}
                    @if ($pickedPlanBundleRange)



                    <div class="row mt-5 justify-content-center justify-content-md-start section--colorful animation--floating"
                        style="background-color: var(--preferenceBackgroundColor);">


                        {{-- mainTitle --}}
                        <div class="col-12 col-sm-12" wire:ignore>
                            <div class="m-titles mb-0" style="padding: 0px 25px">
                                <div class="m-title plan--single-title fs-4 mb-0 fw-semibold  pointer">
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                        {{-- hr --}}
                                        <hr>

                                        {{-- collapseToggler --}}
                                        <div class="ps-2 splitting-text-anim-1 scroll-animate collapse--title motion--slow w-100"
                                            data-splitting="chars" data-animate="active" data-bs-toggle="collapse"
                                            data-bs-target="#collapse--preferences" aria-expanded="false"
                                            aria-controls="collapse--preferences" data-splitting="chars">
                                            <div class="d-flex justify-content-between">
                                                <span>Manage Preferences</span>
                                                <i class="bi bi-chevron-compact-down collapse--icon"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endMainTitle --}}








                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}







                        {{-- collapseContent --}}
                        <div class="col-12 col-sm-12">
                            <div class="collapse show mt-4 pt-2 preference--line" id="collapse--preferences"
                                wire:ignore.self>



                                <div class="copy-box">
                                    <div class="inner">
                                        <div class="line right">
                                            <div class="scanner"></div>
                                        </div>
                                    </div>
                                </div>






                                {{-- row --}}
                                <div class="row align-items-end">





                                    <div class="col-12
                                        @if ($settings?->showPreferenceBag) col-md-6 @else col-md-7 @endif">





                                        {{-- 1: allergy --}}
                                        <div class="d-flex form--input-wrapper flex-column mb-4">

                                            <label class='w-100 d-flex align-items-center md' data-splitting="chars"
                                                data-animate="active">
                                                <span>Allergy</span>
                                            </label>


                                            {{-- select --}}
                                            <div class="form--select-wrapper" wire:ignore>
                                                <select class='init--select form--select'
                                                    data-instance='instance.allergyLists' multiple>

                                                    @foreach ($allergyLists as $allergyList)
                                                    <option value="{{ $allergyList->id }}">
                                                        {{ $allergyList->name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>









                                        {{-- 2: allergy --}}
                                        <div class="d-flex form--input-wrapper flex-column">

                                            <label class='w-100 d-flex align-items-center md' data-splitting="chars"
                                                data-animate="active">
                                                <span>Excludes</span>
                                            </label>

                                            {{-- select --}}
                                            <div class="form--select-wrapper" wire:ignore>
                                                <select class='init--select form--select'
                                                    data-instance='instance.excludeLists' multiple>

                                                    @foreach ($excludeLists as $excludeList)
                                                    <option value="{{ $excludeList->id }}">
                                                        {{ $excludeList->name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    {{-- endCol --}}








                                    {{-- ---------------------------------- --}}
                                    {{-- ---------------------------------- --}}








                                    {{-- bagCol --}}



                                    {{-- 1: withPicture --}}
                                    @if ($settings?->showPreferenceBag)

                                    <div class="col-12 col-md-6">


                                        {{-- imageFile --}}
                                        <div class="d-flex position-relative bag--wrapper mt-5 mt-md-0 mb-4 mb-md-0">




                                            {{-- info --}}
                                            <a href="javascript:void(0);" class='bag--info '
                                                data-izimodal-open="#bag--modal"
                                                data-izimodal-transitionin="fadeInDown">
                                                <i class="bi bi-info-circle"></i>
                                            </a>




                                            <img src='{{ url("{$storagePath}/bags/{$bag->imageFile}") }}'
                                                class='w-100 of-contain' style="height: 200px">



                                            {{-- switch --}}
                                            <div class="form-check form-switch bag--switch vertical">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="coolbag--checkbox" wire:model.live='instance.bag'>
                                                <label class="form-check-label" for="coolbag--checkbox">{{
                                                    $bag->name }}</label>
                                            </div>
                                        </div>








                                    </div>









                                    {{-- 2: withoutPicture --}}
                                    @else



                                    <div class="col-12 col-md-5">


                                        {{-- wrapper --}}
                                        <div class="d-flex position-relative bag--wrapper without--picture">


                                            {{-- switch --}}
                                            <div class="form-check form-switch bag--switch vertical">


                                                {{-- info --}}
                                                <a href="javascript:void(0);" class='bag--info'
                                                    data-izimodal-open="#bag--modal"
                                                    data-izimodal-transitionin="fadeInDown">
                                                    <i class="bi bi-info-circle"></i>
                                                </a>



                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="coolbag--checkbox" wire:model.live='instance.bag'>
                                                <label class="form-check-label" for="coolbag--checkbox">{{
                                                    $bag->name }}</label>
                                            </div>
                                        </div>


                                    </div>





                                    @endif
                                    {{-- endCol --}}







                                    {{-- ---------------------------------- --}}
                                    {{-- ---------------------------------- --}}





                                    {{-- continueButton --}}
                                    @if ($instance->planDays && $instance->startDate && $instance->planBundleId)

                                    <div class="col-12 col-md-7">
                                        <div class="d-flex form--input-wrapper justify-content-center mt-3
                                        @if (!$settings?->showButtonMotion) no--button-motion @endif">

                                            <livewire:website.components.items.button-blob title='Proceed'
                                                modal='#information--modal' />

                                        </div>
                                    </div>

                                    @endif
                                    {{-- end if --}}


                                </div>
                                {{-- endRow --}}




                            </div>
                        </div>
                    </div>

                    @endif
                    {{-- endRow --}}








                </div>
                {{-- end leftCol --}}










                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}











                {{-- rightCol --}}
                <div class="col-12 col-lg-4 mt-5 mt-lg-0 preference--col">



                    {{-- wrapperToReverse --}}
                    <div class="d-flex flex-column-reverse flex-lg-column">







                        {{-- 1: otherPlans --}}


                        @if ($settings?->showPickPreference)



                        {{-- 1st --}}
                        <div class="d-flex flex-column mb-5">



                            {{-- collapseToggler --}}
                            <div class="section section-inner started-heading mb-4 mt-0" style="z-index: 1000"
                                wire:ignore>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="h-titles">


                                                {{-- title --}}
                                                <div class="m-title plan--single-title fs-5 mb-0 fw-semibold  pointer">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                                        {{-- hr --}}
                                                        <hr>

                                                        {{-- collapseToggler --}}
                                                        <div class="ps-2 splitting-text-anim-1 scroll-animate collapse--title motion--slow w-100 plans--other-toggler no-events"
                                                            data-splitting="chars" data-animate="active"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse--other-plans"
                                                            aria-expanded="false" aria-controls="collapse--other-plans"
                                                            data-splitting="chars">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Pick Your Preference</span>
                                                                <i
                                                                    class="bi bi-chevron-compact-down collapse--icon"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- endTitle --}}


                                            </div>
                                        </div>
                                    </div>
                                    {{-- endRow --}}

                                </div>
                            </div>
                            {{-- endSection --}}










                            {{-- ------------------------------------ --}}
                            {{-- ------------------------------------ --}}









                            {{-- collapseContent --}}
                            <div class="collapse show" id="collapse--other-plans" wire:ignore>
                                <div class="section section-inner m-works mb-5">
                                    <div class="container">
                                        <div
                                            class="works-items row classic column-3-offset portfolio-infinite-scrolling justify-content-center">




                                            {{-- loop - plans --}}
                                            @foreach ($plans ?? [] as $key => $singlePlan)


                                            <div class="works-col mx-auto plans--other-col col-12 col-sm-6 col-md-6 col-lg-12 col-xl-6 sorting-photography "
                                                key='single-other-plan-{{ $key }}'>
                                                <div class="works-item other--item @if (($key + 1) % 2 == 0) active @endif scrolla-element-anim-1 scroll-animate"
                                                    data-animate="active">
                                                    <a
                                                        href="{{ route('website.plans.customization', [$singlePlan->nameURL]) }}">

                                                        {{-- imageFile --}}
                                                        <span class="image">
                                                            <span class="img">
                                                                <img
                                                                    src='{{ url("{$storagePath}/menu/plans/{$singlePlan->imageFile}") }}' />
                                                            </span>
                                                        </span>




                                                        {{-- information --}}
                                                        <span class="desc">
                                                            <span
                                                                class="category splitting-text-anim-4 scroll-animate fs-14 fw-semibold  text-uppercase"
                                                                data-splitting="chars" data-animate="active">{{
                                                                $singlePlan->name
                                                                }}</span>
                                                        </span>


                                                    </a>
                                                </div>
                                            </div>

                                            @endforeach
                                            {{-- end loop --}}




                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- endWrapper --}}



                        </div>
                        {{-- endWrapper --}}



                        @endif
                        {{-- end if --}}




                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}









                        {{-- 2: bundleInformation --}}



                        @if ($pickedPlanBundle)



                        {{-- 2nd --}}
                        <div class="d-flex flex-column mb-5">




                            {{-- collapseToggler --}}
                            <div class="section section-inner started-heading mt-0 mb-4" style="z-index: 1000;"
                                wire:ignore>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="h-titles">
                                                <div class="m-title plan--single-title fs-5 mb-0 fw-semibold  pointer">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center justify-content-sm-start title--with-hr">


                                                        {{-- hr --}}
                                                        <hr>

                                                        {{-- collapseToggler --}}
                                                        <div class="ps-2 splitting-text-anim-1 scroll-animate collapse--title motion--slow w-100"
                                                            data-splitting="chars" data-animate="active"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse--bundle-information"
                                                            aria-expanded="false"
                                                            aria-controls="collapse--bundle-information"
                                                            data-splitting="chars">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Your Plan Details</span>
                                                                <i
                                                                    class="bi bi-chevron-compact-down collapse--icon"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- endRow --}}

                                </div>
                            </div>
                            {{-- endSection --}}










                            {{-- ------------------------------------ --}}
                            {{-- ------------------------------------ --}}











                            {{-- collapseContent --}}
                            <div class="collapse show invoice--sidebar" id="collapse--bundle-information">
                                <div class="section section-inner m-works mb-0">
                                    <div class="container">



                                        {{-- topRow --}}
                                        <div class="row zoom--wrapper align-items-end">


                                            {{-- imageFile --}}
                                            @if ($settings?->showSummaryBundlePicture)

                                            <div
                                                class="col-12 mb-3 mb-md-0 mb-lg-3 mb-xl-0 col-md-6 col-lg-12 col-xl-6">
                                                <div class="d-flex overflow-hidden">
                                                    <img src='{{ url("{$storagePath}/menu/plans/bundles/{$pickedPlanBundle?->imageFile}") }}'
                                                        class='of-contain bg-white zoom--target motion--slow rounded-1 w-100'
                                                        style="height: 150px;">
                                                </div>
                                            </div>

                                            @endif
                                            {{-- end if --}}








                                            {{-- information --}}
                                            <div
                                                class="col-12 @if ($settings?->showSummaryBundlePicture) col-md-6 col-lg-12 col-xl-6 @endif">



                                                {{-- name --}}
                                                <div class="m-titles mb-1 text-center">
                                                    <div class="m-title plan--single-title fw-semibold fs-6 mb-0"
                                                        style="color: var(--summaryBundleColor) !important;">
                                                        {{ $pickedPlanBundle->name }}
                                                    </div>
                                                </div>




                                                {{-- bundleDescription --}}
                                                <span class="desc d-block text-center">
                                                    <span
                                                        class="category text-center splitting-text-anim-1 scroll-animate plan--custom-subtitle fw-500 fs-15"
                                                        data-splitting="chars" data-animate="active">{{
                                                        $pickedPlanBundle->remarks
                                                        }}</span>
                                                </span>





                                                {{-- ----------------------- --}}
                                                {{-- ----------------------- --}}




                                                {{-- range --}}
                                                @if ($pickedPlanBundleRange)

                                                <div class="m-titles mb-1 mt-1">
                                                    <div
                                                        class="m-title plan--single-title fw-semibold fs-15 mb-0 text-center">
                                                        {{
                                                        $pickedPlanBundleRange->range->name }}<span
                                                            class='span--price ms-1'>(Calories)</span>
                                                    </div>
                                                </div>

                                                @endif
                                                {{-- end if --}}







                                            </div>
                                        </div>
                                        {{-- endRow --}}







                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}






                                        {{-- invoiceRow --}}
                                        <div class="row align-items-end mt-5">
                                            <div class="col-12">


                                                {{-- 1: Plan Days --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Duration</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>{{ $instance?->planDays ?? 0
                                                        }}<span class='span--price ms-1'>(days)</span></h6>

                                                </div>





                                                {{-- 2: Start Date --}}
                                                <div
                                                    class="d-flex invoice--tr different justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Start Date</h6>
                                                    <h6 class='my-0 fw-500 fs-13'>{{ $instance?->startDate }}</h6>

                                                </div>







                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}
                                                {{-- -------------------------------------- --}}





                                                {{-- 1: PlanPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Plan Price</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ $instance->totalPlanBundleRangePrice ?
                                                        number_format($instance?->totalPlanBundleRangePrice) : '' }}
                                                    </h6>

                                                </div>





                                                {{-- 3: bagPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14 d-flex align-items-end">Cool Bag<span
                                                            class='ms-1 span--price fs-9'
                                                            style="color: var(--textColor)">(Refundable)</span></h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ ($instance->bag && $instance->planPrice) ?
                                                        number_format($bag?->price) : '' }}
                                                    </h6>

                                                </div>






                                                {{-- 4: discount --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Discount</h6>
                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{ $instance->planBundleRangeDiscountPrice ?
                                                        number_format($instance?->planBundleRangeDiscountPrice) : '' }}
                                                    </h6>
                                                </div>










                                                {{-- 7: totalPrice --}}
                                                <div
                                                    class="d-flex invoice--tr justify-content-between align-items-center">

                                                    <h6 class="fw-500 my-0 fs-14">Total Payout</h6>

                                                    @if ($instance->planPrice)

                                                    <h6 class='my-0 fw-500 fs-16'>
                                                        {{
                                                        number_format(($instance?->planPrice ?? 0) + ($instance->bag ?
                                                        $bag?->price : 0)) }}<span class='span--price ms-1'>(AED)</span>
                                                    </h6>

                                                    @endif
                                                    {{-- end if --}}

                                                </div>




                                            </div>
                                        </div>
                                        {{-- endRow --}}









                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}
                                        {{-- --------------------------------- --}}





                                    </div>
                                </div>
                            </div>
                            {{-- endWrapper --}}





                        </div>
                        {{-- endWrapper --}}



                        @endif
                        {{-- end if - pickedPlanBundle --}}






                    </div>
                    {{-- endWrapperToReverse --}}



                </div>
                {{-- endRightCol --}}










                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}
                {{-- ------------------------------------ --}}






            </div>
        </div>
    </div>
    {{-- endSection --}}















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- scripts --}}
    @section('scripts')





    {{-- 1: datepicker --}}
    <script src="{{ url('assets/plugins/subscription/js/air-datepicker.js') }}"></script>





    {{-- hrLinks --}}
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.btn--with-hr').removeClass('active');
            }, 1000);
        });

    </script>











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
    <script>
        $(document).on('change', "#customization--section .form--select", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}










    {{-- toggler --}}
    <script>
        if (window.matchMedia("(max-width: 992px)").matches) {


            $('.plans--other-toggler').removeClass('no-events');


        } else {
            $(document).ready(function() {
                setTimeout(() => {
                    $('.plans--other-toggler').trigger('click');
                    $('.plans--other-toggler').removeClass('no-events');
                }, 1800);
            });
        }
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- hideLogo --}}
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








    {{-- ----------------------------------------------- --}}
    {{-- ----------------------------------------------- --}}









    {{-- 1.2: handleDatePicker --}}
    <script>
        $(document).on('initDatePicker', function() {



        initStartDate = @json(strtotime($instance->initStartDate ?? date('Y-m-d', strtotime('+48 hours'))));

        startDate = new Date(initStartDate * 1000);
        startDate.setDate(startDate.getDate());








        var localeEn = {
            days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            today: 'Today',
            clear: 'Clear',
            dateFormat: 'dd/MM/yyyy',
            timeFormat: 'hh:mm aa',
            firstDay: 0
        };






        // 3.5: Initialize
        setTimeout(() => {
            $('body #date--picker').each(function() {
                datepicker = new AirDatepicker(this, {
                    locale: localeEn,
                    minDate: startDate,
                    position: 'bottom center',
                    onSelect: ({date, formattedDate, datepicker}) => {
                        @this.set('instance.startDate', formattedDate);
                    } // end function
                });
            });
        }, 500);





    }); // end function


    </script>



    @endsection
    {{-- endSection --}}













    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











    {{-- modals --}}
    @section('modals')




    {{-- information --}}
    <livewire:website.plans.plans-customization.components.plans-customization-information
        name='{{ $plan->nameURL }}' />





    {{-- bagDetails --}}
    <livewire:website.plans.plans-customization.components.plans-customization-bag-details />






    @endsection
    {{-- endSection --}}











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</div>
{{-- endWrapper --}}