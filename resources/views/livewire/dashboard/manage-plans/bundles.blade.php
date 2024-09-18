<section id="content--section" class="content--section">
    <div class="container">


        {{-- filtersRow --}}
        <div class="row mb-4">



            <div class="col-4 d-flex align-items-center">
                <button class="btn btn--scheme btn--scheme-2  px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    type="button" data-bs-target="#new-bundle" data-bs-toggle="modal">
                    <i class='bi bi-plus-circle-dotted fs-5 me-2'></i>New Bundle
                </button>




                {{-- ----------------------------- --}}
                {{-- ----------------------------- --}}



                {{-- counter --}}
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 ms-3 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Bundles">
                    {{ $bundles?->count() ?? 0 }}
                </h3>


            </div>








            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}







            {{-- 2: featureFilter --}}
            <div class="col-4">
                <input wire:model.live='searchBundle' class="form-control form--input main-version mx-auto"
                    type="search" placeholder="Search by Name" />
            </div>





            {{-- ---------------------------- --}}
            {{-- ---------------------------- --}}









            {{-- sub-menu --}}
            <div class="text-end col-4">
                <livewire:dashboard.manage-plans.components.sub-menu key='submenu' />
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
                <div class="table-responsive memoir--table  inline--table w-100 mb-4">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- tableHead --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--lg">Bundle</th>
                                <th class="th--lg">Features</th>
                                <th class="th--xs"></th>
                            </tr>
                        </thead>






                        {{-- ------------------------------ --}}
                        {{-- ------------------------------ --}}







                        {{-- tbody --}}
                        <tbody>



                            {{-- loop - bundles --}}
                            @foreach ($bundles ?? [] as $bundle)


                            <tr>
                                <td class="fw-bold text-center fs-14">{{ $globalSNCounter++ }}</td>
                                <td class="fw-bold fs-14">{{ $bundle?->name }}</td>
                                <td class='text-warning fs-14'>
                                    @foreach ($bundle?->features ?? [] as $bundleFeature)
                                    <span class='table--bundle-feature'>{{ $bundleFeature?->feature?->name }}</span>
                                    @endforeach
                                </td>



                                {{-- actions --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">

                                        {{-- 1: edit --}}
                                        <button class="btn btn--raw-icon inline scale--3" type="button"
                                            wire:click="edit('{{ $bundle?->id }}')" data-bs-toggle="modal"
                                            data-bs-target="#edit-bundle">
                                            <i class='bi bi-pencil'></i>
                                        </button>




                                        {{-- remove --}}
                                        <button class="btn btn--raw-icon remove inline scale--3" type="button"
                                            wire:click="remove('{{ $bundle->id }}')" wire:loading.attr='disabled'
                                            wire:target='remove'>
                                            <i class='bi bi-trash'></i>
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



    {{-- 1: create --}}
    <livewire:dashboard.manage-plans.bundles.components.bundles-create key='create-bundle-modal' />


    {{-- 2: edit --}}
    <livewire:dashboard.manage-plans.bundles.components.bundles-edit key='edit-bundle-modal' />


    @endsection






    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}







</section>
{{-- endSection --}}