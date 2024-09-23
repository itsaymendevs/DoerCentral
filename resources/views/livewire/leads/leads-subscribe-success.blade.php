<div class="wrapper">



    {{-- head --}}
    @section('head')




    {{-- title - description - keywords meta --}}
    <title>Thank You!</title>

    <meta name="description" content="Meal Plan Solution">




    @endsection
    {{-- endHead --}}













    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}










    {{-- mainRow --}}
    <div class="section section-inner m-description my-0 section--success"
        style='background-image: url({{ url("assets/plugins/leads/images/leads/background.png") }});'>
        <div class="wrapper min-vh-100 w-100" style="background-color: #ffffff14">

            <div class="container">
                <div class="row">




                    {{-- logo --}}
                    <div class="col-12" style="height: 20vh;">
                        <img src='{{ url("assets/plugins/leads/images/leads/doer.png") }}' alt=""
                            class='of-contain success--logo pt-4'>
                    </div>







                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}




                    {{-- midSection --}}
                    <div class="col-12 text-center d-flex align-items-center justify-content-center flex-column"
                        style="height: 65vh">
                        <h1 class='fw-700 fs-1 mb-0 mt-0'>{{ session('businessName') }}</h1>



                        {{-- subtitle --}}
                        <div class="success--mid-section mx-auto d-inline-block">
                            <h2 class='text-center fw-700 mt-3 mt-lg-4 mb-1 fs-3 success--subheading d-inline-block'>
                                <span class='me-2 fs-4'>Thanks For Your</span>TRUST
                            </h2>
                            <hr>
                        </div>


                    </div>
                    {{-- endCol --}}










                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}
                    {{-- ----------------------------------------------------- --}}






                    {{-- bottomSection --}}
                    <div class="col-12 d-flex align-items-end w-100" style="height: 13vh;">
                        <div class="row align-items-end justify-content-center w-100">




                            {{-- 1: link --}}
                            <div class="col-4">
                                <div class="d-flex justify-content-start justify-content-lg-start">
                                    <p class='login--forgot'><a class='fw-semibold'
                                            style="color: inherit; text-decoration: none;"
                                            href="{{ route('website.contact') }}">Get in Touch</a></p>
                                </div>
                            </div>





                            {{-- 2: text --}}
                            <div class="col-8 px-0">
                                <div class="d-flex justify-content-end">
                                    <h6 class='fw-500 my-0 text-center fs-14' style="color: #f6f6f6;">We thrilled to
                                        see
                                        you succeed
                                    </h6>
                                </div>
                            </div>



                        </div>
                    </div>
                    {{-- endCol --}}






                </div>
                {{-- endRow --}}

            </div>
        </div>
    </div>
    {{-- endSection --}}













</div>
{{-- endWrapper --}}
