<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="purchase-cart" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
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
                    <div class="row pt-2 mb-4">



                        <div class="col-12 mb-2 text-center">
                            <h5 class='text-decoration-underline d-inline-block'>Total Price</h5>
                            <h5 class='text-gold ms-2 fs-4 fw-semibold d-inline-block'>
                                {{ number_format(array_sum(array_column($instance, 'totalSellPrice')), 2) }}
                            </h5>
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
                                            <th class="th--sm">Price / KG</th>
                                            <th class="th--sm">Total Price</th>

                                            <th class="th--sm">Extra Amount
                                                <small class='fs-10 text-dark'>(%)</small>
                                            </th>

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




                                            {{-- 3: pricePerKG --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-semibold text-gold  text-center">{{
                                                    number_format($singleInstance["sellPrice"] ?? 0, 2) }}</span>
                                            </td>



                                            {{-- 4: totalPrice --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-semibold text-gold text-center">{{
                                                    number_format($singleInstance["totalSellPrice"] ?? 0, 2) }}</span>
                                            </td>





                                            {{-- 5: extraAmount --}}
                                            <td>
                                                <input class="form-control form--input form--table-input-sm"
                                                    type="number" step="0.01"
                                                    wire:model="instance.{{ $key }}.extraAmount" required="" min='0'
                                                    max='100' wire:change="updateAmount('{{ $key }}')">
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