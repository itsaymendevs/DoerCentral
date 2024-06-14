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
                <form class="px-4" wire:submit='store'>
                    <div class="row row pt-2 mb-4">







                        {{-- view purchaseIngredients --}}
                        <div class="col-12 mt-3">
                            <div class="table-responsive memoir--table">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- head --}}
                                    <thead>
                                        <tr>
                                            <th>Ingredient</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Received</th>
                                            <th></th>
                                        </tr>
                                    </thead>



                                    {{-- tbody --}}
                                    <tbody>


                                        {{-- loop - purchaseIngredients --}}
                                        @foreach ($purchaseIngredients as $purchaseIngredient)



                                        {{-- :: view purchaseIngredient --}}
                                        <livewire:dashboard.inventory.purchases.components.purchases-ingredients-edit
                                            id='{{ $purchaseIngredient->id }}'
                                            key='purchase-ingredient-{{ $purchaseIngredient->id }}' />


                                        @endforeach
                                        {{-- end loop --}}


                                    </tbody>
                                    {{-- end tbody --}}



                                </table>
                            </div>
                        </div>
                        {{-- end viewCol --}}


                    </div>
            </div>
        </div>
        </form>
        {{-- endForm --}}



    </div>
</div>
</div>
</div>
{{-- endModal --}}