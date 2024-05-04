<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="unpause-subscription" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- modalHeader --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Un-pause Subscription</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>





                {{-- ------------------------------- --}}
                {{-- ------------------------------- --}}






                {{-- mainDiv --}}
                <div class='px-4'>


                    {{-- row --}}
                    <div class="row align-items-center  pt-2 mb-4 mx-0">
                        <div class="col-12 mt-3">
                            <div class="table-responsive table-pauses memoir--table">
                                <table class="table table-bordered" id="memoir--table">


                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--md">Process</th>
                                            <th class="th--sm">Deliveries</th>
                                            <th class="th--lg">From</th>
                                            <th class="th--lg">Until</th>
                                            <th class="th--sm">Refund<small
                                                    class="ms-1 fw-semibold text-theme-secondary fs-10 ">(AED)</small>
                                            </th>
                                            <th class="th--sm">Status</th>
                                            <th class="th--md"></th>
                                        </tr>
                                    </thead>
                                    {{-- end thead --}}




                                    {{-- ---------------------- --}}
                                    {{-- ---------------------- --}}






                                    {{-- tbody --}}
                                    <tbody>




                                        {{-- loop - pauses --}}
                                        @foreach ($pauses as $pause)


                                        <tr key='{{ $pause->id }}'>


                                            {{-- 1: process --}}
                                            <td class="fs-6 fs-14 text-gold fw-semibold">
                                                {{ $pause->type }}
                                            </td>



                                            {{-- 2: deliveries / days --}}
                                            <td class="fs-6 fw-semibold">{{ $pause->pauseDays }}</td>



                                            {{-- 3: from - until --}}
                                            <td>{{ date('d / m / Y', strtotime($pause->fromDate)) }}</td>
                                            <td>{{ date('d / m / Y', strtotime($pause->untilDate)) }}</td>



                                            {{-- 4: refund totalPrice (Refund Wallet) --}}
                                            <td class="fs-6 fw-semibold">{{ $pause->totalPrice }}</td>





                                            {{-- 5: status --}}
                                            <td>


                                                {{-- :: canceled --}}
                                                @if ($pause->isCanceled)

                                                <span class="badge fs-11 badge--remove scale--self-05">Canceled</span>


                                                {{-- :: notCanceled --}}
                                                @else

                                                <span class="badge fs-11 badge--scheme-3 scale--self-05">Active</span>


                                                @endif
                                                {{-- end if --}}

                                            </td>




                                            {{-- actionButton --}}
                                            <td>




                                                {{-- :: restriction - unPause --}}

                                                @if ($allowedUnPauseDate <= $pause->untilDate)


                                                    <button
                                                        class="btn btn--scheme btn--remove fs-12 px-4 mx-2 scale--self-05 h-32"
                                                        @if ($pause->isCanceled) disabled @endif
                                                        wire:click='unPause({{ $pause->id }})'
                                                        type="button">
                                                        Cancel
                                                    </button>



                                                    {{-- :: disabled --}}
                                                    @else


                                                    <button
                                                        class="btn btn--scheme btn--remove fs-12 px-4 mx-2 scale--self-05 h-32"
                                                        @if ($pause->isCanceled) disabled @endif
                                                        wire:click='unPause({{ $pause->id }})'
                                                        type="button" disabeld>
                                                        Cancel
                                                    </button>



                                                    @endif
                                                    {{-- end if - restriction --}}



                                            </td>
                                        </tr>


                                        @endforeach
                                        {{-- end loop --}}



                                    </tbody>
                                    {{-- end tbody --}}



                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- endRow --}}


                </div>
                {{-- outerDiv --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}