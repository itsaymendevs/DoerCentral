{{-- wrapper --}}
<div>

    {{-- form --}}
    <form wire:submit='store' class="row align-items-end pt-2">

        {{-- cover --}}
        <div class="col-5 text-center">
            <img class="w-100 inventory--image-frame of-cover rounded-1" src="{{ asset('assets/img/Diets/2.jpg') }}"
                style="height:300px" />
        </div>



        {{-- name / desc --}}
        <div class="col-4">




            <label class="form-label form--label">Name</label>
            <input wire:model='instance.name' class="form-control form--input mb-4" type="text" required />

            <label class="form-label form--label">Description</label>
            <textarea wire:model='instance.desc' class="form-control form--input form--textarea" required></textarea>





            {{-- macrosRow --}}
            <div class="row mt-3">

                {{-- proteins --}}
                <div class="col text-end">
                    <div class="overview--box shrink--self macros-version">
                        <h6>Proteins<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                        <p>
                            <input class="form-control form--input form--table-input-xs" type="number" step='0.01'
                                wire:model='instance.proteins' required />
                        </p>
                    </div>
                </div>


                {{-- carbs --}}
                <div class="col text-end">
                    <div class="overview--box shrink--self macros-version">
                        <h6>Carbs<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                        <p>
                            <input class="form-control form--input form--table-input-xs" type="number" step='0.01'
                                wire:model='instance.carbs' required />
                        </p>
                    </div>
                </div>



                {{-- fats --}}
                <div class="col text-end">
                    <div class="overview--box shrink--self macros-version">
                        <h6>Fats<small class="fw-semibold text-gold fs-10 ms-1">(%)</small></h6>
                        <p>
                            <input class="form-control form--input form--table-input-xs" type="number" step='0.01'
                                wire:model='instance.fats' required />
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- endCol --}}








        {{-- submitButton --}}
        <div class="col-3 text-center">
            <button
                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                wire:loading.attr='disabled'>
                Save
            </button>
        </div>
    </form>
    {{-- endForm --}}






    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}







    {{-- viewDiets --}}
    <div class="row align-items-end">

        <div class="col-12 mt-5" data-view="table">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">

                    {{-- headers --}}
                    <thead>
                        <tr>

                            {{-- dietType --}}
                            <th class="th--xs"></th>
                            <th class="th--md">Diet Type</th>


                            {{-- macros --}}
                            <th class="th--sm">Proteins
                                <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                            </th>
                            <th class="th--sm">Carbs
                                <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                            </th>
                            <th class="th--sm">Fats
                                <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                            </th>

                            {{-- empty --}}
                            <th class="th--xs"></th>
                        </tr>
                    </thead>





                    {{-- body --}}
                    <tbody>



                        {{-- loop - diets --}}
                        @foreach ($diets as $diet)
                        <livewire:dashboard.menu.settings.components.settings-view-diet :id='$diet->id'
                            key='{{ $diet->id }}' />
                        @endforeach
                        {{-- end loop --}}



                    </tbody>
                </table>
                {{-- end table --}}

            </div>
        </div>
    </div>
    {{-- end viewDiets --}}


</div>
{{-- endWrapper --}}