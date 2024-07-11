{{-- sub-menu --}}
<div class="btn-group submenu--group" role="group">


    {{-- 1: loop - menus --}}
    @foreach ($menus ?? [] as $menu)

    <a wire:navigate class="btn fs-13 @if (Request::is('dashboard/menu/lists/' . $menu->nameURL)) active @endif"
        href="{{ route('dashboard.menuLists', [$menu->nameURL]) }}" role="button">{{ $menu->name }}</a>

    @endforeach
    {{-- end loop --}}


</div>
{{-- end div --}}