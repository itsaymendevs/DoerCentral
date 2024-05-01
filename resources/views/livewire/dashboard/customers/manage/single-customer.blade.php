<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.manage.components.sub-menu id='{{ $customer->id }}' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- outerRow --}}
        <form wire:submit='update' class="row align-items-start pt-3 row mb-5">



            {{-- leftCol --}}
            <div class="col-12 col-xl-5 order-xl-1" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>



                {{-- overviewRow --}}
                <div class="row align-items-center">


                    {{-- totalBalanceDays --}}
                    <div class="col-4 mb-3">
                        <div class="overview--box shrink--self">
                            <h6 class="fs-13 fw-normal">Balance</h6>
                            <p class="truncate-text-1l">-</p>
                        </div>
                    </div>



                    {{-- totalPlanDays --}}
                    <div class="col-4 mb-3">
                        <div class="overview--box shrink--self">
                            <h6 class="fs-13 fw-normal">Total Days</h6>
                            <p class="truncate-text-1l">{{ $customer->subscriptions->sum('planDays') }}</p>
                        </div>
                    </div>



                    {{-- toalCheckoutPrice --}}
                    <div class="col-4 mb-3">
                        <div class="overview--box shrink--self">
                            <h6 class="fs-13 fw-normal">
                                Amount<small class="ms-1 fw-semibold text-gold fs-10">(AED)</small>
                            </h6>
                            <p class="truncate-text-1l">{{
                                number_format($customer->subscriptions->sum('totalCheckoutPrice'), 1) }}</p>
                        </div>
                    </div>




                    {{-- subscription - startDate --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Subscribed From</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d / m / Y',
                                strtotime($latestSubscription->startDate)) }}</p>
                        </div>
                    </div>




                    {{-- subscription - untilDate --}}
                    <div class="col-6 mb-3">
                        <div class="overview--box shrink--self active" style="border: none">
                            <h6 class="fs-13 fw-normal">Until Date</h6>
                            <p class="truncate-text-1l fs-13">{{ date('d / m / Y',
                                strtotime($latestSubscription->untilDate)) }}</p>
                        </div>
                    </div>








                    {{-- ------------------------------- --}}
                    {{-- ------------------------------- --}}





                    {{-- 1: shortenSubscription --}}

                    {{-- :: restriction inline - shorten --}}

                    <div class="col-6 mb-3">
                        <button
                            class="btn btn--scheme btn--remove w-100 align-items-center d-flex px-2 fs-12 justify-content-center scalemix--3"
                            type="button" data-bs-toggle="modal" data-bs-target="#shorten-subscription"
                            @if($latestSubscription->untilDate < $allowedShortenDate) disabled @endif>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-dash-lg fs-6 me-2">
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                                    </path>
                                </svg>Shorten Subscription
                        </button>
                    </div>








                    {{-- 2: extendSubscription --}}
                    <div class="col-6 mb-3">
                        <button
                            class="btn btn--scheme btn--scheme-1 w-100 align-items-center d-flex px-2 fs-12 justify-content-center scalemix--3"
                            @if ($latestSubscription->untilDate < $globalCurrentDate) disabled @endif type="button"
                                data-bs-toggle="modal" data-bs-target="#extend-subscription">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-plus-lg fs-6 me-2">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z">
                                    </path>
                                </svg>Extend Subscription
                        </button>
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
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">First Name</label>
                                    <input type="text" class="form--input" required wire:model='instance.firstName' />
                                </div>
                            </div>



                            {{-- lastName --}}
                            <div class="col-12">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">Last Name</label>
                                    <input type="text" class="form--input" required wire:model='instance.lastName' />
                                </div>
                            </div>





                            {{-- email --}}
                            <div class="col-12">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">Email Address</label>
                                    <input type="email" class="form--input" required wire:model='instance.email' />
                                </div>
                            </div>



                            {{-- birthdate --}}
                            <div class="col-12">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">Birthdate</label>
                                    <input class="form--input" type="date" wire:model='instance.birthDate' />
                                </div>
                            </div>



                            {{-- password --}}
                            <div class="col-12">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">New Password</label>
                                    <input type="password" class="form--input" wire:model='instance.newPassword' />
                                </div>
                            </div>




                            {{-- phone --}}
                            <div class="col-6">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-6">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="text" class="form--input" required wire:model='instance.phone'
                                        minlength='9' maxlength='9' />
                                </div>
                            </div>






                            {{-- whatsapp --}}
                            <div class="col-6">
                                <div class="input--with-label mb-4">
                                    <label class="form-label form--label mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-whatsapp fs-6">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                            </path>
                                        </svg>
                                    </label>
                                    <input type="text" class="form--input" required wire:model='instance.whatsapp'
                                        minlength='9' maxlength='9' />
                                </div>
                            </div>






                            {{-- ------------------------ --}}
                            {{-- ------------------------ --}}






                            {{-- vip - enabled --}}
                            <div class="col-12">
                                <div class="w-100 mx-auto d-flex align-items-center justify-content-around mt-2">


                                    {{-- 1: VIP --}}

                                    {{-- :: permission - hasVIP --}}
                                    @if ($versionPermission->customerModuleHasVIP)



                                    <div class="form-check form-switch mb-3 mealType--checkbox">
                                        <input class="form-check-input pointer" wire:model='instance.isVIP'
                                            type="checkbox" id="formCheck-1" @if($instance->isVIP) checked @endif />
                                        <label class="form-check-label fs-6" for="formCheck-1">VIP</label>
                                    </div>




                                    @endif
                                    {{-- end if - permission --}}








                                    {{-- 2: Enabled --}}


                                    {{-- :: permission - hasEnabled --}}
                                    @if ($versionPermission->customerModuleHasEnabled)


                                    <div class="form-check form-switch mb-3 mealType--checkbox">
                                        <input class="form-check-input pointer" wire:model='instance.isEnabled'
                                            id="formCheck-2" type="checkbox" @if($instance->isEnabled) checked @endif
                                        />
                                        <label class="form-check-label fs-6" for="formCheck-2">Enabled</label>
                                    </div>


                                    @endif
                                    {{-- end if - permission--}}





                                </div>
                            </div>










                            {{-- allergy --}}
                            <div class="col-12 mt-2">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Allergy</label>
                                </div>



                                {{-- select --}}
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

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
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                                    <select class="form-select form--select" id='exclude-select' multiple
                                        data-instance='instance.excludeLists' data-trigger='true'>
                                        <option value=""></option>

                                        @foreach ($excludes as $exclude)
                                        <option value="{{ $exclude->id }}">{{ $exclude->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>










                            {{-- manager --}}



                            {{-- :: permission - hasManager --}}
                            @if ($versionPermission->customerModuleHasManager)




                            <div class="col-6">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Manager</label>
                                </div>


                                {{-- select --}}
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

                                    <select class="form-select form--select" value='{{ $instance->managerId ?? null }}'
                                        data-instance='instance.managerId'>
                                        <option value=""></option>

                                        @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>



                            @endif
                            {{-- end if - permission --}}








                            {{-- driver --}}

                            {{-- :: permission - hasDriver --}}
                            @if ($versionPermission->customerModuleHasDriver)



                            <div class="col-6">


                                {{-- title --}}
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <hr style="width: 65%" />
                                    <label
                                        class="form-label form--label px-3 w-50 justify-content-center mb-0">Driver</label>
                                </div>


                                {{-- select --}}
                                <div class="select--single-wrapper mb-4" wire:loading.class='no-events' wire:ignore>

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



                            @endif
                            {{-- end if - permission --}}






                        </div>
                    </div>
                    {{-- end generalInformation --}}


                </div>
            </div>
            {{-- end leftCol --}}











            {{-- -------------------------------------------- --}}
            {{-- -------------------------------------------- --}}














            {{-- midColumn --}}
            <div class="col-12 col-xl-2 text-center order-first order-xl-2 mb-5 mb-xl-0">



                {{-- image --}}

                {{-- :: permission - hasVector --}}
                @if ($versionPermission->customerModuleHasVector)


                <img class="w-100 of-contain" src='{{ asset("assets/img/Customers/{$customer->gender}.png") }}'
                    style="height: 250px" />


                @endif
                {{-- end if - permission --}}










                {{-- subscriptionActions --}}
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">


                    {{-- 1: pause --}}
                    <div data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Pause">



                        {{-- :: restriction - pause --}}

                        @if ($allowedPauseDate <= $latestSubscription->untilDate)


                            <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                data-bs-toggle="modal" data-bs-target="#pause-subscription" type='button'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-stopwatch fs-5" viewBox="0 0 16 16">
                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                                    <path
                                        d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                                </svg>
                            </button>




                            {{-- :: disabled --}}
                            @else



                            <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32 disabled"
                                data-bs-toggle="modal" data-bs-target="#pause-subscription" type='button'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-stopwatch fs-5" viewBox="0 0 16 16">
                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                                    <path
                                        d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                                </svg>
                            </button>



                            @endif
                            {{-- end if - restriction --}}


                    </div>
                    {{-- endPause --}}









                    {{-- 2: resume / unpause --}}
                    <div data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Un-pause">


                        <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32" type="button"
                            style="border:1px dashed var(--color-theme-secondary)" data-bs-toggle="modal"
                            data-bs-target="#unpause-subscription">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-play-circle fs-5" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445" />
                            </svg>
                        </button>


                    </div>




                    {{-- 2: renew - original scheme-1 --}}
                    <button class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32 "
                        data-bs-toggle="tooltip" data-bss-tooltip="" type="button" title="Re-New"
                        wire:click='reNew({{ $customer->id }})'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise fs-5">
                            <path fill-rule="evenodd"
                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z">
                            </path>
                            <path
                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z">
                            </path>
                        </svg>
                    </button>
                </div>









                {{-- ------------------------- --}}
                {{-- ------------------------- --}}






                {{-- wallet --}}



                {{-- :: permission - hasWallet --}}
                @if ($versionPermission->customerModuleHasWallet)




                <div class="mt-1">
                    <hr class="w-75 mx-auto mb-4" />
                    <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
                        Wallet<br />Balance
                    </h6>


                    {{-- currentAmount --}}
                    <h4 class="fw-semibold d-flex align-items-center justify-content-center mb-2">
                        {{ number_format($wallet->balance, 1) }}
                    </h4>


                    {{-- deposit --}}
                    <button
                        class="btn btn--scheme btn--scheme-1 py-1 w-75 d-inline-flex align-items-center mx-1 justify-content-center fs-13 fw-semibold shrink--self"
                        type="button" style="/*border: 1px solid var(--color-theme-secondary);*/"
                        data-bs-target="#wallet-deposit" data-bs-toggle="modal">
                        Deposit</button>
                </div>



                @endif
                {{-- end if - permission --}}





            </div>
            {{-- end midCol --}}













            {{-- -------------------------------------------- --}}
            {{-- -------------------------------------------- --}}








            {{-- rightCol --}}
            <div class="col-12 col-xl-5 order-xl-3" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>


                {{-- topRow --}}
                <div class="row mb-3">


                    {{-- planCol --}}
                    <div class="col-12">
                        <div class="item--box py-3 active w-100 mb-3">


                            {{-- plan - range --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="fw-semibold d-flex align-items-center">
                                    {{ $latestSubscription->plan->name }}
                                </h4>
                                <p class="text-center fs-16 mb-0 fw-semibold text-gold">
                                    {{ $latestSubscription->range->name }}
                                </p>
                            </div>




                            {{-- bundle - editBundleTypes --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-normal d-flex align-items-center mb-0">
                                    {{ $latestSubscription->bundle->name }}
                                </h6>






                                {{-- :: editBundle --}}

                                {{-- :: permission - hasEditBundle --}}
                                @if ($versionPermission->customerModuleHasEditBundle)



                                <button class="btn btn--raw-icon fs-15 text-warning d-inline-flex align-items-center justify-content-end scale--3 w-auto
                                    @if ($latestSubscription->untilDate < $globalCurrentDate) disabled @endif"
                                    type="button" data-bs-target="#edit-bundle" data-bs-toggle="modal">
                                    Edit Bundle<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil fs-6 ms-2"
                                        style="fill: var(--bs-warning)">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                        </path>
                                    </svg>
                                </button>


                                @endif
                                {{-- end if - permission --}}



                            </div>
                        </div>
                    </div>
                    {{-- endCol --}}









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




                {{-- :: permission - hasBundleView --}}
                @if ($versionPermission->customerModuleHasBundlesView)






                <div class="row mb-5">




                    {{-- 1: groupByType --}}
                    @foreach ($customer->subscriptionTypes->groupBy('typeId') as $commonType =>
                    $subscriptionTypesByType)




                    {{-- :: avoidDrink --}}
                    @if ($subscriptionTypesByType->first()->type->name != 'Drink')





                    {{-- column --}}
                    <div class="col-4">
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





                @endif
                {{-- end if - permission --}}





                {{-- endRow --}}







                {{-- ----------------------- --}}
                {{-- ----------------------- --}}









                {{-- bagRow --}}
                <div class="row mb-5">



                    {{-- isCoolBag --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
                            Has<br />Cool-Bag
                        </h6>

                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mb-2
                            @if ($latestSubscription->bagId) text-gold @else text-danger @endif">
                            {{ $latestSubscription->bagId ? 'Yes' : 'No' }}
                        </h6>
                    </div>






                    {{-- bagPrice - depositAmount --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
                            150 AED<br />Deposit
                        </h6>

                        <h6 class="fw-semibold d-flex align-items-center justify-content-center mb-2
                        @if ($latestSubscription->bagId) text-gold @else text-danger @endif">
                            {{ $latestSubscription->bagId ? 'Paid' : 'Not Paid' }}
                        </h6>
                    </div>







                    {{-- bagWithCustomer - notCollected --}}
                    <div class="col-4 text-center">

                        <h6 class="fw-normal d-flex align-items-center justify-content-center mb-2">
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
                            wire:model='instance.bagRemarks'>{{ $customer->bagRemarks }}</textarea>
                    </div>
                </div>
                {{-- end bagRow --}}







                {{-- submitButton --}}
                <div class="row">
                    <div class="col">
                        <button
                            class="btn btn--scheme btn--scheme-2 w-100 py-2 d-inline-flex align-items-center mx-1 justify-content-center shrink--self fs-15"
                            style="border: 1px solid var(--color-theme-secondary)" wire:loading.attr='disabled'
                            wire:target='update'>
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





    {{-- 1: manageWallet --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-manage-wallet
        id='{{ $customer->id }}' key='wallet-{{ $customer->id }}' />






    {{-- ------------------------- --}}





    {{-- 2: extendSubscription --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-extend-subscription
        id='{{ $latestSubscription->id }}' key='extend-{{ $latestSubscription->id }}' />





    {{-- 3: shortenSubscription --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-shorten-subscription
        id='{{ $latestSubscription->id }}' key='shorten-{{ $latestSubscription->id }}' />









    {{-- ------------------------- --}}





    {{-- 4: pauseSubscription --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-pause-subscription
        id='{{ $latestSubscription->id }}' key='pause-{{ $latestSubscription->id }}' />






    {{-- 4: un-pauseSubscription --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-resume-subscription
        id='{{ $latestSubscription->id }}' key='un-pause-{{ $latestSubscription->id }}' />





    {{-- ------------------------- --}}







    {{-- 5: editBundleTypes --}}
    <livewire:dashboard.customers.manage.single-customer.components.single-customer-edit-bundle
        id='{{ $latestSubscription->id }}' key='edit-bundle-{{ $latestSubscription->id }}' />








    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





</section>
{{-- endSection --}}