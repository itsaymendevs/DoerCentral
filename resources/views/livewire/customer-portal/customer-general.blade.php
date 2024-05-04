<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:customer-portal.components.sub-menu id='{{ $customer->id }}' />






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- outerRow --}}
        <form wire:submit='update' class="row align-items-start justify-content-center pt-3 mb-5">



            {{-- leftCol --}}
            <div class="col-12 col-xl-5  order-last order-xl-1" data-aos="fade-right" data-aos-duration="1000"
                data-aos-once="true" wire:ignore.self>



                {{-- overviewRow --}}
                <div class="row align-items-center">


                    {{-- totalBalanceDays --}}
                    <div class="col-6 col-sm-4 mb-3">
                        <div class="overview--box journey shrink--self">
                            <h6 class="fs-13 fw-normal">Balance</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                    {{-- totalPlanDays --}}
                    <div class="col-6 col-sm-4 mb-3">
                        <div class="overview--box journey shrink--self">
                            <h6 class="fs-13 fw-normal">Total Days</h6>
                            <p class="truncate-text-1l">{{ $customer->subscriptions->sum('planDays') }}</p>
                        </div>
                    </div>



                    {{-- toalCheckoutPrice --}}
                    <div class="col-12 col-sm-4 mb-3">
                        <div class="overview--box journey shrink--self">
                            <h6 class="fs-13 fw-normal">
                                Amount<small class="ms-1 fw-semibold text-gold fs-10">(AED)</small>
                            </h6>
                            <p class="truncate-text-1l">{{
                                number_format($customer->subscriptions->sum('totalCheckoutPrice'), 1) }}</p>
                        </div>
                    </div>




                    {{-- subscription - startDate --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box journey shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal fs-xs-12">Subscribed From</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d / m / Y',
                                strtotime($latestSubscription->startDate))
                                }}</p>
                        </div>
                    </div>




                    {{-- subscription - untilDate --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box journey shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal fs-xs-12">Until Date</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d / m / Y',
                                strtotime($latestSubscription->untilDate))
                                }}</p>
                        </div>
                    </div>








                    {{-- ------------------------------- --}}
                    {{-- ------------------------------- --}}











                    {{-- generalInformation --}}
                    <div class="col-12">
                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mt-5 mb-3">
                            General Information
                        </h6>




                        {{-- row --}}
                        <div class="row">




                            {{-- firstName --}}
                            <div class="col-12">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">First Name</label>
                                    <input type="text" class="form--input readonly" readonly required
                                        wire:model='instance.firstName' />
                                </div>
                            </div>



                            {{-- lastName --}}
                            <div class="col-12">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">Last Name</label>
                                    <input type="text" class="form--input readonly" readonly required
                                        wire:model='instance.lastName' />
                                </div>
                            </div>





                            {{-- email --}}
                            <div class="col-12">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">Email Address</label>
                                    <input type="email" class="form--input readonly" readonly required
                                        wire:model='instance.email' />
                                </div>
                            </div>



                            {{-- birthdate --}}
                            <div class="col-12">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">Birthdate</label>
                                    <input class="form--input readonly" readonly type="date"
                                        wire:model='instance.birthDate' />
                                </div>
                            </div>



                            {{-- password --}}
                            <div class="col-12">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">Password</label>
                                    <input type="password" class="form--input" wire:model='instance.newPassword' />
                                </div>
                            </div>






                            {{-- ---------------------------------------- --}}
                            {{-- ---------------------------------------- --}}






                            {{-- hr (Mobile) --}}
                            <div class="col-12 d-xl-none">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 50%" class=' mx-auto mt-1' />
                                </div>
                            </div>





                            {{-- phone --}}
                            <div class="col-12 col-sm-6">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-6">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="text" class="form--input readonly" readonly required
                                        wire:model='instance.phone' minlength='9' maxlength='9' />
                                </div>


                            </div>






                            {{-- whatsapp --}}
                            <div class="col-12 col-sm-6">
                                <div class="input--with-label journey mb-4">
                                    <label class="form-label form--label mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-whatsapp fs-6">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="text" class="form--input readonly" readonly required
                                        wire:model='instance.whatsapp' minlength='9' maxlength='9' />
                                </div>
                            </div>






                            {{-- ------------------------ --}}
                            {{-- ------------------------ --}}










                            {{-- allergy --}}
                            <div class="col-12 mt-2">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Allergy</label>
                                </div>



                                {{-- select --}}
                                <div class="select--single-wrapper mb-4 no-events" wire:ignore>

                                    <select class="form-select form--select" id='allergy-select' multiple
                                        data-instance='instance.allergyLists' data-trigger='true'>
                                        <option value=""></option>

                                        @foreach ($allergies as $allergy)
                                        <option value="{{ $allergy->id }}">{{ $allergy->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>






                            {{-- exclude --}}
                            <div class="col-12">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Exclude</label>
                                </div>




                                {{-- select --}}
                                <div class="select--single-wrapper mb-4 no-events" wire:ignore>

                                    <select class="form-select form--select" id='exclude-select' multiple
                                        data-instance='instance.excludeLists' data-trigger='true'>
                                        <option value=""></option>

                                        @foreach ($excludes as $exclude)
                                        <option value="{{ $exclude->id }}">{{ $exclude->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>








                            {{-- manager (HIDDEN) --}}
                            <div class="col-6 d-none">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Manager</label>
                                </div>


                                {{-- select --}}
                                <div class="select--single-wrapper mb-4 no-events" wire:ignore>

                                    <select class="form-select form--select" value='{{ $instance->managerId ?? null }}'
                                        data-instance='instance.managerId'>
                                        <option value=""></option>

                                        @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>






                            {{-- driver (HIDDEN) --}}
                            <div class="col-6 d-none">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Driver</label>
                                </div>


                                {{-- select --}}
                                <div class="select--single-wrapper mb-4 no-events" wire:ignore>

                                    <select class="form-select form--select" value='{{ $instance->driverId ?? null }}'
                                        data-instance='instance.driverId'>
                                        <option value=""></option>

                                        @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            {{-- endCol --}}










                            {{-- submitButton - Desktop --}}
                            <div class="col-12 d-block d-xl-none mt-3 mb-5">
                                <button
                                    class="btn btn--scheme btn--scheme-1 w-75 py-2 d-flex align-items-center mx-1 justify-content-center shrink--self fs-15 mx-auto"
                                    style="border: 1px solid var(--color-theme-alternative)"
                                    wire:loading.attr='disabled' wire:target='update'>
                                    Update Profile
                                </button>
                            </div>






                        </div>
                    </div>
                    {{-- end generalInformation --}}


                </div>
            </div>
            {{-- end leftCol --}}











            {{-- -------------------------------------------- --}}
            {{-- -------------------------------------------- --}}














            {{-- midColumn --}}
            <div class="col-11 col-xl-2 text-center order-first order-xl-2 mb-md-5 mb-xl-0 mt-3">



                {{-- image (DESKTOP) --}}
                <img class="w-100 of-contain d-none d-md-none"
                    src='{{ asset("assets/img/Customers/{$customer->gender}.png") }}' style="height: 250px" />





                {{-- subscriptionActions --}}
                <div class="d-flex align-items-center justify-content-center mb-md-2 d-none">


                    {{-- 1: pause --}}
                    <div data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Pause" class='mx-2'>

                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32" type='button'
                            data-bs-toggle="modal" data-bs-target="#pause-subscription">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-stopwatch fs-5" viewBox="0 0 16 16">
                                <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                                <path
                                    d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                            </svg>
                        </button>

                        <p class='fs-12 mt-1 mb-0'>Pause</p>

                    </div>









                    {{-- 2: resume --}}
                    <div class='mx-3'>
                        <button class="btn btn--scheme btn--scheme-1 fs-12 px-2 mx-2 scale--self-05 h-32"
                            data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Resume">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-play-circle fs-5" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445" />
                            </svg>
                        </button>

                        <p class='fs-12 mt-1 mb-0'>Resume</p>
                    </div>








                    {{-- 2: renew --}}
                    <div class='mx-2'>
                        <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32 "
                            data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Re-New">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise fs-5">
                                <path fill-rule="evenodd"
                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"></path>
                                <path
                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z">
                                </path>
                            </svg>
                        </button>


                        <p class='fs-12 mt-1 mb-0'>Renew</p>
                    </div>

                </div>









                {{-- ------------------------- --}}
                {{-- ------------------------- --}}






                {{-- wallet --}}


                {{-- :: permission - hasWallet --}}
                @if ($versionPermission->customerModuleHasWallet)





                {{-- wrapper (DESKTOP) --}}
                <div class="mt-1  d-block">
                    <hr class="w-75 mx-auto mb-4" />
                    <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
                        Wallet<br />Balance
                    </h6>


                    {{-- currentAmount --}}
                    <h4 class="fw-semibold d-flex align-items-center justify-content-center mb-2">
                        {{ number_format($wallet->balance, 1) }}
                    </h4>


                </div>





                @endif
                {{-- end if - permission --}}





            </div>
            {{-- end midCol --}}













            {{-- -------------------------------------------- --}}
            {{-- -------------------------------------------- --}}








            {{-- rightCol --}}
            <div class="col-11 col-xl-5 order-2 order-xl-3 mt-4 mt-md-5 mt-xl-0 rounded-1 mb-4 mb-md-0"
                data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" wire:ignore.self
                style="border:3px solid #0000000f">


                {{-- topRow --}}
                <div class="row mb-3">


                    {{-- planCol --}}
                    <div class="col-12">
                        <div class="item--box journey py-3 active w-100 mb-3">

                            {{-- row --}}
                            <div class="row align-items-center">



                                {{-- leftCol --}}
                                <div class="col-12 col-sm-6 mb-3 mb-xl-0">


                                    {{-- imageFile --}}
                                    <img class="of-cover w-100 rounded-1"
                                        src="{{ asset('storage/menu/plans/' . $latestSubscription->plan->imageFile) }}"
                                        style="height: 200px" />

                                </div>
                                {{-- end leftCol --}}








                                {{-- ------------------- --}}
                                {{-- ------------------- --}}





                                {{-- rightCol --}}
                                <div class="col-12 col-sm-6">


                                    {{-- plan --}}
                                    <h4
                                        class="fw-semibold d-flex align-items-center justify-content-center plan--title rounded-1 py-1">
                                        {{ $latestSubscription->plan->name }}
                                    </h4>


                                    {{-- bundle --}}
                                    <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
                                        {{ $latestSubscription->bundle->name }}
                                    </h6>





                                    {{-- range --}}
                                    <p class="text-center fs-16 mb-0 fw-semibold text-green pe-2">
                                        {{ $latestSubscription->range->name }}
                                    </p>







                                </div>
                                {{-- end rightCol --}}


                            </div>
                        </div>

                    </div>
                    {{-- endCol --}}







                    {{-- --------------------- --}}
                    {{-- --------------------- --}}








                    {{-- weight --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-100" />
                            <label class="form-label form--label px-3 mb-0">Weight</label>
                        </div>
                        <input type="number" step='0.01' class="form--input mb-4" wire:model='instance.weight' />
                    </div>



                    {{-- height --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-100" />
                            <label class="form-label form--label px-3 mb-0">Height</label>
                        </div>
                        <input type="number" class="form--input mb-4" step='0.01' wire:model='instance.height' />
                    </div>


                </div>
                {{-- end topRow --}}








                {{-- ----------------------- --}}
                {{-- ----------------------- --}}






                {{-- bundleTypeRow - mealTypes --}}



                {{-- :: hasCustomerBundlesView --}}
                @if ($versionPermission->hasCustomerBundlesView)



                <div class="row justify-content-start mb-5">




                    {{-- 1: groupByType --}}
                    @foreach ($customer->subscriptionTypes->groupBy('typeId') as $commonType =>
                    $subscriptionTypesByType)




                    {{-- :: avoidDrink --}}
                    @if ($subscriptionTypesByType->first()->type->name != 'Drink')





                    {{-- column --}}
                    <div class="col-6 col-sm-4 mb-4 mb-sm-0">
                        <div class="item--box p-0 pt-2 d-flex flex-column no-events customers--meal-types-wrapper">

                            {{-- imageFile --}}
                            <img class="of-contain px-3 w-100"
                                src='{{ asset("storage/types/{$subscriptionTypesByType->first()->type->imageFile}") }}'
                                style="height: 100px" width="118" height="100" />





                            {{-- 1.2: groupByMealType --}}
                            @foreach ($subscriptionTypesByType->groupBy('mealTypeId') as $commonMealType =>
                            $subscriptionTypesByMealType)


                            <div class="customers--meal-types">

                                {{-- shortName --}}
                                <span class="fw-semibold fs-15">{{
                                    $subscriptionTypesByMealType->first()->mealType->shortName }}</span>


                                {{-- count --}}
                                <strong class="fs-6 fw-bold">
                                    {{ $subscriptionTypesByMealType->sum('quantity') }}
                                </strong>
                            </div>



                            @endforeach
                            {{-- end loop - groupByMealType --}}


                        </div>
                    </div>
                    {{-- endCol --}}



                    @endif
                    {{-- end if - avoidDrink --}}





                    @endforeach
                    {{-- end loop - groupByType --}}




                </div>
                {{-- endRow --}}




                @endif
                {{-- end if - hasCustomerBundlesPermissions --}}










                {{-- ----------------------- --}}
                {{-- ----------------------- --}}










                {{-- bagRow --}}
                <div class="row mb-5">



                    {{-- isCoolBag --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2 fs-xs-13">
                            Has<br />Cool-Bag
                        </h6>

                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mb-2
                                    @if ($latestSubscription->bagId) text-gold @else text-danger @endif">
                            {{ $latestSubscription->bagId ? 'Yes' : 'No' }}
                        </h6>
                    </div>






                    {{-- bagPrice - depositAmount --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2 fs-xs-13">
                            {{ $latestSubscription->bagPrice }} AED<br />Deposit
                        </h6>

                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mb-2
                                @if ($latestSubscription->bagId) text-gold @else text-danger @endif">
                            {{ $latestSubscription->bagId ? 'Paid' : 'Not Paid' }}
                        </h6>
                    </div>







                    {{-- bagWithCustomer - notCollected --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2 fs-xs-13">
                            Bags With<br />Customer
                        </h6>

                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mb-2 text-gold">
                            {{ $customer->unCollectedBags() }}
                        </h6>
                    </div>








                    {{-- hr - image --}}
                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-5">
                        <img class="w-100 of-contain" src='{{ asset("storage/bags/{$coolBag->imageFile}") }}'
                            style="height: 130px" />
                    </div>



                    {{-- remarks --}}
                    <div class="col-7">
                        <textarea class="form--input form--textarea h-100" placeholder="Remarks About Bag"
                            wire:model='instance.bagRemarks' readonly>{{ $customer->bagRemarks }}</textarea>
                    </div>
                </div>
                {{-- end bagRow --}}







                {{-- submitButton - Desktop --}}
                <div class="row d-none d-xl-block">
                    <div class="col-12">
                        <button
                            class="btn btn--scheme btn--scheme-1 w-100 py-2 d-inline-flex align-items-center mx-1 justify-content-center shrink--self fs-15 mb-3"
                            wire:loading.attr='disabled' wire:target='update'>
                            Update Profile
                        </button>
                    </div>
                </div>


            </div>
        </form>
    </div>
    {{-- endContainer --}}














    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--select").on("change", function(event) {



            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);

        }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











    @section('modals')





    {{-- 1: editBundle --}}
    <livewire:customer-portal.customer-general.components.customer-general-edit-bundle
        id='{{ $latestSubscription->id }}' key='edit-bundle-{{ $latestSubscription->id }}' />





    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</section>
{{-- endSection --}}