<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="meal-excludes" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">


                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Excludes</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>







                {{-- --------------------------- --}}
                {{-- --------------------------- --}}





                {{-- wrapper --}}
                <div class="px-4">
                    <div class="row align-items-end row pt-2 mb-4">
                        <div class="col-12">
                            <div class="table-responsive memoir--table">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--xl">Ingredient</th>
                                        </tr>
                                    </thead>







                                    {{-- -------------------- --}}
                                    {{-- -------------------- --}}




                                    @php
                                    $counter = 1;
                                    @endphp








                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- 1: loop - allergies --}}
                                        @foreach ($allergyIngredients ?? [] as $allergyIngredient)

                                        <tr key='view-allergies-{{ $meal?->id }}-{{ $allergyIngredient?->id }}'>
                                            <td class="fs-14 text-gold">{{ $counter++ }}</td>
                                            <td class="fs-14">{{ $allergyIngredient->name }}</td>
                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}











                                        {{-- 2: loop - excludes --}}
                                        @foreach ($excludeIngredients ?? [] as $excludeIngredient)

                                        <tr key='view-excludes-{{ $meal?->id }}-{{ $excludeIngredient?->id }}'>
                                            <td class="fs-14 text-gold">{{ $counter++ }}</td>
                                            <td class="fs-14">{{ $excludeIngredient->name }}</td>
                                        </tr>

                                        @endforeach
                                        {{-- end loop --}}





                                    </tbody>
                                </table>
                            </div>
                            {{-- end table --}}


                        </div>
                    </div>
                </div>
                {{-- endWrapper --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}