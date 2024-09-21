<section id="content--section" class="content--section">
    <div class="container">


        {{-- filtersRow --}}
        <div class="row mb-4">




            {{-- 1: counter --}}
            <div class="col-4 text-start d-flex align-items-center justify-content-start">


                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Features">{{ $features?->count() ?? 0
                    }}
                </h3>



            </div>
            {{-- endCol --}}








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}





            {{-- 2: featureFilter --}}
            <div class="col-4">
                <input wire:model.live='searchFeature' class="form-control form--input main-version mx-auto"
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
                <div class="table-responsive memoir--table inline--table w-100 mb-4">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--lg">Feature</th>
                                <th class="th--md">Price</th>
                                <th class="th--md">Module</th>
                                <th class="th--xs">Default
                                    <i class="bi bi-info-circle ms-1 text-black" data-bs-toggle="tooltip"
                                        data-bss-tooltip="" title="Mark as selected in customized-plan builder"></i>
                                </th>
                                <th class="th--xs"></th>
                            </tr>
                        </thead>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- tbody --}}
                        <tbody>



                            {{-- loop - features --}}
                            @foreach ($features ?? [] as $feature)


                            <tr key='single-feature-tr-{{ $feature->id }}'>

                                {{-- name --}}
                                <td class="fw-bold text-center fs-14">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold fs-14">{{ $feature?->name }}</td>

                                {{-- price --}}
                                <td class="fs-5 fw-semibold">{{ number_format($feature?->price ?? 0, 2) }}<small
                                        class="ms-1 fw-semibold text-gold fs-10">($)</small></td>


                                {{-- module --}}
                                <td class='text-warning fs-14'>{{ $feature?->module?->name }}</td>




                                {{-- ---------------------------------- --}}
                                {{-- ---------------------------------- --}}





                                {{-- isDefaults --}}
                                <td class="fw-bold">
                                    <div
                                        class="form-check form-switch form-check-inline input--switch justify-content-start">
                                        <input class="form-check-input pointer" style='width: 55px; height: 18px'
                                            id="feature-checkbox-default-{{ $feature->id }}" type="checkbox"
                                            wire:loading.attr='disabled' @if($feature?->isDefault) checked @endif
                                        wire:change="toggleDefault('{{ $feature->id }}')">
                                        <label class="form-check-label d-none"
                                            for="feature-checkbox-default-{{ $feature->id }}">Label</label>
                                    </div>
                                </td>






                                {{-- actions --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">

                                        {{-- 1: edit --}}
                                        <button class="btn btn--raw-icon inline scale--3" type="button"
                                            wire:click="edit('{{ $feature?->id }}')" data-bs-toggle="modal"
                                            data-bs-target="#edit-feature">
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
    <livewire:central.dashboard.manage-plans.features.components.features-edit key='edit-feature-modal' />




    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}