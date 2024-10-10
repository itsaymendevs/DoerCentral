<section id="w-navbar--section" class="w-navbar--section position-relative" data-aos="fade-down" data-aos-duration="700"
    data-aos-delay="500" wire:ignore>
    <div class="container">
        <div class="row align-items-center">


            {{-- logo --}}
            <div class="col-4 col-md-6">
                <img class="w-navbar--logo" src="{{ url('assets/plugins/website/img/logo/doer.png') }}">
            </div>


            {{-- menu --}}
            <div class="col-8 col-md-6 text-end">
                <button class="btn w-navbar--toggler" data-aos="fade-down" type="button">
                    <span>Menu</span>
                </button>

                <button class="btn w-navbar--toggler" data-aos="fade-down" type="button" data-bs-toggle='modal'
                    data-bs-target='#login--modal'>
                    <span>Login</span>
                </button>

            </div>

        </div>
    </div>
</section>
{{-- endSection --}}