<div class="row align-items-center mb-submenu">





    {{-- leftLinks --}}
    <div class="col-4 ">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>





            {{-- :: permission - hasItemsTab --}}
            @if ($versionPermission->kitchenModuleHasItemsTab)



            {{-- items --}}
            <a wire:navigate class="btn
                    @if (Request::is('dashboard/kitchen/items')) active @endif" role="button"
                href="{{ route('dashboard.kitchenItems') }}">Items</a>



            @endif
            {{-- end if - permission --}}





        </div>
    </div>
    {{-- endLeftLinks --}}








    {{-- ----------------------------------- --}}
    {{-- ----------------------------------- --}}








    {{-- title --}}
    <div class="col-4">
        <h4 class="text-center mb-0 fw-bold">{{ $title }}</h4>
    </div>








    {{-- ----------------------------------- --}}
    {{-- ----------------------------------- --}}







    {{-- rightLinks --}}
    <div class="col-4 text-end">
        <div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600"
            data-aos-delay="800" data-aos-once="true" wire:ignore.self>



            {{-- kitchen --}}
            <a wire:navigate class="btn
            @if (Request::is('dashboard/kitchen/today/*')) active @endif" role="button"
                href="{{ route('dashboard.kitchenTodayProduction') }}">Kitchen</a>




            {{-- label --}}
            <a class="btn @if (Request::is('dashboard/kitchen/today/labels')) active @endif" role="button"
                href="{{ route('dashboard.kitchenTodayLabel') }}">Today Labels</a>




            {{-- settings --}}
            @if (!$versionPermission->isProcessing)
            <a class="btn" role="button" href="#!">Setting</a>
            @endif

        </div>
    </div>
    {{-- end rightLinks --}}





</div>
{{-- endRow --}}