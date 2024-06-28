<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="purchase-cart" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="max-width: 1400px;">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Purchase Cart</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- --------------------------------------- --}}
                {{-- --------------------------------------- --}}







                {{-- outerWrapper --}}
                <form wire:submit='store' wire:loading.class='disabled' class="px-4">
                    <div class="row align-items-end pt-2 mb-4">




                        {{-- empty --}}
                        <div class="col-3"></div>






                        {{-- 1: totalSellPrice --}}
                        <div class="col-6 mb-4 text-center">
                            <h5 class='text-decoration-underline d-inline-block'>Total Price</h5>
                            <h5 class='text-gold ms-2 fs-4 fw-semibold d-inline-block'>
                                {{ number_format(array_sum(array_column($instance, 'totalSellPrice')), 2) }}
                            </h5>
                        </div>






                        {{-- 2: receivingDate --}}
                        <div class="col-3 mb-4">

                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 40%" />
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">Receiving
                                    Date</label>
                            </div>

                            <input class="form-control form--input" type="date" wire:model='receivingDate'
                                wire:loading.attr='readonly' required />
                        </div>











                        {{-- ---------------------------------- --}}
                        {{-- ---------------------------------- --}}





                        {{-- wrapper --}}
                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">



                                    {{-- header --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--lg"></th>
                                            <th class="th--sm">Supplier</th>
                                            <th class="th--sm">Quantity</th>
                                            <th class="th--sm">Price / KG</th>
                                            <th class="th--sm">Total</th>

                                            <th class="th--md">Extra Quantity
                                                <small class='fs-10 text-dark'>(%)</small>
                                            </th>

                                            <th class="th--md">Note</th>

                                        </tr>
                                    </thead>
                                    {{-- endHeader --}}





                                    {{-- ----------------------------- --}}
                                    {{-- ----------------------------- --}}





                                    {{-- body --}}
                                    <tbody>



                                        {{-- loop - supplierIngredients --}}
                                        @foreach($instance ?? [] as $key => $singleInstance)


                                        <tr key='single-cart-{{ $singleInstance["id"] }}'>



                                            {{-- 1: ingredient --}}
                                            <td class='fw-semibold'>{{ $globalSNCounter++ }}</td>



                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">{{
                                                    $singleInstance["ingredient"] }}</span>
                                            </td>



                                            {{-- 2: supplier --}}
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">{{
                                                    $singleInstance["supplier"] }}</span>
                                            </td>



                                            {{-- 3: amount --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-semibold text-gold  text-center">{{
                                                    number_format($singleInstance["quantity"] ?? 0, 2) }}
                                                    <small class='fs-10'>(KG)</small>
                                                </span>
                                            </td>





                                            {{-- 4: pricePerKG --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-semibold text-gold  text-center">{{
                                                    number_format($singleInstance["sellPrice"] ?? 0, 2) }}
                                                    <small class='fs-10'>(AED)</small>
                                                </span>

                                            </td>



                                            {{-- 5: totalPrice --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-semibold text-gold text-center">{{
                                                    number_format($singleInstance["totalSellPrice"] ?? 0, 2) }}
                                                    <small class='fs-10'>(AED)</small>
                                                </span>
                                            </td>





                                            {{-- 6: extraAmount --}}
                                            <td>
                                                <input class="form-control form--input form--table-input-sm"
                                                    type="number" step="0.01"
                                                    wire:model="instance.{{ $key }}.extraAmount" required="" min='0'
                                                    max='100' wire:change="updateAmount('{{ $key }}')">
                                            </td>




                                            {{-- 7: note --}}
                                            <td>
                                                <input class="form-control form--input form--table-input" type="text"
                                                    wire:model="instance.{{ $key }}.remarks">
                                            </td>




                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}




                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- endWrapper --}}






                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}




                        {{-- submit --}}
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center
                                mx-1 scale--self-05 @if (count($instance ?? []) == 0) disabled @endif"
                                wire:loading.attr="disabled">
                                Confirm Purchase
                            </button>
                        </div>


                    </div>
                </form>
                {{-- endWrapper --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}