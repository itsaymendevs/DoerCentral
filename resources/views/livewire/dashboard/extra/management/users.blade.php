{{-- mainSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- topRow --}}
        <div class="row align-items-center">


            {{-- newButton --}}
            <div class="col-4">
                <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                    type="button" data-bs-target="#new-user" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-plus-circle-dotted fs-5 me-2">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New User
                </button>
            </div>




            {{-- search --}}
            <div class="col-4 text-center">
                <input type="text" class="form--input" placeholder="Search for Users" wire:model.live='searchUser' />
            </div>






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
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">




                    {{-- loop - users --}}
                    @foreach ($users as $user)

                    <div class="col-4 col-xl-3" key='user-{{ $user->id }}'>
                        <div class="overview--card client-version scale--self-05 mb-floating">
                            <div class="row">


                                {{-- imageFile --}}
                                <div class="col-12 text-center position-relative">
                                    <img class="client--card-logo of-cover"
                                        src="{{ asset('storage/extra/management/users/' . ($user?->imageFile ?? $defaultUser)) }}" />
                                </div>





                                {{-- ----------------------- --}}
                                {{-- ----------------------- --}}






                                {{-- midCol --}}
                                <div class="col-12 text-center">



                                    {{-- name --}}
                                    <h6 class="text-center fw-bold mt-3 mb-2 truncate-text-1l">{{ $user->name }}</h6>


                                    {{-- wrapper --}}
                                    <div class="d-flex flex-column justify-content-around">



                                        {{-- isActive --}}
                                        <p class="text-center fs-13 fw-bold text-danger mb-3">


                                            {{-- A: isActive --}}
                                            @if ($user->isActive)



                                            <span class="fw-bold badge badge--scheme-3 fs-11 py-1 px-3">Active</span>



                                            {{-- B: notActive --}}
                                            @else


                                            <span class="fw-bold badge badge--remove fs-11 py-1 px-3">Inactive</span>


                                            @endif
                                            {{-- end if --}}

                                        </p>











                                        {{-- role --}}
                                        <p class="text-center fs-13 fw-bold text-danger mb-0">
                                            <button
                                                class="btn btn--raw-icon fs-14 text-warning d-inline-flex align-items-center justify-content-center scale--3 w-auto fw-semibold"
                                                data-bs-toggle="tooltip" data-bs-html='true' data-bss-tooltip=""
                                                type="button"
                                                title="{{ implode('<br />', $user->role->permissionsInArray()) }}">{{
                                                $user->role->name }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16"
                                                    class="bi bi-list-nested fs-6 ms-2" style="fill: var(--bs-warning)">
                                                    <path fill-rule="evenodd"
                                                        d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </p>





                                        {{-- ----------------------------- --}}
                                        {{-- ----------------------------- --}}






                                    </div>
                                </div>
                                {{-- endCol --}}









                                {{-- actions --}}
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">


                                        {{-- 1: edit --}}
                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" data-bs-toggle='modal' data-bs-target='#edit-user'
                                            wire:click='edit({{ $user->id }})' wire:loading.attr='disabled'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil fs-5">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                                </path>
                                            </svg>
                                        </button>






                                        {{-- ------------------------------ --}}





                                        {{-- A: disable --}}
                                        @if ($user->isActive)


                                        <button class="btn btn--scheme btn--remove fs-12 px-3 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='toggle({{ $user->id }})'
                                            wire:loading.attr='disabled'>Disable</button>


                                        {{-- B: enable --}}
                                        @else

                                        <button
                                            class="btn btn--scheme btn--scheme-2 fs-12 px-3 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='toggle({{ $user->id }})'
                                            wire:loading.attr='disabled'>Enable</button>

                                        @endif
                                        {{-- end if --}}






                                        {{-- ------------------------------ --}}




                                        {{-- remove --}}
                                        @if (session('userId') != $user->id)

                                        <button class="btn btn--scheme btn--remove fs-12 px-2 mx-2 scale--self-05 h-32"
                                            type="button" wire:click='remove({{ $user->id }})'
                                            wire:loading.attr='disabled'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash fs-5">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                        </button>


                                        @endif
                                        {{-- end if --}}


                                    </div>
                                </div>
                                {{-- endActions --}}



                            </div>
                        </div>
                    </div>


                    @endforeach
                    {{-- end loop --}}



                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}




















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    @section('modals')




    {{-- 1: createUser --}}
    <livewire:dashboard.extra.management.users.components.users-create key='create-user-modal' />




    {{-- 2: editUser --}}
    <livewire:dashboard.extra.management.users.components.users-edit key='edit-user-modal' />




    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}














</section>
{{-- endSection --}}