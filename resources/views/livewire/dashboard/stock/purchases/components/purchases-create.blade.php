<div class="modal fade modal--shadow" id="new-purchase" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Purchase</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" data-bs-dismiss="modal" type="button" title="Close Modal">
                        <svg class="bi bi-dash-lg fs-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>







                {{-- ------------------------------------------------------ --}}
                {{-- ------------------------------------------------------ --}}





                {{-- form --}}
                <form wire:submit='store' class="px-4">
                    <div class="row row pt-2 mb-4">



                        {{-- vendors --}}
                        <div class="col-4" wire:ignore>
                            <label class="form-label form--label">Vendor</label>
                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                <select class="form-select form--modal-select form--modal-create-purchase-select"
                                    data-modal='#new-purchase' data-instance='instance.vendorId' required>
                                    <option value=""></option>

                                    @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>







                        {{-- reference --}}
                        <div class="col-4">
                            <label class="form-label form--label">Reference</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.purchaseID'
                                required />
                        </div>






                        {{-- receivingDate --}}
                        <div class="col-4">
                            <label class="form-label form--label">Receiving Date</label>
                            <input class="form-control form--input mb-4" type="date" wire:model='instance.receivingDate'
                                required min="{{ $globalCurrentDate }}" />
                        </div>






                        {{-- po. --}}
                        <div class="col-4">
                            <label class="form-label form--label">P.O Number</label>
                            <input class="form-control form--input mb-4 readonly" type="text" value='{{ $po }}' required
                                readonly="" />
                        </div>




                        {{-- remark - note --}}
                        <div class="col-8">
                            <label class="form-label form--label">Remarks</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.remarks' />
                        </div>




                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>
                                Save
                            </button>
                        </div>




                    </div>
                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
    {{-- end modalBody --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-create-purchase-select").on("change", function(event) {



          // 1.1: getValue - instance
          selectValue = $(this).select2('val');
          instance = $(this).attr('data-instance');


          @this.set(instance, selectValue);


       }); //end function
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






</div>
{{-- endModal --}}