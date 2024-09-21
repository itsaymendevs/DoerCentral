<section id="content--section" class="content--section">
    <div class="container">


        {{-- filtersRow --}}
        <div class="row mb-4">




            {{-- 1: counter --}}
            <div class="col-4 text-start d-flex align-items-center justify-content-start">


                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Modules">{{ $modules?->count() ?? 0
                    }}</h3>



            </div>
            {{-- endCol --}}








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}





            {{-- 2: moduleFilter --}}
            <div class="col-4">
                <input wire:model.live='searchModule' class="form-control form--input main-version mx-auto"
                    type="search" placeholder="Search by Name" />
            </div>









            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}









            {{-- sub-menu --}}
            <div class="text-end col-4">
                <livewire:central.dashboard.manage-plans.components.sub-menu key='submenu' />
            </div>




        </div>
        {{-- endRow --}}










        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-4">




            {{-- 1: tableView --}}
            <div class="col-12 stock-column mt-4" data-view="table" wire:ignore.self>



                {{-- table --}}
                <div class="table-responsive memoir--table inline--table vertical w-100 mb-4">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">Module</th>
                                <th class="th--md">Short Brief</th>
                                <th class="th--lg">Features</th>
                                <th class="th--xs"></th>
                            </tr>
                        </thead>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- tbody --}}
                        <tbody>



                            {{-- loop - modules --}}
                            @foreach ($modules ?? [] as $module)


                            <tr key='single-module-tr-{{ $module->id }}'>

                                {{-- name --}}
                                <td class="fw-bold text-center fs-14">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold fs-14 text-warning">{{ $module?->name }}</td>

                                <td class="fs-14">{{ $module?->desc ?? '' }}</td>


                                {{-- features --}}
                                <td class='text-warning fs-14'>
                                    @foreach ($module?->features ?? [] as $moduleFeature)
                                    <span class='table--bundle-feature'>{{ $moduleFeature?->name }}</span>
                                    @endforeach
                                </td>





                                {{-- ---------------------------------- --}}
                                {{-- ---------------------------------- --}}





                                {{-- actions --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">

                                        {{-- 1: edit --}}
                                        <button class="btn btn--raw-icon inline scale--3" type="button"
                                            wire:click="edit('{{ $module?->id }}')" data-bs-toggle="modal"
                                            data-bs-target="#edit-module">
                                            <i class='bi bi-pencil'></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            {{-- end loop --}}



                        </tbody>
                    </table>
                </div>
                {{-- endRow --}}





            </div>
            {{-- endCol - tableView --}}





        </div>
    </div>
    {{-- endContainer --}}

















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}








    @section('modals')




    {{-- 1: edit --}}
    <livewire:central.dashboard.manage-plans.modules.components.modules-edit key='edit-module-modal' />




    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}