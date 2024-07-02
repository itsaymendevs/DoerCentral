{{-- row --}}
<div class="row row pt-2 align-items-center mb-4">


    {{-- newPromoCode --}}
    <div class="col-3">
        <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
            data-bs-target="#new-promo" data-bs-toggle="modal" type="button">
            <svg class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                </path>
            </svg>New Promo
        </button>
    </div>



    {{-- search --}}
    <div class="col-6 text-center">
        <input class="form-control form--input main-version mx-auto" type="search"
            wire:model.live.debounce.50ms='searchPromoCode' placeholder="Search by PromoCode" />
    </div>


    {{-- counter --}}
    <div class="col-3 text-end">
        <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
            data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Promos">
            {{ $promoCodes->count() }}
        </h3>
    </div>




    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}






    {{-- viewPromos --}}
    <div class="col-12 ingredients-column mt-4" data-view="table">
        <div class="table-responsive memoir--table w-100">

            {{-- table --}}
            <table class="table table-bordered" id="memoir--table">
                <thead>
                    <tr>
                        <th class="th--lg">Name</th>
                        <th class="th--md">Code</th>
                        <th class="th--md">Amount</th>
                        <th class="th--xs">Limit</th>
                        <th class="th--xs">Used</th>
                        <th class="th--sm">Status</th>



                        {{-- :: permission - hasPromoTogglers --}}
                        @if ($versionPermission->salesModuleHasPromoTogglers)


                        <th class="th--sm">Active?</th>
                        <th class="th--sm">For Website?</th>

                        @endif
                        {{-- end if - permission --}}



                        <th class="th--xs"></th>
                    </tr>
                </thead>






                {{-- tbody --}}
                <tbody>


                    {{-- loop - promoCodes --}}
                    @foreach ($promoCodes as $promoCode)
                    <tr>



                        {{-- name - code --}}
                        <td class="fw-bold">{{ $promoCode->name }}</td>
                        <td>{{ $promoCode->code }}</td>



                        {{-- amount --}}
                        <td class="scale--3 ">
                            @if ($promoCode->percentage)
                            {{ $promoCode->percentage }}<small class="ms-1 fw-semibold text-gold fs-10">(%)</small>
                            @else
                            {{ $promoCode->cashAmount }}<small class="ms-1 fw-semibold text-gold fs-10">(AED)</small>
                            @endif
                        </td>




                        {{-- limit - used --}}
                        <td>{{ $promoCode->limit }}</td>
                        <td>{{ $promoCode->currentUsage }}</td>





                        {{-- status --}}
                        <td>

                            {{-- isActive --}}
                            @if ($promoCode->isActive)
                            <span class="badge fs-11 badge--scheme-2 scale--self-05">Active</span>
                            @else
                            <span class="badge fs-11 badge--remove scale--self-05">Inactive</span>
                            @endif
                            {{-- endif --}}

                        </td>







                        {{-- :: permission - hasPromoTogglers --}}
                        @if ($versionPermission->salesModuleHasPromoTogglers)




                        {{-- isActive --}}
                        <td>
                            <div class="form-check form-switch form-check-inline input--switch">
                                <input class="form-check-input" id="formCheck-isActive-{{ $promoCode->id }}"
                                    type="checkbox" wire:change='toggleActive({{ $promoCode->id }})'
                                    @if($promoCode->isActive) checked @endif />
                                <label class="form-check-label d-none"
                                    for="formCheck-isActive-{{ $promoCode->id }}">Active</label>
                            </div>
                        </td>







                        {{-- isForWebsite --}}
                        <td>
                            <div class="form-check form-switch form-check-inline input--switch">
                                <input class="form-check-input" id="formCheck-{{ $promoCode->id }}" type="checkbox"
                                    wire:change='toggleForWebsite({{ $promoCode->id }})' @if($promoCode->isForWebsite)
                                checked @endif />
                                <label class="form-check-label d-none"
                                    for="formCheck-{{ $promoCode->id }}">Hidden</label>
                            </div>
                        </td>




                        @endif
                        {{-- end if - permission --}}








                        {{-- actions --}}
                        <td>
                            <div class="d-flex align-items-center justify-content-center">


                                {{-- 1: edit --}}
                                <button class="btn btn--raw-icon inline edit scale--3" data-bs-toggle='modal'
                                    data-bs-target='#edit-promo' type="button" wire:click='edit({{ $promoCode->id }})'>
                                    <svg class="bi bi-pencil-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                                        </path>
                                    </svg>
                                </button>




                                {{-- 2: remove --}}
                                <button class="btn btn--raw-icon inline remove scale--3" type="button"
                                    wire:click='remove({{ $promoCode->id }})' wire:loading.attr='disabled'>
                                    <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                        </path>
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{-- end loop --}}

                </tbody>
            </table>
            {{-- end table --}}




        </div>
    </div>
</div>
{{-- endRow --}}