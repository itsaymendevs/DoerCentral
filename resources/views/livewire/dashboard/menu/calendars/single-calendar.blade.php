{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 plans-column" data-view="standard" data-instance="1">



                {{-- outerTab --}}
                <div class="tabs--wrap">


                    {{-- outerTab navlinks --}}
                    <ul class="nav nav-tabs inner" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Assign</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Preview</a>
                        </li>
                    </ul>




                    {{-- outerTabContent --}}
                    <div class="tab-content">




                        {{-- 1: assignTab --}}
                        <div class="tab-pane active no--card" role="tabpanel" id="tab-1">



                            {{-- :: calendarMeals - update --}}
                            <livewire:dashboard.menu.calendars.single-calendar.components.single-calendar-edit
                                key='{{ $id }}' :$id />



                        </div>
                        {{-- endTab 1 --}}









                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}









                        {{-- 2: previewTab --}}
                        <div class="tab-pane no--card" role="tabpanel" id="tab-2">



                            {{-- :: calendarMeals - preview --}}
                            <livewire:dashboard.menu.calendars.single-calendar.components.single-calendar-view
                                key='{{ $id }}' :$id />


                        </div>
                        {{-- endTab 2 --}}



                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- endContainer --}}














    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}






    @section('modals')


    {{-- 1: cloneCalendar --}}
    <livewire:dashboard.menu.calendars.single-calendar.components.single-calendar-clone key='clone-calendar-modal'
        id='{{ $id }}' />


    @endsection







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}











</section>
{{-- endSection --}}