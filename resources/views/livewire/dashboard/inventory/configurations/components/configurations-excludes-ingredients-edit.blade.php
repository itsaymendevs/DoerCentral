<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="edit-exclude" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Exclude</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ------------------------------- --}}
                {{-- ------------------------------- --}}





                {{-- form --}}
                <form wire:submit='update' class="px-4">
                    <div class="row row pt-2 mb-4">



                        {{-- name --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $instance?->name }}">
                        </div>




                        {{-- ingredients --}}
                        <div class="col-12" wire:ignore>



                            {{-- hr --}}
                            <div class="d-flex align-items-center justify-content-between mb-1 hr--title">
                                <hr style="width: 70%;">
                                <label
                                    class="form-label form--label px-3 w-25 justify-content-center mb-0">Ingredients</label>
                            </div>



                            {{-- select --}}
                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                                <select class="form-select form--modal-select form--modal-exclude-ingredient-select"
                                    id='exclude-ingredients-select-2' data-modal='#edit-exclude'
                                    data-instance='instance.ingredients' multiple>


                                    @foreach ($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>





                        {{-- submitButton --}}
                        <div class="col-12 text-end mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>Update</button>
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
        $(".form--modal-exclude-ingredient-select").on("change", function(event) {



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