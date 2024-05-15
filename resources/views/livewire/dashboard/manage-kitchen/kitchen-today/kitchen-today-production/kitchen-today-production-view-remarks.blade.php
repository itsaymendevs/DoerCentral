<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="view-remarks" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Remarks</h5>
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


                        {{-- partName --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $scheduleMeals?->first()?->meal?->name }}">
                        </div>




                        {{-- subHeading --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label class="form-label form--label px-3 w-50 justify-content-center mb-0">
                                    List of Remarks
                                </label>
                            </div>
                        </div>










                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}
                        {{-- ----------------------------------- --}}







                        {{-- tableCol --}}
                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--lg"></th>
                                            <th class="th--xl text-start ps-3">Remarks</th>
                                        </tr>
                                    </thead>




                                    {{-- -------------------------- --}}
                                    {{-- -------------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- loop - scheduleMeals --}}
                                        @foreach ($scheduleMeals ?? [] as $scheduleMeal)

                                        <tr key='meal-remarks-{{ $scheduleMeal->id }}'>


                                            {{-- SN - name --}}
                                            <td class="fw-bold text-center">{{ $globalSNCounter++ }}</td>
                                            <td class="fw-bold text-center">
                                                <span class="d-block fs-14 fw-normal text-gold">{{
                                                    $scheduleMeal->customer->fullName() }}</span>
                                            </td>




                                            {{-- remark --}}
                                            <td class="fw-bold text-start ps-3">
                                                <span class="d-block fs-14 fw-normal">{{ $scheduleMeal?->remarks
                                                    }}</span>
                                            </td>

                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end tableCol --}}


                    </div>
                </form>
                {{-- endRow --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}