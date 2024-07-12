{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">



        {{-- topRow --}}
        <div class="row align-items-center">


            {{-- empty --}}
            <div class="col-3" wire:ignore>
                <div class="select--single-wrapper" wire:loading.class='no-events'>
                    <select class="form-select form--select" data-instance='searchUser' data-clear='true'
                        data-placeholder='Select User'>
                        <option value=""></option>

                        @foreach ($users ?? [] as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>






            {{-- search --}}
            <div class="col-3 text-center">
                <input type="text" class="form--input" placeholder="Search for Description"
                    wire:model.live='searchDescription' />
            </div>







            {{-- ----------------------------------- --}}
            {{-- ----------------------------------- --}}





            {{-- actions --}}
            <div class="col-2">


                {{-- :: permission - hasPrintExcel --}}
                @if ($versionPermission->kitchenModuleHasPrintExcel || session('hasTechAccess'))




                {{-- 1: exportExcel --}}
                <button wire:click='export' wire:loading.class='disabled'
                    class="btn btn--scheme btn--scheme-outline-1 align-items-center d-inline-flex px-3 fs-13 justify-content-center fw-semibold ms-2"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-file-text fs-6 me-2">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                        </path>
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                        </path>
                    </svg>Excel
                </button>



                @endif
                {{-- end if - permission --}}




            </div>
            {{-- endCol --}}








            {{-- sub-menu --}}
            <div class="col-4 text-end">
                <livewire:dashboard.extra.management.components.sub-menu key='submenu' />
            </div>


        </div>
        {{-- end topRow --}}








        {{-- ---------------------------------------------- --}}
        {{-- ---------------------------------------------- --}}








        {{-- mainRow --}}
        <div class="row pt-2 align-items-center mb-5">



            <div class="col-12 mt-4 pt-4">
                <div id="print--table" class="memoir--table w-100">
                    <table class="table table-bordered" id="memoir--table">


                        {{-- header --}}
                        <thead>
                            <tr>
                                <th class="th--xs"></th>
                                <th class="th--md">User</th>
                                <th class="th--md">Module</th>
                                <th class="th--lg">Description</th>
                                <th class="th--md">DateTime</th>
                            </tr>
                        </thead>



                        {{-- ------------------------ --}}
                        {{-- ------------------------ --}}






                        {{-- tbody --}}
                        <tbody>




                            {{-- loop - logs --}}
                            @foreach ($logs ?? [] as $log)

                            <tr key='log-{{ $log->id }}'>


                                {{-- 1: counter --}}
                                <td class="fw-bold text-start">
                                    <span class="fs-6 text-center d-block fw-bold">{{ $globalSNCounter++ }}</span>
                                </td>



                                {{-- 2: name --}}
                                <td class="text-center fw-bold">
                                    <a class="init-link" href='javascript:void(0);'>
                                        <span class="d-block fs-15 fw-semibold text-gold">
                                            {{ $log?->user?->name ?? $log?->name }}</span>
                                    </a>
                                </td>




                                {{-- 3: module - description --}}
                                <td class="text-center fw-bold">
                                    <span class="d-block fs-15 fw-semibold text-gold">{{ $log->module }}</span>
                                </td>
                                <td class="text-start ps-3 fs-13">{{ $log->description }}</td>




                                {{-- dateTime --}}
                                <td class="fs-13">{{ date('d / m / Y - h:i:s', strtotime($log->dateTime)) }}</td>



                            </tr>
                            @endforeach
                            {{-- end loop - logs --}}




                        </tbody>
                    </table>
                </div>
            </div>
            {{-- endCol --}}







            {{-- ---------------------- --}}
            {{-- ---------------------- --}}






            {{-- pagination --}}
            <div class="col-12 mt-3">
                {{ $logs->links() }}
            </div>





        </div>
    </div>
    {{-- endContainer --}}


















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- selectHandle --}}
    <script>
        $(".form--select").on("change", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');


         @this.set(instance, selectValue);


      }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








</section>
{{-- endSection --}}