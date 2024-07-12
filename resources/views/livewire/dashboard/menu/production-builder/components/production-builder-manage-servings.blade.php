<div class="d-block">





    {{-- subtitle --}}
    <div class="row align-items-center mt-5">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3 hr--title">
                <hr style="width: 70%" />
                <label class="form-label form--label px-3 justify-content-center mb-0" style="width: 30%">Serving
                    Details</label>
            </div>
        </div>
    </div>







    {{-- ---------------------------------- --}}
    {{-- ---------------------------------- --}}







    {{-- content --}}
    <div class="row align-items-center">


        {{-- description --}}
        <div class="col-12">
            <textarea wire:model='instanceServing.desc' class="form-control form--input form--textarea mb-4"
                wire:change='updateServing' placeholder="Serving Description"></textarea>
        </div>



    </div>
</div>
{{-- endWrapper --}}