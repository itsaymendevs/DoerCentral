{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: payment details --}}


    {{-- :: permission - hasPaymentDetails --}}


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/payment-details')) active @endif" role="button"
        href="{{ route('dashboard.management.users') }}">Payment Details</a>


    {{-- end if - permission --}}






</div>
{{-- endGroup --}}