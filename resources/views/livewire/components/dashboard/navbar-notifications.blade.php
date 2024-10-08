{{-- notificationCol --}}
<div class="col-1 text-center " data-aos="fade-left" data-aos-duration="800" data-aos-once="true" style="z-index:10"
    wire:ignore.self>



    {{-- dropMenu --}}
    <div class="dropstart">


        {{-- bellButton --}}
        <button class="btn btn--raw-icon navbar--notify @if ($unPreviewedCount > 0) active @endif
            @if ($notifications->count() == 0) disabled @endif" aria-expanded="false" data-bs-toggle="dropdown"
            type="button" wire:click='markAsPreviewed'>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                class="bi bi-bell">
                <path
                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z">
                </path>
            </svg>
        </button>






        {{-- notificationMenu --}}
        <div class="dropdown-menu notification--menu py-0" wire:ignore.self>




            {{-- loop - notification --}}
            @foreach ($notifications as $notification)



            <a class="dropdown-item scale--3 @if ($notification->isPreviewed == 0) active @endif"
                href="{{ route($notification->routeLink, [$notification->routePayload]) }}"
                key='notification-{{ $notification->id }}'>



                {{-- title --}}
                <p class="fs-6 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        viewBox="0 0 16 16" class="bi bi-info-circle fs-4 me-3">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                        </path>
                    </svg>{{ $notification->title }}
                </p>




                {{-- content --}}
                <p class="mb-0 fs-14 d-block fw-normal">{{ $notification->content }}</p>



            </a>
            @endforeach
            {{-- end loop --}}




        </div>
    </div>
    {{-- end notificationMenu --}}






</div>
{{-- endCol --}}