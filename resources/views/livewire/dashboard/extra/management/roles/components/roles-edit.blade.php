<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="edit-role" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">





                {{-- header --}}
                <header class="modal--header px-4">
                    <h5 class="mb-0 fw-bold text-white">Edit Department</h5>
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







                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}





                {{-- form --}}
                <form wire:submit='update' class="px-4">
                    <div class="row pt-2 mb-4">


                        {{-- name --}}
                        <div class="col-6">
                            <label class="form-label form--label">Name</label>
                            <input class="form-control form--input mb-4" type="text" wire:model='instance.name'
                                required />
                        </div>






                        {{-- permissions --}}
                        <div class="col-12 permissions--wrapper">



                            {{-- subtitle --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <hr style="width: 65%" />
                                <label class="form-label form--label px-3 w-50
                                    justify-content-center mb-0">Permissions</label>
                            </div>





                            {{-- ------------------------------ --}}
                            {{-- ------------------------------ --}}





                            {{-- row --}}
                            <div class="row">





                                {{-- loop - permissionsByGroup --}}
                                @foreach ($permissions->groupBy('group') as $commonGroup => $permissionsByGroup)




                                <div class="col-6">
                                    <div class="table-responsive memoir--table w-100">
                                        <table class="table table-bordered" id="memoir--table">


                                            {{-- headers --}}
                                            <thead>
                                                <tr>
                                                    <th class="th--lg">{{ $commonGroup }}</th>
                                                    <th class="th--xs"></th>
                                                </tr>
                                            </thead>




                                            {{-- ---------------- --}}
                                            {{-- ---------------- --}}



                                            {{-- tbody --}}
                                            <tbody>



                                                {{-- loop - permissions --}}
                                                @foreach ($permissionsByGroup as $permission)


                                                <tr>


                                                    {{-- name --}}
                                                    <td class="fs-6 text-start fw-bold fs-14 ps-3">
                                                        {{ $permission->name }}
                                                    </td>


                                                    {{-- checkBox --}}
                                                    <td class="fw-bold">
                                                        <div
                                                            class="form-check form-switch form-check-inline input--switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                wire:model='instance.permissions.{{ $permission->id }}'
                                                                id="formCheckEdit-{{ $permission->id }}" />
                                                            <label class="form-check-label d-none"
                                                                for="formCheckEdit-{{ $permission->id }}">Label</label>
                                                        </div>
                                                    </td>



                                                </tr>
                                                @endforeach
                                                {{-- end loop - permissions --}}



                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @endforeach
                                {{-- end loop - permissionsByGroup --}}




                            </div>
                        </div>
                        {{-- endPermissions --}}





                        {{-- -------------------------------------- --}}
                        {{-- -------------------------------------- --}}




                        {{-- submitButton --}}
                        <div class="col-12 text-center mt-3">
                            <button
                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05"
                                wire:loading.attr='disabled'>Update</button>
                        </div>
                    </div>
                </form>
                {{-- endForm --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}