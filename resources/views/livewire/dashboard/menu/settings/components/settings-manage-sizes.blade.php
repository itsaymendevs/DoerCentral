<div class="row align-items-end pt-2">


    {{-- cover --}}
    <div class="col-5 text-center">
        <img class="w-100 inventory--image-frame of-cover rounded-1"
            src="{{ asset('assets/img/Diets/sizes-2.jpg') }}" />
    </div>




    <form wire:submit='store' class="col-7">
        <div class="row">


            {{-- name --}}
            <div class="col-6 text-end">
                <label class="form-label form--label">Name</label>
                <input wire:model='instance.name' class="form-control form--input mb-4" type="text" required />
            </div>


            {{-- price --}}
            <div class="col-6 text-end">
                <label class="form-label form--label">Price</label>
                <input class="form-control form--input mb-4" type="number" step='0.01' wire:model='instance.price'
                    required />
            </div>


            {{-- calories --}}
            <div class="col text-end">
                <div class="overview--box shrink--self macros-version">
                    <h6>Calories</h6>
                    <p>
                        <input class="form-control form--input form--table-input-xs" type="number" step='0.01'
                            wire:model='instance.calories' required />
                    </p>
                </div>
            </div>


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





            {{-- submitButton --}}
            <div class="col-12 text-center mt-3">
                <button
                    class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                    wire:loading.attr='disabled'>
                    Save
                </button>
            </div>
        </div>
    </form>
    {{-- endForm --}}







    {{-- -------------------------------------------- --}}
    {{-- -------------------------------------------- --}}





    {{-- viewTable --}}
    <div class="col-12 mt-5" data-view="table">
        <div class="table-responsive memoir--table w-100">
            <table class="table table-bordered" id="memoir--table">

                {{-- headers --}}
                <thead>
                    <tr>
                        <th class="th--lg" s="">Size</th>
                        <th class="th--sm">Calories
                            <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                        </th>
                        <th class="th--sm">Proteins
                            <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                        </th>
                        <th class="th--sm">Carbs
                            <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                        </th>
                        <th class="th--sm">Fats
                            <small class="fw-semibold text-theme-secondary fs-10">(%)</small>
                        </th>
                        <th class="th--xs"></th>
                    </tr>
                </thead>


                {{-- tbody --}}
                <tbody>



                    {{-- loop - sizes --}}
                    @foreach ($sizes as $size)
                    <livewire:dashboard.menu.settings.components.settings-view-size :id='$size->id'
                        key='{{ $size->id }}' />
                    @endforeach
                    {{-- end loop --}}


                </tbody>
            </table>
        </div>
    </div>
    {{-- end viewTable --}}


</div>
{{-- endRow --}}