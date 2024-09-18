{{-- wrapper --}}
<div>


    {{-- form --}}
    <form class="row align-items-end pt-2" wire:submit='store'>




        {{-- cover --}}
        <div class="col-5 text-center">
            <img class="w-100 inventory--image-frame of-cover" src="{{ url('assets/img/Allergies/allergy.jpg') }}"
                style="height: 150px" />
        </div>



        {{-- name --}}
        <div class="col-4">
            <label class="form-label form--label">Conversion Name</label>
            <input class="form-control form--input mb-0" type="text" wire:model='instance.name' required />

        </div>


        <div class="col-3 text-end">
            <button
                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                wire:loading.attr='disabled'>
                Save
            </button>
        </div>



    </form>
    {{-- endForm --}}








    {{-- ------------------------------------------------- --}}
    {{-- ------------------------------------------------- --}}







    {{-- row --}}
    <div class="row align-items-end pt-2">


        {{-- tableView --}}
        <div class="col-12 mt-5" data-view="table">
            <div class="table-responsive memoir--table w-100">
                <table class="table table-bordered" id="memoir--table">


                    {{-- thead --}}
                    <thead>
                        <tr>
                            <th class="th--xs"></th>
                            <th class="th--md">Conversion</th>
                            <th class="th--md"></th>
                        </tr>
                    </thead>





                    {{-- --------------------- --}}
                    {{-- --------------------- --}}





                    {{-- tbody --}}
                    <tbody>


                        {{-- loop - conversions --}}
                        @foreach ($conversions ?? [] as $conversion)


                        <livewire:central.dashboard.inventory.settings.components.settings-conversions-edit
                            key='conversions-edit-{{ $conversion->id }}' id='{{ $conversion->id }}' />


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
{{-- endWrapper --}}
