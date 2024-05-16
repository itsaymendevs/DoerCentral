<section id="navbar--section" class="navbar--section" style="margin-bottom: 35px" wire:ignore>
    <div class="container-fluid">
        <div class="row align-items-center">



            {{-- todayDate --}}
            <div class="col text-center" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <h6 class="fw-semibold mb-0">{{ date('D - d', strtotime($globalCurrentDate)) }}<br />
                    {{ date('M Y', strtotime($globalCurrentDate)) }}</h6>
            </div>




            {{-- hr --}}
            <div class="col-3" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
                <hr />
            </div>



            {{-- rightCol --}}
            <div class="col" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="dropdown navbar--profile-dropdown text-center scale--self-05" data-bs-toggle="tooltip"
                    data-bss-tooltip="" data-bs-placement="left" title="Click For Menu">


                    {{-- logoDropdown --}}
                    <button class="btn navbar--profile-button" type="button">
                        <img src="{{ asset('assets/img/Clients/doer.png') }}" width="73" height="41">
                    </button>

                </div>
            </div>
            {{-- end rightCol --}}



        </div>
    </div>
</section>
{{-- endSection --}}