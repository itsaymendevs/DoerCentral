{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-center mb-5 pb-2">



            {{-- submenu --}}
            <div class="col-4">

                <livewire:dashboard.extra.finance.components.sub-menu key='submenu' />

            </div>





            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}







            {{-- title --}}
            <div class="col-4 text-center">
                <h4 class="text-center mb-0 fw-bold">Payment Methods</h4>
            </div>








            {{-- --------------------------------- --}}
            {{-- --------------------------------- --}}





            {{-- counter --}}
            <div class="col-4 text-end d-flex align-items-center justify-content-end">

                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-original-title="Number of Methods">
                    {{ $paymentMethods->count() }}
                </h3>

            </div>






        </div>
        {{-- endRow --}}










        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}









        {{-- mainRow --}}
        <div class="row align-items-center mb-5">






            {{-- 1: tableView --}}
            <div class="col-12 mt-4 pt-4 payments-column mb-3" data-view="table" wire:ignore.self>
                <div id="print--table" class="memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- header --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">Payment</th>
                                <th class="th--md">Public Key</th>
                                <th class="th--md">Secret Key</th>
                                <th class="th--md">Third Key</th>
                                <th class="th--sm">Live Keys</th>
                                <th class="th--sm">Activate</th>
                                <th class="th--sm"></th>
                            </tr>
                        </thead>



                        {{-- ------------------------ --}}
                        {{-- ------------------------ --}}






                        {{-- tbody --}}
                        <tbody>




                            {{-- loop - paymentMethods --}}
                            @foreach ($paymentMethods ?? [] as $paymentMethod)



                            <tr key='payment-method-{{ $paymentMethod->id }}'>


                                {{-- 1: counter --}}
                                <td class="fw-bold text-start">
                                    <span class="fs-6 text-center d-block fw-bold">{{ $globalSNCounter++ }}</span>
                                </td>



                                {{-- 1.2: name --}}
                                <td class="text-center fw-semibold">
                                    <span class="d-block fs-14 fw-semibold text-gold">{{
                                        $paymentMethod?->name }}</span>
                                </td>





                                {{-- 1.2: Keys --}}
                                <td class="text-center fs-14">
                                    <span class='span--key truncate-text-1l'>{{ $paymentMethod->envKey }}</span>
                                </td>

                                <td class="text-center fs-14">
                                    <span class='span--key truncate-text-1l' tr>{{ $paymentMethod->envSecondKey
                                        }}</span>
                                </td>


                                <td class="text-center fs-14">
                                    <span class='span--key truncate-text-1l'>{{ $paymentMethod->envThirdKey }}</span>
                                </td>







                                {{-- ------------------------------------ --}}
                                {{-- ------------------------------------ --}}






                                {{-- 1.3: toggleLive --}}
                                <td>
                                    <div class="form-check form-switch form-check-inline input--switch">
                                        <input class="form-check-input" id="formCheck-isLive-{{ $paymentMethod->id }}"
                                            wire:loading.attr='disabled' type="checkbox"
                                            wire:change='toggleLive({{ $paymentMethod->id }})'
                                            @if($paymentMethod->isLive) checked @endif
                                        />
                                        <label class="form-check-label d-none"
                                            for="formCheck-isLive-{{ $paymentMethod->id }}">Live</label>
                                    </div>
                                </td>








                                {{-- 1.4: toggleActive --}}
                                <td>
                                    <div class="form-check form-switch form-check-inline input--switch">
                                        <input class="form-check-input" id="formCheck-isActive-{{ $paymentMethod->id }}"
                                            wire:loading.attr='disabled' type="checkbox"
                                            wire:change='toggleActive({{ $paymentMethod->id }})'
                                            @if($paymentMethod->isActive) checked @endif
                                        />
                                        <label class="form-check-label d-none"
                                            for="formCheck-isActive-{{ $paymentMethod->id }}">Active</label>
                                    </div>
                                </td>










                                {{-- ------------------------------------ --}}
                                {{-- ------------------------------------ --}}








                                {{-- 1.5: editAction --}}
                                <td>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <button class="btn btn--raw-icon inline scale--3" type="button"
                                            wire:click="edit({{ $paymentMethod->id }})" data-bs-toggle="modal"
                                            data-bs-target="#edit-payment">
                                            <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                </td>




                            </tr>
                            @endforeach
                            {{-- end loop - invoices --}}




                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}






        </div>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
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


    {{-- 1: edit --}}
    <livewire:dashboard.extra.finance.payment-methods.components.payment-methods-edit key='edit-payment-modal' />



    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}










</section>
{{-- endSection --}}