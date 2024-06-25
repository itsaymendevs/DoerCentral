{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: payment details --}}
    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/payment-details')) active @endif" role="button"
        href="{{ route('dashboard.finance.paymentDetails') }}">Payments</a>







    {{-- 2: operationCost --}}
    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/operation-costs')) active @endif" role="button"
        href="{{ route('dashboard.finance.operationCosts') }}">Costs</a>





</div>
{{-- endGroup --}}