<section id="w-ai--section" class="w-ai--section" wire:ignore>
    <div class="container" data-aos="fade" data-aos-duration="600" data-aos-once="true">
        <div class="row">


            {{-- title --}}
            <div class="col-12 text-center mb-2">
                <h1 class="text-center w-section--title with--arrow dark">Your Intelligent
                    <a class="emphasis" href="#services--section-content"><span>AI Team</span></a>
                    <span class="w-ai--subtitle fst-italic d-">Smarter than you think</span>
                </h1>
            </div>




            {{-- ----------------------------------------- --}}
            {{-- ----------------------------------------- --}}



            {{-- window --}}
            <div class="col-12 w-ai--windows mt-3">
                <div class="row">



                    {{-- typeContent --}}
                    <div class="col-12 col-md-7 position-relative px-0 mb-3" data-aos="fade-up" data-aos-duration="700"
                        data-aos-delay="200" wire:ignore>


                        {{-- sourceType --}}
                        <div id="type--wrapper-content-1" class='d-none white-space-normal'>




                            {{-- 1: questionOne --}}
                            <div class="w-ai--windows-wrapper tinted">

                                {{-- question --}}
                                <h3 class="w-ai--question-question ">{{ $questions[0]['question'] }}</h3>


                                {{-- answer --}}
                                <div class="w-ai--question-answer fst-italic">
                                    <span class="text-start">{{ $questions[0]['answer'] }}</span>
                                    <span>{{ $questions[0]['answerTwo']}}</span>
                                    <ul>
                                        <li>1 lb lean ground beef</li>
                                        <li>1 small onion, finely diced</li>
                                        <li>2 cloves garlic, minced</li>
                                        <li>1 tbsp Worcestershire sauce ....</li>
                                    </ul>
                                </div>
                            </div>


                            {{-- ------------------------------------------ --}}
                            {{-- ------------------------------------------ --}}

                            {{-- hr --}}
                            <hr class="w-ai--windows-hr">




                        </div>
                        {{-- endSource --}}






                        {{-- targetType --}}
                        <div id='type--wrapper-1' class='d-block'></div>



                    </div>
                    {{-- endLeftColumn --}}






                    {{-- ------------------------------- --}}
                    {{-- ------------------------------- --}}




                    {{-- image --}}
                    <div class="col-5">
                        <div class="w-ai--section-image d-none d-lg-flex">
                            <img src="{{ url('assets/plugins/website/img/helpers/background.png') }}">
                        </div>
                    </div>


                </div>
            </div>





        </div>
    </div>
</section>
{{-- endSection --}}