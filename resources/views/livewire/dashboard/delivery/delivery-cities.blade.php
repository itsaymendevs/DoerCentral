{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.delivery.components.sub-menu title="Delivery Cities" />








        {{-- ---------------------------------- --}}
        {{-- ---------------------------------- --}}









        {{-- contentRow --}}
        <div class="row align-items-center mb-4">
            <div class="tabs--wrap">



                {{-- innerTab wrapper --}}
                <div>


                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs inner" role="tablist">



                        {{-- loop - cities --}}
                        @foreach ($cities as $city)

                        <li class="nav-item" role="presentation">

                            <a class="nav-link @if ($city->id == 1) active @endif" data-bs-toggle="tab"
                                href="#tab-{{ $city->id }}" role="tab">{{ $city->name }}</a>
                        </li>

                        @endforeach
                        {{-- end loop --}}


                    </ul>
                    {{-- end tabLinks --}}







                    {{-- ---------------------------------------------- --}}
                    {{-- ---------------------------------------------- --}}





                    {{-- innerTab Content --}}
                    <div class="tab-content">



                        {{-- 2.1: loop - cityTiming --}}
                        @foreach ($cities ?? [] as $city)

                        <div class="tab-pane @if ($city->id == 1) active @endif no--card" id="tab-{{ $city->id }}"
                            role="tabpanel">

                            <livewire:dashboard.delivery.delivery-cities.components.delivery-cities-times
                                id='{{ $city->id }}' key='city-times-{{ $city->id }}' />

                        </div>



                        @endforeach
                        {{-- end loop --}}






                    </div>
                    {{-- end tabContent --}}

                </div>
            </div>
        </div>
        {{-- endRow --}}



    </div>
    {{-- endContainer --}}

















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')


    {{-- 1: createTime --}}
    <livewire:dashboard.delivery.delivery-cities.components.delivery-cities-times-create
        key='city-create-times-modal' />

    {{-- 1.2: editTime --}}
    <livewire:dashboard.delivery.delivery-cities.components.delivery-cities-times-edit key='city-edit-times-modal' />



    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}










</section>
{{-- endContent --}}