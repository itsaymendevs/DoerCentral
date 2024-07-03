{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>






    {{-- 1: methods --}}

    {{-- :: permission - hasPaymentMethods --}}
    @if ($versionPermission->extraModuleHasFinancePaymentMethods || session('hasTechAccess'))

    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/payment-methods')) active @endif" role="button"
        href="{{ route('dashboard.finance.paymentMethods') }}">Payment Methods</a>



    @endif
    {{-- end if - permission --}}













    {{-- 2: paymentDetails --}}


    {{-- :: permission - hasPaymentDetails --}}
    @if ($versionPermission->extraModuleHasFinancePaymentDetails || session('hasTechAccess'))


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/payment-details')) active @endif" role="button"
        href="{{ route('dashboard.finance.paymentDetails') }}">Payments</a>



    @endif
    {{-- end if - permissions --}}










    {{-- 3: operationCost --}}


    {{-- :: permission - hasFinanceCost --}}
    @if ($versionPermission->extraModuleHasFinanceCosts || session('hasTechAccess'))


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/finance/operation-costs')) active @endif" role="button"
        href="{{ route('dashboard.finance.operationCosts') }}">Costs</a>


    @endif
    {{-- end if - permission --}}






</div>
{{-- endGroup --}}