<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="cost-details" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Cost Details</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>






                {{-- --------------------------------------- --}}
                {{-- --------------------------------------- --}}







                {{-- outerWrapper --}}
                <div class="px-4">
                    <div class="row row pt-2 mb-4">


                        {{-- 1: meal --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" type="text" readonly=""
                                value="{{ $mealSize?->meal?->name }}">
                        </div>





                        {{-- 1.2: currentCost --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label
                                    class="form-label fs-15 form--label px-3 w-50 justify-content-center mb-0 text-gold fw-semibold">Breakdown</label>
                            </div>
                        </div>






                        {{-- --------------------------------------------- --}}
                        {{-- --------------------------------------------- --}}







                        {{-- wrapper --}}
                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">



                                    {{-- header --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xl"></th>
                                            <th class="th--xl">Cost</th>
                                        </tr>
                                    </thead>
                                    {{-- endHeader --}}





                                    {{-- ----------------------------- --}}
                                    {{-- ----------------------------- --}}





                                    {{-- body --}}
                                    <tbody>



                                        {{-- 1: foodCost --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">Food Cost</span>
                                            </td>

                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-normal text-center">{{
                                                    $combine?->foodCost }}</span>
                                            </td>
                                        </tr>






                                        {{-- --------------------- --}}
                                        {{-- --------------------- --}}





                                        {{-- 1.3: operation --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">Operation</span>
                                            </td>

                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-normal text-center">{{
                                                    $combine?->operationCost }}</span>
                                            </td>
                                        </tr>






                                        {{-- 1.4: container --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">Container</span>
                                            </td>

                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-normal text-center">{{
                                                    ($combine?->containerCost + $combine?->lidCost) ?? 0 }}</span>
                                            </td>
                                        </tr>






                                        {{-- 1.5: labelCost --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">Label Cost</span>
                                            </td>

                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-normal text-center">
                                                    {{ $combine?->labelCost }}</span>
                                            </td>
                                        </tr>




                                        {{-- 1.6: margin --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal">Margin
                                                    <small class="fw-semibold text-gold fs-12 ms-1">(%)</small>
                                                </span>
                                            </td>

                                            <td class="fw-bold text-start ps-3">
                                                <span class="fs-6 d-block fw-normal text-center">
                                                    {{ $combine?->margin }}</span>
                                            </td>
                                        </tr>



                                        {{-- 1.7: totalPrice --}}
                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span
                                                    class="fs-5 d-block fw-semibold text-gold text-decoration-underline">Total
                                                    Price</span>
                                            </td>

                                            <td class="fw-bold text-start ps-3"><span
                                                    class="fs-4 d-block fw-semibold text-center">
                                                    {{ $combine?->totalCost }}</span>
                                            </td>
                                        </tr>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- endWrapper --}}


                    </div>
                </div>
                {{-- endWrapper --}}



            </div>
        </div>
    </div>
</div>
{{-- endModal --}}