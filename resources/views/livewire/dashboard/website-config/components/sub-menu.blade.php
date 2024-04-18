{{-- group --}}
<div class="btn-group submenu--group" role="group" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
    data-aos-once="true" wire:ignore.self>



    {{-- 1: blogs --}}
    <a wire:navigate class="btn fs-13
    @if (Request::is('dashboard/website-config/blogs', 'dashboard/website-config/blogs/*')) active @endif"
        role="button" href="{{ route('dashboard.blogs') }}">Blogs</a>


    {{-- 2: banners --}}
    <a class="btn fs-13 disabled" role="button" href="#!">Banners</a>


</div>
{{-- endGroup --}}