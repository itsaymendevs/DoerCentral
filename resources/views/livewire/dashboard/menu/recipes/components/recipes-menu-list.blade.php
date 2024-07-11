<div class="modal fade modal--shadow" role="dialog" tabindex="-1" id="menu-list" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-0 px-0">



                {{-- header --}}
                <header class="modal--header px-4">

                    {{-- heading --}}
                    <h5 class="mb-0 fw-bold text-white"></h5>


                    {{-- closeButton --}}
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






                {{-- ----------------------------------- --}}
                {{-- ----------------------------------- --}}






                {{-- form --}}
                <div class="px-4">
                    <div class="row row pt-2 mb-4">




                        {{-- name --}}
                        <div class="col-12">
                            <input class="form-control form--input mb-4 readonly" value='{{ $meal?->name }}' type="text"
                                readonly="">
                        </div>




                        {{-- ------------------------- --}}
                        {{-- ------------------------- --}}



                        {{-- subheading --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <hr style="width: 65%;">
                                <label class="form-label form--label px-3 w-50
                                    justify-content-center mb-0 text-gold fw-semibold fs-15">Menu List</label>
                            </div>
                        </div>






                        {{-- table --}}
                        <div class="col-12">
                            <div class="memoir--table w-100">
                                <table class="table table-bordered" id="memoir--table">



                                    {{-- headers --}}
                                    <thead>
                                        <tr>
                                            <th class="th--xl"></th>
                                            <th class="th--xl">Include</th>
                                        </tr>
                                    </thead>





                                    {{-- ---------------------------- --}}
                                    {{-- ---------------------------- --}}




                                    {{-- tbody --}}
                                    <tbody>


                                        {{-- 1: loop - menus --}}
                                        @foreach ($menus ?? [] as $menu)

                                        <tr>
                                            <td class="fw-bold text-center">
                                                <span class="fs-6 d-block fw-normal text-gold">{{ $menu->name }}</span>
                                            </td>



                                            {{-- switch --}}
                                            <td class="fw-bold text-start ps-3">
                                                <div class="form-check form-switch form-check-inline input--switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        @if($meal?->inMenu($menu->id)) checked @endif
                                                    id="menuList-checkbox-{{ $menu->id }}"
                                                    wire:change="update('{{ $menu->id }}')"
                                                    wire:loading.attr='disabled' >
                                                    <label class="form-check-label d-none"
                                                        for="menuList-checkbox-{{ $menu->id }}">Label</label>
                                                </div>
                                            </td>
                                        </tr>


                                        @endforeach
                                        {{-- end loop --}}



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- endCol --}}




                    </div>
                </div>
                {{-- endWrapper --}}


            </div>
        </div>
    </div>
</div>
{{-- endModal --}}