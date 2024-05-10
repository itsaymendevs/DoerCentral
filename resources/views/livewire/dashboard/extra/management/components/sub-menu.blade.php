{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: users --}}
    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/management/users', 'dashboard/extra/management/users/*')) active @endif"
        role="button" href="{{ route('dashboard.management.users') }}">Users</a>








    {{-- 2: departments --}}


    {{-- :: permission - hasDepartments --}}
    @if ($versionPermission->extraModuleHasDepartments)


    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/extra/management/departments')) active @endif"
        role="button" href="{{ route('dashboard.management.roles') }}" role=" button">Departments</a>


    @endif
    {{-- end if - permission --}}







    {{-- activityLog --}}


    {{-- :: permission - hasDepartments --}}
    @if ($versionPermission->extraModuleHasActivityLog)


    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/extra/management/activity')) active @endif"
        role="button" href="{{ route('dashboard.management.activity') }}" role=" button">Activity Log</a>



    @endif
    {{-- end if - permission --}}




</div>
{{-- endGroup --}}