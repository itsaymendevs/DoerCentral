{{-- contentSection --}}
<section id="content--section" class="content--section">
    <div class="container">




        {{-- :: SubMenu --}}
        <livewire:dashboard.menu.plans.manage.components.sub-menu :$id />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}





        {{-- mainRow --}}
        <div class="row row mt-4 align-items-center mb-5">
            <div class="col-12">



                {{-- bundlesTab --}}
                <div class="tabs--wrap">


                    {{-- navLinks --}}
                    <ul class="nav nav-tabs mb-4" role="tablist">


                        {{-- loop - bundles --}}
                        @foreach ($bundles as $bundle)

                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if ($bundles->first()->id == $bundle->id) active @endif" role="tab"
                                data-bs-toggle="tab" href="#tab-bundles-{{ $bundle->id }}">
                                {{ $bundle->name }}
                            </a>
                        </li>

                        @endforeach
                        {{-- end loop --}}

                    </ul>
                    {{-- end navLinks --}}







                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}











                    {{-- tabContent --}}
                    <div class="tab-content">



                        {{-- loop - bundles --}}
                        @foreach ($bundles as $bundle)




                        {{-- rangesTab --}}
                        <div class="tab-pane fade show @if ($bundles->first()->id == $bundle->id) active @endif no--card"
                            role="tabpanel" id="tab-bundles-{{ $bundle->id }}" key='tab-bundles-{{ $bundle->id }}'>
                            <div>


                                {{-- navLinks --}}
                                <ul class="nav nav-tabs inner" role="tablist">

                                    {{-- loop - bundleRanges --}}
                                    @foreach ($bundle->ranges ?? [] as $bundleRange)

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if ($bundle->ranges->first()->id == $bundleRange->id) active @endif"
                                            role="tab" data-bs-toggle="tab"
                                            href="#tab-bundles-{{ $bundle->id }}-{{ $bundleRange->id }}">
                                            {{ $bundleRange->range->name }}
                                        </a>
                                    </li>

                                    @endforeach
                                    {{-- end loop --}}

                                </ul>
                                {{-- end navLinks --}}






                                {{-- ---------------------------------- --}}
                                {{-- ---------------------------------- --}}






                                {{-- tabContent --}}
                                <div class="tab-content">




                                    {{-- loop - bundleRanges --}}
                                    @foreach ($bundle->ranges ?? [] as $bundleRange)


                                    <div class="tab-pane fade show @if ($bundle->ranges->first()->id == $bundleRange->id) active @endif no--card"
                                        role="tabpanel" id="tab-bundles-{{ $bundle->id }}-{{ $bundleRange->id }}"
                                        key='tab-bundles-{{ $bundle->id }}-{{ $bundleRange->id }}'>
                                        <div class="row row pt-2 align-items-center mb-4">




                                            {{-- :: toggleActive - overview --}}
                                            <livewire:dashboard.menu.plans.manage.range-sizes.components.range-sizes-overview
                                                key='bundle-toggle-{{ $bundleRange->id }}' :$bundleRange />





                                            {{-- -------------------- --}}
                                            {{-- -------------------- --}}







                                            {{-- loop - rangeTypes --}}
                                            @foreach ($bundleRange->types ?? [] as $bundleRangeType)


                                            {{-- :: singleRangeType --}}
                                            <livewire:dashboard.menu.plans.manage.range-sizes.components.range-sizes-view
                                                key='bundle-types-{{ $bundleRangeType->id }}' :$bundleRangeType />


                                            @endforeach
                                            {{-- end loop - rangeTypes --}}



                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- end loop - ranges --}}




                                </div>
                            </div>
                        </div>
                        {{-- end tabRanges --}}

                        @endforeach
                        {{-- end loop - bundles --}}





                    </div>
                </div>
                {{-- end tabBundlels --}}



            </div>
        </div>
    </div>
    {{-- endContainer --}}



</section>
{{-- endSection --}}