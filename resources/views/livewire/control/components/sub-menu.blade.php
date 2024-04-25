<div class="row align-items-center mb-submenu">


    {{-- title --}}
    <div class="col-4">
        <h4 class="text-center mb-0 fw-bold">{{ $title }}</h4>
    </div>




    {{-- links --}}
    <div class="col-8 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>





            {{-- general --}}
            <a class="btn disabled" role="button" href="#!">General</a>



            {{-- permissions --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/control/permissions')) active @endif" role="button"
                href="{{ route('dashboard.control.permissions') }}">Permissions</a>



        </div>
    </div>
</div>
{{-- endRow --}}