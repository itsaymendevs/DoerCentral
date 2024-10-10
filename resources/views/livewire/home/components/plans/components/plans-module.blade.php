<div class="modal fade modal--inverse" role="dialog" tabindex="-1" id='plan--module-modal' wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            {{-- header --}}
            <div class="modal-header modal--header">
                <button class="btn-close btn--close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>



            {{-- ------------------------------ --}}
            {{-- ------------------------------ --}}




            {{-- body --}}
            @if ($module)

            <div class="modal-body">
                <div class="section--group section--modal-group">
                    <div class="row">
                        <div class="col-12">

                            {{-- module --}}
                            <div class="meal-plan--card service--card">


                                {{-- cover --}}
                                <img class="service--image" src="{{ url('storage/modules/default.png') }}">


                                {{-- features --}}
                                <livewire:home.components.plans.components.plans-customise-module
                                    key="single-module-features-modal-{{ $module->id }}" id='{{ $module->id }}'
                                    parent='modal'>


                            </div>
                            {{-- endModule --}}

                        </div>
                    </div>
                </div>
            </div>


            @endif
            {{-- endModalBody --}}



        </div>
    </div>
</div>
{{-- endModal --}}