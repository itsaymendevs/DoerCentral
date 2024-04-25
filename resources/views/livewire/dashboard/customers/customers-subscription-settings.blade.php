{{-- sectionContainer --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.customers.components.sub-menu key='1' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- mainRow --}}
        <div class="row align-items-center mb-3">
            <div class="col-12">







                {{-- 1: subscription --}}
                <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">
                    <div class="row">
                        <div class="col-12">
                            <div>


                                {{-- togglerButton --}}
                                <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"
                                    role="button">Subscription<svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16"
                                        class="bi bi-chevron-expand">
                                        <path fill-rule="evenodd"
                                            d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                        </path>
                                    </svg>
                                </a>





                                {{-- ------------------------ --}}
                                {{-- ------------------------ --}}




                                {{-- collapse --}}
                                <div class="collapse show collapse--content" id="collapse-1">
                                    <form wire:submit='update' class="row align-items-end pt-2">




                                        {{-- 1: minDeliveryDays --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Minimum Delivery Days</label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.minimumDeliveryDays' required />
                                        </div>







                                        {{-- 2: pauseRestriction --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Pause Restriction
                                                <small class="fw-semibold text-gold fs-10 ms-1">(Days)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.pauseRestriction' required />
                                        </div>








                                        {{-- 3: unPauseRestriction --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Un-Pause Restriction
                                                <small class="fw-semibold text-gold fs-10 ms-1">(Days)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.unPauseRestriction' required />
                                        </div>









                                        {{-- 4: skipRestriction --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Skip Restriction
                                                <small class="fw-semibold text-gold fs-10 ms-1">(Days)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.skipRestriction' required />
                                        </div>






                                        {{-- 5: customer's calendar --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Customer's Calendar
                                                <small class="fw-semibold text-gold fs-10 ms-1">(Days)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.changeCalendarRestriction' required />
                                        </div>







                                        {{-- 6: customer's mealSelection --}}
                                        <div class="col-4">
                                            <label class="form-label form--label">Customer's Meal Selection
                                                <small class="fw-semibold text-gold fs-10 ms-1">(Days)</small>
                                            </label>
                                            <input class="form-control form--input mb-4" type="number" min='0' step='1'
                                                wire:model='instance.mealSelectionRestriction' required />
                                        </div>





                                        {{-- :: submitButton --}}
                                        <div class="col-12 text-end">
                                            <button wire:loading.attr='disabled'
                                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                    {{-- endForm --}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endTab --}}








                {{-- --------------------------------- --}}
                {{-- --------------------------------- --}}




            </div>
        </div>
    </div>
    {{-- endContainer --}}













</section>
{{-- endSection --}}