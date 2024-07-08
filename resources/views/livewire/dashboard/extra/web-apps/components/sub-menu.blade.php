{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: blogs --}}

    {{-- :: permission - hasBlogs --}}
    @if ($versionPermission->extraModuleHasBlogs || session('hasTechAccess'))


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/website/blogs', 'dashboard/extra/website/blogs/*')) active @endif" role="button"
        href="{{ route('dashboard.website.blogs') }}">Blogs</a>



    @endif
    {{-- end if - permission --}}






    {{-- 2: banners --}}


    {{-- :: permission - hasBanners --}}
    @if ($versionPermission->extraModuleHasBanners || session('hasTechAccess'))


    <a class="btn fs-13 disabled" role="button" href="#!">Banners</a>


    @endif
    {{-- end if - permission --}}










    {{-- 3: socials --}}


    {{-- :: permission - hasSocials --}}
    @if ($versionPermission->extraModuleHasSocials || session('hasTechAccess'))


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/settings', 'dashboard/extra/settings/*')) active @endif" role="button"
        href="{{ route('dashboard.website.settings') }}">Settings</a>



    @endif
    {{-- end if - permission --}}






</div>
{{-- endGroup --}}