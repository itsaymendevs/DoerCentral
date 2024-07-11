{{-- contentSection --}}
<section class="content--section" id="content--section">





    {{-- subMenu --}}
    <div class="container">

        <livewire:dashboard.menu.components.sub-menu key='submenu' />

    </div>





    {{-- ----------------------------------------- --}}
    {{-- ----------------------------------------- --}}








    {{-- contentContainer --}}
    <div class="container-fluid">


        {{-- 1: general --}}
        <div class="row pt-2 align-items-center mb-5">
            <div class="col-12 plans-column" data-view="standard" data-instance="1">


                {{-- header --}}
                <div class="builder--header">
                    <h4 class='mb-0 fs-5'>General Informations</h4>
                </div>


                <livewire:dashboard.menu.builder.components.builder-create-general key='meal-general-informations' />


            </div>
        </div>
        {{-- end tabRow --}}




    </div>
</section>
{{-- end contentSection --}}