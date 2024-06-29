<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="purchase-confirm" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">




                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Purchase Confirmation</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}








                {{-- form --}}
                <form class="px-4" wire:submit='update'>
                    <div class="row row pt-2 mb-4">







                        {{-- view purchaseIngredients --}}
                        <div class="col-12 mt-3">
                            <div class="table-responsive memoir--table">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- head --}}
                                    <thead>
                                        <tr>

                                            <th class='th--xs'></th>
                                            <th class='th--lg'>Item</th>
                                            <th class='th--xs'>Unit</th>
                                            <th class='th--sm'>Quantity</th>
                                            <th class='th--md'>Received</th>
                                        </tr>
                                    </thead>





                                    {{-- tbody --}}
                                    <tbody>


                                        {{-- 1: loop - containers --}}
                                        @foreach ($purchaseContainers as $purchaseContainer)

                                        <tr>


                                            {{-- item - unit - quantity --}}
                                            <td>{{ $globalSNCounter++ }}</td>

                                            <td>{{ $purchaseContainer?->item?->name }}</td>
                                            <td>{{ $purchaseContainer?->unit?->name }}</td>
                                            <td>{{ $purchaseContainer?->quantity }}</td>


                                            <td>
                                                <input class="form-control form--input form--table-input-sm"
                                                    type="number" min='0' step='0.1' required
                                                    wire:model='receivedContainersQuantity.{{ $purchaseContainer->id }}' />
                                            </td>


                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}





                                        {{-- ------------------------------- --}}
                                        {{-- ------------------------------- --}}








                                        {{-- 2: loop - label --}}
                                        @foreach ($purchaseLabels as $purchaseLabel)

                                        <tr>


                                            {{-- item - unit - quantity --}}
                                            <td>{{ $globalSNCounter++ }}</td>

                                            <td>{{ $purchaseLabel?->item?->name }}</td>
                                            <td>{{ $purchaseLabel?->unit?->name }}</td>
                                            <td>{{ $purchaseLabel?->quantity }}</td>


                                            <td>
                                                <input class="form-control form--input form--table-input-sm"
                                                    type="number" min='0' step='0.1' required
                                                    wire:model='receivedLabelsQuantity.{{ $purchaseLabel->id }}' />
                                            </td>


                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}





                                        {{-- ------------------------------- --}}
                                        {{-- ------------------------------- --}}







                                        {{-- 3: loop - label --}}
                                        @foreach ($purchaseItems as $purchaseItem)

                                        <tr>


                                            {{-- item - unit - quantity --}}
                                            <td>{{ $globalSNCounter++ }}</td>

                                            <td>{{ $purchaseItem?->item?->name }}</td>
                                            <td>{{ $purchaseItem?->unit?->name }}</td>
                                            <td>{{ $purchaseItem?->quantity }}</td>


                                            <td>
                                                <input class="form-control form--input form--table-input-sm"
                                                    type="number" min='0' step='0.1' required
                                                    wire:model='receivedItemsQuantity.{{ $purchaseItem->id }}' />
                                            </td>


                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}



                                    </tbody>
                                    {{-- end tbody --}}



                                </table>
                            </div>
                        </div>
                        {{-- end viewCol --}}










                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>
                                Confirm
                            </button>
                        </div>




                    </div>
                </form>
                {{-- endForm --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}