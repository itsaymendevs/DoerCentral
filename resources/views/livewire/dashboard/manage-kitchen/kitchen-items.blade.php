<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.manage-kitchen.components.sub-menu title='Manage Items' key='kitchen-submenu' />








        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}







        {{-- contentRow --}}
        <div class="row pt-2 align-items-center mb-5">
            <div class="col-12 mt-zone-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">




                    {{-- loop - containers --}}
                    @foreach ($containers as $container)

                    <div class="col-4 col-xl-3 col-xxl-3" key='{{ $container->id }}'>
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo rounded-0"
                                        src="{{ asset('storage/kitchen/containers/' . $container->imageFile) }}" />
                                </div>



                                {{-- midCol --}}
                                <div class="col-12">




                                    {{-- actions --}}
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-2">



                                        {{-- edit --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-outline-3 fs-12 px-2 mx-2 h-32 disabled"
                                            type="button"><svg class="bi bi-pencil fs-5"
                                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>




                                        {{-- remove --}}
                                        <button class="btn btn--scheme btn--remove-outline fs-12 px-2 mx-2 h-32"
                                            type="button" wire:click="remove('{{ $container->id }}')"
                                            wire:loading.attr='disabled' wire:target='remove, updateCharge'>
                                            <svg class="bi bi-trash fs-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                        </button>


                                    </div>
                                    {{-- endActions --}}






                                    {{-- name --}}
                                    <h5 class="text-center fw-bold mt-2 mb-2
                                    truncate-text-2l px-2 h-48">{{ $container->name }}</h5>


                                </div>
                                {{-- end midCol --}}





                                {{-- ----------------------------------- --}}
                                {{-- ----------------------------------- --}}






                                {{-- cost --}}
                                <div class="col-6 pe-1">
                                    <div class="input--with-label mt-2">
                                        <label class="form-label form--label mb-0" style="width: 55%">Cost</label>
                                        <input type="number" class="form--input" step="0.01" required
                                            value='{{ $container->charge }}' min='0'
                                            wire:change="updateCharge({{ $container->id }}, $event.target.value)"
                                            wire:loading.attr='readonly' />
                                    </div>
                                </div>
                                {{-- endCol --}}





                                {{-- lid --}}
                                <div class="col-6 ps-1">
                                    <div class="input--with-label mt-2">
                                        <label class="form-label form--label mb-0" style="width: 55%">Lid</label>
                                        <input type="number" class="form--input" step="0.01" required
                                            value='{{ $container->lidCharge }}' min='0'
                                            wire:change="updateLid({{ $container->id }}, $event.target.value)"
                                            wire:loading.attr='readonly' />
                                    </div>
                                </div>
                                {{-- endCol --}}



                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
        </div>
        {{-- endRow --}}











</section>
{{-- endSection --}}