{{-- pauseModal --}}
<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="pause-subscription" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Pause Subscription</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}










                {{-- ---------------------------- --}}
                {{-- ---------------------------- --}}




                {{-- form --}}
                <form wire:submit='pause' class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">



                        {{-- types --}}
                        <div class="col-12" wire:ignore>
                            <label class="form-label form--label">Process</label>
                            <div class="select--single-wrapper mb-4">
                                <select class="form-select form--modal-select" data-instance='instance.type'
                                    data-modal='#pause-subscription' required>
                                    <option value=""></option>

                                    @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>








                        {{-- from --}}
                        <div class="col-12 col-sm-6">


                            {{-- label --}}
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 65%;" />
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">From</label>
                            </div>

                            {{-- input --}}
                            <input class="form-control form--input mb-4" type="date" required
                                wire:model.live='instance.fromDate' min="{{ $globalPauseDate }}"
                                max='{{ $subscription?->untilDate }}' />

                        </div>







                        {{-- until --}}
                        <div class=" col-12 col-sm-6">


                            {{-- label --}}
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <hr style="width: 65%;" />
                                <label
                                    class="form-label form--label px-3 w-50 justify-content-center mb-0">Until</label>
                            </div>

                            {{-- input --}}
                            <input class="form-control form--input mb-4" type="date" required
                                wire:model='instance.untilDate' min="{{ $instance->fromDate ?? $globalPauseDate }}"
                                max='{{ $subscription?->untilDate }}' wire:loading.attr='readonly'
                                wire:target='instance.fromDate, pause' />

                        </div>









                        {{-- remarks --}}
                        <div class="col-12">
                            <label class="form-label form--label">Remarks</label>
                            <textarea class="form-control form--input form--textarea mb-4"
                                wire:model='instance.remarks'></textarea>
                        </div>




                        {{-- submitButton --}}
                        <div class="col-12 text-center">
                            <button wire:loading.attr='disabled' wire:target='instance.fromDate, pause'
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05">
                                Confirm
                            </button>
                        </div>
                    </div>
                </form>
                {{-- endForm --}}



            </div>
        </div>
    </div>
    {{-- endContainer --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-select").on("change", function(event) {



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