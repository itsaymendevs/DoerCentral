{{-- wrap --}}
<div>
    <div class="row row pt-2 align-items-center mb-4">











        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}






        {{-- tableView --}}
        <div class="col-12 mt-5" data-view="table">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">



                    {{-- tableHead --}}
                    <thead>
                        <tr>
                            <th class="th--xs"></th>
                            <th class="th--md" s="">Supplier</th>
                            <th class="th--md">PO. / Reference</th>
                            <th class="th--xs">Ingredients</th>
                            <th class="th--xs">Pricing</th>
                            <th class="th--xs">Status</th>
                            <th class="th--md"></th>
                        </tr>
                    </thead>





                    {{-- tbody --}}
                    <tbody>


                        {{-- loop - purchase --}}
                        @foreach ($purchases as $purchase)
                        <tr key='{{ now() }}'>



                            {{-- supplier - po. - reference --}}
                            <td class="fw-bold">PR-{{ $purchase->id }}</td>
                            <td class="fw-bold">{{ $purchase->supplier->name }}</td>
                            <td>{{ $purchase->PONumber }} / {{ $purchase->purchaseID }}</td>



                            {{-- ingredients --}}
                            <td class="scale--3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button class="btn btn--raw-icon inline view scale--3"
                                        wire:click='manageIngredients({{ $purchase->id }})'
                                        data-bs-target="#purchase-ingredients" data-bs-toggle="modal" type="button">
                                        <svg class="bi bi-eye-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>




                            {{-- pricing --}}
                            <td class="fw-bold">
                                <span class="fw-bold fs-6">{{ number_format($purchase->totalBuyPrice(), 2) }}</span>
                            </td>






                            {{-- confirmPurchase --}}
                            <td class="fw-bold">


                                {{-- :: isConfirmed --}}
                                @if ($purchase->isConfirmed)

                                <span class="badge fs-11 badge--scheme-2">Confirmed</span>


                                {{-- :: notConfirmed --}}
                                @else

                                <span class="badge fs-11 badge--warning pointer scale--self-05"
                                    wire:click='confirm({{ $purchase->id }})'
                                    wire:loading.attr='disabled'>Confirm?</span>

                                @endif

                            </td>







                            {{-- actions --}}
                            <td>
                                <div class="d-flex align-items-center justify-content-center">



                                    {{-- 1: edit --}}
                                    <button class="btn btn--raw-icon inline edit scale--3" type="button"
                                        wire:click='edit({{ $purchase->id }})' data-bs-toggle="modal"
                                        data-bs-target="#edit-purchase" @if ($purchase->isConfirmed) disabled @endif>
                                        <svg class="bi bi-pencil-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                                            </path>
                                        </svg>
                                    </button>





                                    {{-- remove --}}
                                    <button class="btn btn--raw-icon inline remove scale--3" type="button"
                                        wire:click='remove({{ $purchase->id }})' @if ($purchase->isConfirmed) disabled
                                        @endif wire:loading.attr='disabled' >
                                        <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>


                            </td>
                            {{-- end actions --}}




                        </tr>
                        @endforeach

                        {{-- end loop --}}

                    </tbody>
                </table>
            </div>
            {{-- end tableView --}}


        </div>
    </div>
</div>
{{-- end wrap --}}