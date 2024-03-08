{{-- contentSection --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.components.sub-menu />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">
            <div class="col-12 plans-column" data-view="standard" data-instance="1">


                {{-- tabWrap --}}
                <div class="tabs--wrap">


                    {{-- navLinks --}}
                    <ul class="nav nav-tabs inner" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">General</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link disabled" data-bs-toggle="tab" href="#tab-2" role="tab">Ingredients</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link disabled" data-bs-toggle="tab" href="#tab-3" role="tab">Packings</a>
                        </li>
                    </ul>
                    {{-- end navLinks --}}







                    {{-- -------------------------------------------- --}}
                    {{-- -------------------------------------------- --}}






                    {{-- tabContetn --}}
                    <div class="tab-content">




                        {{-- 1: generalTab --}}
                        <div class="tab-pane active no--card" id="tab-1" role="tabpanel">

                            <livewire:dashboard.menu.builder.components.builder-create-general />

                        </div>
                        {{-- endTab --}}



                    </div>
                    {{-- end tabContent --}}


                </div>
            </div>
        </div>
        {{-- end tabRow --}}


    </div>
</section>
{{-- end contentSection --}}