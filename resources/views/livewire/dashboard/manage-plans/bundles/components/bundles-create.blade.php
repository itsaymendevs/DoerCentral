<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="new-bundle" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">New Bundle</h5>
                    <button class="btn btn--raw-icon w-auto btn--close" data-bs-toggle="tooltip" data-bss-tooltip=""
                        data-bs-placement="right" type="button" data-bs-dismiss="modal" title="Close Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-dash-lg fs-1">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z">
                            </path>
                        </svg>
                    </button>
                </header>
                {{-- endHeader --}}







                {{-- ----------------------------------------- --}}
                {{-- ----------------------------------------- --}}







                {{-- form --}}
                <form wire:submit='store' class="px-4">
                    <div class="row align-items-center row pt-2 mb-4">



                        {{-- name --}}
                        <div class="col-7">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" required
                                wire:model='instance.name' />
                        </div>






                        {{-- group --}}
                        <div class="col-5" wire:ignore>
                            <label class="form-label form--label">Module</label>
                            <div class="select--single-wrapper mb-4" wire:loading.class='no-events-loading'>
                                <select class="form-select form--modal-select form--modal-group-select-1"
                                    data-modal='#new-bundle' data-instance='instance.featureModuleId' required>
                                    <option value=""></option>

                                    @foreach ($featureModules as $featureModule)
                                    <option value="{{ $featureModule?->id }}">{{ $featureModule?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>






                        {{-- ---------------------------------------- --}}
                        {{-- ---------------------------------------- --}}






                        {{-- features --}}
                        <div class="col-12">
                            <div class="table-responsive memoir--table inline--table w-100">
                                <table class="table table-bordered" id="memoir--table">

                                    {{-- headers --}}
                                    <thead>
                                        <tr>
                                            <th class="th--lg"></th>
                                            <th class="th--sm text-center">Include</th>
                                        </tr>
                                    </thead>





                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>


                                        {{-- loop - features --}}
                                        @foreach ($features ?? [] as $key => $feature)



                                        <tr key='single-bundle-feature-{{ $feature?->id }}'>



                                            {{-- feature --}}
                                            <td class="fs-6 fw-semibold">{{ $feature->name }}</td>

                                            {{-- checkbox --}}
                                            <td class="fw-bold">
                                                <div class="form-check form-switch form-check-inline input--switch">
                                                    <input class="form-check-input pointer"
                                                        style='width: 65px; height: 18px'
                                                        id="bundle-feature-checkbox-{{ $feature->id }}" type="checkbox"
                                                        wire:model='instance.features.{{ $feature->id }}'>
                                                    <label class="form-check-label d-none"
                                                        for="bundle-feature-checkbox-{{ $feature->id }}">Label</label>
                                                </div>
                                            </td>

                                        </tr>



                                        @endforeach
                                        {{-- end loop --}}


                                    </tbody>
                                    {{-- end tbody --}}


                                </table>
                            </div>
                        </div>
                        {{-- end Features --}}






                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>Save</button>
                        </div>



                    </div>
                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
    {{-- endBody --}}












    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--modal-group-select-1").on("change", function(event) {



       // 1.1: getValue - instance
       selectValue = $(this).select2('val');
       instance = $(this).attr('data-instance');


       @this.set(instance, selectValue);
       @this.set('instance.features', []);


    }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







</div>
{{-- endModal --}}