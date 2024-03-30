<div class="row align-items-center mb-submenu">


    {{-- title --}}
    <div class="col-3">
        <h4 class="text-center mb-0 fw-bold">{{ $title }}</h4>
    </div>




    {{-- links --}}
    <div class="col-9 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>


            {{-- labels --}}
            <a wire:navigate href="{{ route('dashboard.kitchenLabels') }}" class="btn
                @if (Request::is('dashboard/kitchen/labels', 'dashboard/kitchen/labels/*')) active @endif"
                role="button">Labels</a>


            {{-- containers --}}
            <a wire:navigate class="btn
                @if (Request::is('dashboard/kitchen/containers')) active @endif" role="button"
                href="{{ route('dashboard.kitchenContainers') }}">Containers</a>




            {{-- kitchen --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/kitchen/today/*')) active @endif" role="button"
                href="{{ route('dashboard.kitchenTodayProduction') }}">Kitchen</a>




            {{-- label --}}
            <a class="btn" role="button" href="javascript:void(0);">Today Labels</a>




            {{-- sync --}}
            <a class="btn" role="button" href="javascript:void(0);">Sync Customers</a>



            {{-- settings --}}
            <a class="btn" role="button" href="javascript:void(0);">Setting</a>


        </div>
    </div>
</div>
{{-- endRow --}}