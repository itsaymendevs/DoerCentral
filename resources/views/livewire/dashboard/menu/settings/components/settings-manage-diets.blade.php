{{-- wrapper --}}
<div>

    {{-- form --}}
    <form wire:submit='store' class="row align-items-end pt-2">

        {{-- cover --}}
        <div class="col-5 text-center">
            <img class="w-100 inventory--image-frame of-cover rounded-1" src="{{ asset('assets/img/Diets/2.jpg') }}" />
        </div>



        {{-- name / desc --}}
        <div class="col-4">
            <label class="form-label form--label">Name</label>
            <input wire:model='instance.name' class="form-control form--input mb-4" type="text" required />

            <label class="form-label form--label">Description</label>
            <textarea wire:model='instance.desc' class="form-control form--input form--textarea" required></textarea>
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
                            <th class="th--xs"></th>
                            <th class="th--md" s="">Diet Type</th>
                            <th class="th--md">Description</th>
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