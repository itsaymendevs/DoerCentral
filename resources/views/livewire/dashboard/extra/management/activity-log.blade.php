{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-center">


            {{-- empty --}}
            <div class="col-4"></div>




            {{-- search --}}
            <div class="col-4 text-center">
                <input type="text" class="form--input" placeholder="Search for User" wire:model.live='searchUser' />
            </div>






            {{-- sub-menu --}}
            <div class="col-4 text-end">


                <livewire:dashboard.extra.management.components.sub-menu />


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
                                <td class="fs-13">{{ date('d / m / Y - h:i:s A', strtotime($log->dateTime)) }}</td>



                            </tr>
                            @endforeach
                            {{-- end loop - logs --}}




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}










</section>
{{-- endSection --}}