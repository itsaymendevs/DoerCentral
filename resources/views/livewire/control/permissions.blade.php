<section id="content--section " class="content--section ">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:control.components.sub-menu title='Version Permissions' key='submenu' />








        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}






        {{-- contentRow --}}
        <div class="permissions--wrapper ">
            <div class="row pt-2 align-items-start mb-5">



                {{-- leftCol --}}
                <div class="col-4 mb-4" data-view="table">




                    {{-- 1: generalTable --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">

                            {{-- thead --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-4"></th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>





                            {{-- ---------------------- --}}
                            {{-- ---------------------- --}}



                            {{-- tbody --}}
                            <tbody>




                                {{-- :: loop - general --}}
                                @foreach ($generalPermissions ?? [] as $key => $generalPermission)
                                <tr>



                                    {{-- title --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">{{ $displayTitles[$key] }}</td>

                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($generalPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>



                                </tr>
                                @endforeach
                                {{-- end loop --}}



                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}









                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}









                    {{-- 1.5: dashboard --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- thead--}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">Dashboard</th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>




                            {{-- ---------------------- --}}
                            {{-- ---------------------- --}}






                            {{-- tbody --}}
                            <tbody>


                                {{-- loop - dashboard --}}
                                @foreach ($dashboardPermissions ?? [] as $key => $dashboardPermission)
                                <tr>




                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>


                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($dashboardPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>




                                </tr>
                                @endforeach
                                {{-- end loop --}}



                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}











                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}









                    {{-- 2: calendar - settings --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- headers --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">Calendar &amp; Setting</th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>




                            {{-- ------------------------ --}}
                            {{-- ------------------------ --}}




                            {{-- tbody --}}
                            <tbody>



                                {{-- :: loop - calendarSetting --}}
                                @foreach ($calendarSettingPermissions ?? [] as $key =>
                                $calendarSettingPermission)
                                <tr>




                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>


                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox"
                                                @if($calendarSettingPermission) checked @endif
                                                id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>




                                </tr>
                                @endforeach
                                {{-- end loop --}}



                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}








                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}







                    {{-- 3: kitchen --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- headers --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">Kitchen</th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>






                            {{-- ------------------------ --}}
                            {{-- ------------------------ --}}




                            {{-- tbody --}}
                            <tbody>




                                {{-- :: loop - kitchen --}}
                                @foreach ($kitchenPermissions ?? [] as $key => $kitchenPermission)
                                <tr>



                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>




                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($kitchenPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>



                                </tr>
                                @endforeach
                                {{-- end loop --}}


                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}









                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}








                    {{-- 4: inventory - delivery --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- thead --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">
                                        Inventory &amp; Delivery
                                    </th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>





                            {{-- ------------------------- --}}
                            {{-- ------------------------- --}}





                            {{-- tbody --}}
                            <tbody>




                                {{-- :: loop - inventory --}}
                                @foreach ($inventoryPermissions ?? [] as $key => $inventoryPermission)
                                <tr>



                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>


                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($inventoryPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>



                                </tr>
                                @endforeach
                                {{-- end loop --}}


                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- end leftCol --}}







                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}







                {{-- :: midCol --}}
                <div class="col-4 mb-4" data-view="table">






                    {{-- 5: customers --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- thead--}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">Customer</th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>




                            {{-- ---------------------- --}}
                            {{-- ---------------------- --}}






                            {{-- tbody --}}
                            <tbody>


                                {{-- loop - customer --}}
                                @foreach ($customerPermissions ?? [] as $key => $customerPermission)
                                <tr>




                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>


                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($customerPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>




                                </tr>
                                @endforeach
                                {{-- end loop --}}



                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}








                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}







                    {{-- 6: sales --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- headers --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">
                                        Sales &amp; Marketing
                                    </th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>



                            {{-- -------------------------- --}}
                            {{-- -------------------------- --}}





                            {{-- tbody --}}
                            <tbody>



                                {{-- :: loop - sales --}}
                                @foreach ($salesPermissions ?? [] as $key => $salesPermission)
                                <tr>



                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>




                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($salesPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
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







                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}
                {{-- ---------------------------------------------- --}}






                {{-- 7: plan - builder --}}
                <div class="col-4 mb-4" data-view="table">
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">


                            {{-- headers --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">
                                        Plan &amp; Builder
                                    </th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>



                            {{-- ----------------------- --}}
                            {{-- ----------------------- --}}






                            {{-- tbody --}}
                            <tbody>



                                {{-- loop - planAndBuilder --}}
                                @foreach ($planBuilderPermissions ?? [] as $key => $planBuilderPermission)
                                <tr>




                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>




                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($planBuilderPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>



                                </tr>
                                @endforeach
                                {{-- end loop --}}



                            </tbody>
                        </table>
                    </div>
                    {{-- endCol --}}






                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}






                    {{-- 8: extra --}}
                    <div class="table-responsive memoir--table w-100">
                        <table class="table table-bordered" id="memoir--table">

                            {{-- headers --}}
                            <thead>
                                <tr>
                                    <th class="text-start th--sm ps-3">Extra</th>
                                    <th class="th--xs">Enabled</th>
                                </tr>
                            </thead>



                            {{-- ---------------------- --}}
                            {{-- ---------------------- --}}




                            {{-- tbody --}}
                            <tbody>




                                {{-- :: loop - extra --}}
                                @foreach ($extraPermissions ?? [] as $key => $extraPermission)
                                <tr>



                                    {{-- name --}}
                                    <td class="text-start fw-semibold ps-3 fs-14">
                                        {{ $displayTitles[$key] }}
                                    </td>




                                    {{-- toggleBox --}}
                                    <td class="fw-bold">
                                        <div class="form-check form-switch form-check-inline input--switch">
                                            <input class="form-check-input" type="checkbox" @if($extraPermission)
                                                checked @endif id="formCheck-{{ $globalSNCounter++ }}"
                                                wire:change="update('{{ $key }}')" wire:loading.attr='disabled'
                                                wire:target='update' />
                                            <label class="form-check-label d-none" for="formCheck-1">Label</label>
                                        </div>
                                    </td>


                                </tr>
                                @endforeach
                                {{-- end loop --}}


                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- end rightCol --}}



            </div>
        </div>
        {{-- endRow --}}




</section>
{{-- endSection --}}