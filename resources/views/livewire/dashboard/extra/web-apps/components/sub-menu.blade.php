{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>




    {{-- 1: blogs --}}

    {{-- :: permission - hasBlogs --}}
    @if ($versionPermission->extraModuleHasBlogs || session('hasTechAccess'))


    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/extra/blogs', 'dashboard/extra/blogs/*')) active @endif" role="button"
        href="{{ route('dashboard.blogs') }}">Blogs</a>



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
    @if (Request::is('dashboard/extra/socials', 'dashboard/extra/socials/*')) active @endif" role="button"
        href="{{ route('dashboard.socials') }}">Social Links</a>



    @endif
    {{-- end if - permission --}}






</div>
{{-- endGroup --}}