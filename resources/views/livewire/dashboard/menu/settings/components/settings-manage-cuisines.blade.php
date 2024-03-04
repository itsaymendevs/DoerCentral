{{-- wrapper --}}
<div>



    {{-- form --}}
    <form wire:submit='store' class="row align-items-end pt-2">


        {{-- cover --}}
        <div class="col-5 text-center">
            <img class="w-100 inventory--image-frame sm of-cover rounded-1"
                src="{{ asset('assets/img/Diets/cuisines.jpg') }}" style="object-position: center bottom" />
        </div>


        {{-- name --}}
        <div class="col-4">
            <label class="form-label form--label">Name</label>
            <input wire:model='instance.name' class="form-control form--input" type="text" required />
        </div>

        {{-- submitButton --}}
        <div class="col-3 text-center">
            <button
                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                wire:loading.attr='disabled'>
                Save
            </button>
        </div>
    </form>
    {{-- end form --}}






    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}






    {{-- viewTable --}}
    <div class="row align-items-end">
        <div class="col-12 mt-5" data-view="table">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">

                    {{-- headers --}}
                    <thead>
                        <tr>
                            <th class="th--xs"></th>
                            <th class="th--md" s="">Cuisine</th>
                            <th class="th--xs"></th>
                        </tr>
                    </thead>

                    {{-- tbody --}}
                    <tbody>


                        {{-- loop - cuisines --}}
                        @foreach ($cuisines as $cuisine)
                        <livewire:dashboard.menu.settings.components.settings-view-cuisine :id='$cuisine->id'
                            key='{{ $cuisine->id }}' />
                        @endforeach
                        {{-- end loop --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end viewTable --}}



</div>
{{-- endWrapper --}}