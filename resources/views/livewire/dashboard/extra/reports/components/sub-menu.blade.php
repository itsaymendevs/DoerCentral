{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: delivery --}}
    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/reports/delivery')) active @endif" role="button"
        href="{{ route('dashboard.reports.delivery') }}">Delivery</a>







</div>
{{-- endGroup --}}