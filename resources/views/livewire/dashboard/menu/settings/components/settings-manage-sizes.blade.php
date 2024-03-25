<div class="row align-items-end pt-2">


    {{-- cover --}}
    <div class="col-5 text-center">
        <img class="w-100 inventory--image-frame of-cover rounded-1"
            src="{{ asset('assets/img/Diets/sizes-2.jpg') }}" />
    </div>




    <form wire:submit='store' class="col-7">
        <div class="row align-items-end">


            {{-- leftCol --}}
            <div class="col-8 text-end">


                {{-- row --}}
                <div class="row">


                    {{-- name --}}
                    <div class="col-6 text-end">
                        <label class="form-label form--label">Name</label>
                        <input wire:model='instance.name' class="form-control form--input mb-4" type="text" required />
                    </div>



                    {{-- shortName --}}
                    <div class="col-6 text-end">
                        <label class="form-label form--label">Abbreviation</label>
                        <input wire:model='instance.shortName' class="form-control form--input mb-4" type="text"
                            required />
                    </div>

                </div>







                {{-- row --}}
                <div class="row">


                    {{-- Price --}}
                    <div class="col-6 text-end">
                        <label class="form-label form--label">Price
                            <small class="fw-semibold text-gold fs-10 ms-1">(AED)</small>
                        </label>
                        <input class="form-control form--input " type="number" step='0.01' wire:model='instance.price'
                            required />
                    </div>



                    {{-- calories --}}
                    <div class="col-6 text-end">
                        <label class="form-label form--label">Calories</label>
                        <input class="form-control form--input " type="number" step='0.01'
                            wire:model='instance.calories' required />
                    </div>
                </div>
                {{-- endRow --}}

            </div>
            {{-- endCol --}}








            {{-- submitButton --}}
            <div class="col-4 text-center">
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

                        {{-- size --}}
                        <th class="th--lg">Size</th>

                        <th class="th--sm">Abbreviation</th>


                        {{-- calories - price --}}
                        <th class="th--sm">Price</th>

                        <th class="th--sm">Calories</th>


                        {{-- empty --}}
                        <th class="th--xs"></th>
                    </tr>
                </thead>








                {{-- ------------------------ --}}
                {{-- ------------------------ --}}







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