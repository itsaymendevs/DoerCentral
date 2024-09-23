{{-- contentSection --}}
<section class="content--section" id="content--section">
    <div class="container">



        {{-- midRow --}}
        <div class="row">


            {{-- newBrand --}}
            <div class="col-3">
                <a href="https://doer.ae/on-boarding/public" target='_blank'
                    class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center">
                    <svg class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                        </path>
                    </svg>New Brand
                </a>
            </div>





            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}



            {{-- filters --}}
            <div class="col-6 text-center">
                <div class="row justify-content-center">



                    {{-- status --}}
                    <div class="col-6">
                        <div class="select--single-wrapper" wire:loading.class='no-events-loading' wire:ignore>
                            <select class="form--select" data-instance='searchStatus' data-placeholder='Select Status'
                                data-clear='true'>
                                <option value=""></option>

                                @foreach ($statuses ?? [] as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>



                    {{-- name --}}
                    <div class="col-6">
                        <input wire:model.live='searchBrand' class="form--input text-center" type="text"
                            placeholder="Search by Name" />
                    </div>


                </div>
            </div>
            {{-- endFilters --}}




            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}





            {{-- counter --}}
            <div class="col-3 text-end">
                <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                    data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Brands">
                    {{ $brands->count() ?? 0 }}
                </h3>
            </div>






        </div>
        {{-- endMidRow --}}









        {{-- ------------------------------------------------------- --}}






        {{-- contentRow --}}
        <div class="row row pt-2 align-items-center mb-5">



            {{-- 1: standardView --}}
            <div class="col-12 mt-cards plans-column" data-view="standard" data-instance="1">
                <div class="row pt-2 row align-items-center mb-4">



                    {{-- loop - brands --}}
                    @foreach ($brands ?? [] as $brand)


                    <div class="col-4 col-xl-3 col-xxl-3" key='single-brand-card-{{ $brand->id }}'>
                        <div class="overview--card client-version brands--card scale--self-05 mb-floating">
                            <div class="row align-items-end">


                                {{-- image --}}
                                <div class="col-2">
                                    <h5 class="text-center sideways--title sideways--left
                                        fw-bold m-0 fs-14">{{ $brand->name }}</h5>
                                </div>



                                <div class="col-10 text-center position-relative">


                                    {{-- 1: PDF --}}
                                    @if (str_contains($brand?->tradeFile, '.pdf'))

                                    <img class="client--card-logo mb-4" src="{{ url('assets/img/helpers/PDF.png') }}" />



                                    {{-- 1.2: regular --}}
                                    @else

                                    <img class="client--card-logo mb-4"
                                        src="{{ url('https://doer.ae/on-boarding/public/storage/clients/trades/' . $brand->tradeFile) }}" />

                                    @endif
                                    {{-- end if --}}




                                    {{-- 1.3: status --}}
                                    <p class='client--card-status {{ $brand->status }}'>
                                        <i class="bi bi-circle-fill me-2"></i>
                                        <span>{{ ucwords($brand->status) }}</span>
                                    </p>





                                    {{-- 2: manage --}}
                                    <a wire:navigate href="{{ route('central.dashboard.singleBrand', [$brand->id]) }}"
                                        class="btn btn--scheme btn--scheme-2 fs-12 px-4 mx-1 scale--self-05"
                                        type="button">Manage</a>

                                </div>




                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- end loop --}}


                </div>
            </div>
            {{-- endView --}}







            {{-- -------------------------------------------------- --}}
            {{-- -------------------------------------------------- --}}




        </div>
    </div>
    {{-- endContainer --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}








    {{-- selectHandle --}}
    <script>
        $(document).on('change', ".form--select", function(event) {



         // 1.1: getValue - instance
         selectValue = $(this).select2('val');
         instance = $(this).attr('data-instance');

         @this.set(instance, selectValue);


      }); //end function
    </script>










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</section>
{{-- endSection --}}
