<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="view-instructions" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Instructions</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}




                {{-- row --}}
                <form class="px-4">
                    <div class="row pt-2 mb-4">


                        {{-- mealName --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $meal?->name }}">
                        </div>




                        {{-- subHeading --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    Instructions
                                </label>
                            </div>
                        </div>





                        {{-- ------------------------- --}}
                        {{-- ------------------------- --}}






                        {{-- instructions --}}
                        @if (count($instructions ?? []) > 0)



                        {{-- loop - instructions --}}
                        @foreach ($instructions ?? [] as $instruction)


                        <div class="col-12">
                            <p class='fs-14 instruction--wrap'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    class="bi bi-diamond-half me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM8 .989c.127 0 .253.049.35.145l6.516 6.516a.495.495 0 0 1 0 .7L8.35 14.866a.5.5 0 0 1-.35.145z" />
                                </svg>
                                <span>{{ $instruction->content }}</span>
                            </p>
                        </div>


                        @endforeach
                        {{-- end loop --}}


                        @endif
                        {{-- end if --}}




                    </div>
                </form>
                {{-- endRow --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}