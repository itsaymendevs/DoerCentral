<section id="content--section" class="content--section">
    <div class="container">




        {{-- submenu --}}
        <livewire:central.dashboard.tech.brands.brands-details.components.sub-menu id='{{ $brand->id }}'
            key='submenu' />




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}








        {{-- contentRow --}}
        <form wire:submit='update' class="row align-items-start pt-2 mb-5">




            {{-- leftCol --}}
            <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"
                wire:ignore.self>


                {{-- topRow --}}
                <div class="row mb-3">




                    {{-- 1: topWrapper --}}
                    <div class="col-12">

                        <div class='client--card-status fs-6 mb-3 {{ $brand->status }}'>


                            {{-- status --}}
                            <p class='mb-0'>
                                <i class="bi bi-circle-fill me-2"></i>
                                <span>{{ ucwords($brand->status) }}</span>
                            </p>



                            {{-- activateButton --}}
                            @if ($brand->status == 'processing')


                            {{-- arrow --}}
                            <small>
                                <i class="bi bi-arrow-right fs-13 fw-semibold text-white ms-2 me-3"></i>
                            </small>



                            <button wire:click="activateBrand('{{ $brand->id }}')" type='button'
                                class="btn btn--scheme text-uppercase align-items-center btn--confirm d-inline-flex fs-13justify-content-center fw-semibold mb-0 download--btn fs-14">Activate</button>

                            @endif
                            {{-- end if --}}


                        </div>

                    </div>
                    {{-- endWrapper --}}








                    {{-- -------------------------------------- --}}
                    {{-- -------------------------------------- --}}
                    {{-- -------------------------------------- --}}






                    {{-- businessName --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Business Name</label>
                        </div>
                        <input type="text" step='0.01' class="form--input mb-4" wire:model='instance.name' />
                    </div>




                    {{-- officialEmail --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Official Email</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.email' />
                    </div>






                    {{-- website --}}
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <hr class="w-50" />
                            <label class="form-label form--label px-3 mb-0">Website</label>
                        </div>
                        <input type="text" class="form--input mb-4" step='0.01' wire:model='instance.websiteURL' />
                    </div>




                </div>
                {{-- end topRow --}}



            </div>
        </form>
    </div>
    {{-- endContainer --}}







</section>
{{-- endSection --}}
