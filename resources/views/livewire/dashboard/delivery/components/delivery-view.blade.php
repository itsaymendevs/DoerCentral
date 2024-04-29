{{-- wrapper --}}
<div class='d-none'>

    {{-- filters --}}
    <div class="row align-items-center">

        {{-- plan --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Plan</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select">
                    <option value=""></option>
                    <option value="1">FIrst Option</option>
                </select>
            </div>
        </div>


        {{-- status --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Status</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select">
                    <option value=""></option>
                    <option value="1">FIrst Option</option>
                </select>
            </div>
        </div>




        {{-- fromDate --}}
        <div class="col-2"><label class="form-label form--label">From</label>
            <input class="form-control form--input mb-4" type="date">
        </div>


        {{-- untilDate --}}
        <div class="col-2"><label class="form-label form--label">Until</label>
            <input class="form-control form--input mb-4" type="date">
        </div>




        {{-- counter --}}
        <div class="col-4 text-end">
            <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Deliveries">3</h3>
        </div>
    </div>
    {{-- endFilters --}}





    {{-- ------------------------------- --}}






    {{-- tableRow --}}
    <div class="row row pt-2 align-items-center mb-4">
        <div class="col-12 mt-4">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">

                    {{-- thead --}}
                    <thead>
                        <tr>
                            <th class="th--xs"></th>
                            <th class="th--sm">Customer</th>
                            <th class="th--sm">Plan</th>
                            <th class="th--sm">Timing</th>
                            <th class="th--md">Address</th>
                            <th class="th--xs">Date</th>
                            <th class="th--xs">Status</th>
                        </tr>
                    </thead>






                    {{-- tbody --}}
                    <tbody>


                        {{-- loop - deliveries --}}
                        <tr>

                            {{-- serial - customer - plan - timing --}}
                            <td class="fw-bold">D-0001</td>
                            <td class="fw-bold">Shazali Kareem</td>
                            <td>Weight Loss</td>
                            <td class="scale--3">Early Timing</td>


                            {{-- address - status --}}
                            <td>Dubai - Business Bay<br>Floor 3 / Apartment 35</td>
                            <td>21/02/2024</td>


                            {{-- status --}}
                            <td>
                                <span class="badge fs-11 badge--theme-secondary pointer scale--self-05">Delivered</span>

                                {{-- <span class="badge fs-11 badge--warning pointer scale--self-05">Not
                                    Delivered</span> --}}
                            </td>


                        </tr>
                        {{-- end loop --}}


                    </tbody>
                </table>
                {{-- end table --}}


            </div>
        </div>
    </div>
</div>
{{-- end wrapper --}}