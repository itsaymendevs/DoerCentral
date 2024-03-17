{{-- determineCustomer --}}
<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="determine-customer" wire:ignore>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- row --}}
                <div class="row">


                    {{-- 1: newSubscriber --}}
                    <div class="col-12 col-lg-6">
                        <div class="question--link">
                            <a class="init-link w-100 h-100 py-2" role='button' data-bs-target="#new-customer" href='#'
                                data-bs-toggle="modal">
                                <h1 class="fs-3 text-center">New <br />Subscriber?</h1>
                            </a>
                        </div>
                    </div>



                    {{-- 2: existingSubscriber --}}
                    <div class="col-12 col-lg-6">
                        <div class="question--link reverse">
                            <a role='button' class="init-link w-100 h-100 py-2" data-bs-target="#existing-customer"
                                href='#' data-bs-toggle="modal">
                                <h1 class="fs-3 text-center">
                                    Existing<br />Subscriber?
                                </h1>
                            </a>
                        </div>
                    </div>

                </div>
                {{-- endRow --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}