{{-- walletModal --}}
<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="bag-refunds" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">




                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Bag Refunds</h5>
                    <button class="btn btn--raw-icon w-auto" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>





                {{-- --------------------------------------- --}}
                {{-- --------------------------------------- --}}






                {{-- wrapper --}}
                <div class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">
                        <div class="col-12">
                            <div class="table-responsive memoir--table">
                                <table class="table table-bordered" id="memoir--table">



                                    {{-- thead --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xs"></th>
                                            <th class="th--lg">Subscription From</th>
                                            <th class="th--md">Until</th>
                                            <th class="th--sm">Price</th>
                                            <th class="th--md">Bags Collected?</th>
                                            <th class="th--sm"></th>
                                        </tr>
                                    </thead>




                                    {{-- --------------------- --}}
                                    {{-- --------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>



                                        {{-- loop - subscriptions --}}
                                        @foreach ($subscriptions as $subscription)




                                        <tr key='bag-refund-tr-{{ $subscription->id }}'>


                                            {{-- SN --}}
                                            <td>{{ $globalSNCounter++ }}</td>


                                            {{-- startDate --}}
                                            <td>{{ date('d / m / Y', strtotime($subscription->startDate)) }}
                                            </td>


                                            {{-- untilDate --}}
                                            <td>{{ date('d / m / Y', strtotime($subscription->untilDate)) }}
                                            </td>



                                            {{-- bagPrice --}}
                                            <td class="fs-5 fw-semibold text-gold">{{
                                                number_format($subscription->bagPrice)}}</td>





                                            {{-- bagCollected --}}
                                            @if ($subscription->unCollectedBags() == 0)

                                            <td class="fs-5 fw-semibold text-theme-secondary">YES</td>


                                            {{-- notCollected --}}
                                            @else

                                            <td class="fs-5 fw-semibold text-danger">NO</td>

                                            @endif
                                            {{-- end if --}}






                                            {{-- ----------------------------- --}}
                                            {{-- ----------------------------- --}}




                                            {{-- A: refunded --}}
                                            @if ($subscription?->bagRefund)


                                            <td>
                                                <button
                                                    class="btn btn--scheme btn--scheme-2 disabled fs-12 px-3 scale--self-05 h-32"
                                                    type="button">Refunded
                                                </button>
                                            </td>


                                            {{-- B: confirmRefund --}}
                                            @else



                                            <td class="fs-5 fw-semibold text-gold">
                                                <button wire:click='store({{ $subscription->id }})'
                                                    class="btn btn--scheme btn--scheme-3 fs-12 px-3 scale--self-05 h-32"
                                                    wire:loading.attr='disabled' type="button">Refund
                                                </button>
                                            </td>


                                            @endif
                                            {{-- end if --}}





                                        </tr>
                                        @endforeach
                                        {{-- end loop --}}



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endWrapper --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}