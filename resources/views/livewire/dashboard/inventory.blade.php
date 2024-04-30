{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">
        <div class="row">
            <div class="col-12">



                {{-- tabWraps --}}
                <div class="tabs--wrap">


                    {{-- tabLinks --}}
                    <ul class="nav nav-tabs mb-4" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
                        data-aos-once="true" role="tablist">

                        {{-- 1: ingredients --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">Ingredients</a>
                        </li>




                        {{-- :: permission - hasStock --}}
                        @if ($versionPermission->inventoryModuleHasStock)



                        {{-- supplier --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Suppliers</a>
                        </li>


                        {{-- purchases --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Purchases</a>
                        </li>


                        {{-- stock --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-4" role="tab">Stock</a>
                        </li>



                        @endif
                        {{-- end if - permission --}}








                        {{-- configurations --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-5" role="tab">Configurations</a>
                        </li>



                        {{-- settings --}}
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-6" role="tab">Settings</a>
                        </li>




                    </ul>






                    {{-- ------------------------------------------------ --}}
                    {{-- ------------------------------------------------ --}}






                    {{-- tabContent --}}
                    <div class="tab-content">




                        {{-- 1: ingredientsTab --}}
                        <div class="tab-pane fade show active no--card" id="tab-1" role="tabpanel">



                            {{-- :: viewIngredients --}}
                            <livewire:dashboard.inventory.components.inventory-view-ingredients />


                        </div>
                        {{-- end Tab --}}










                        {{-- ------------------------------------------------ --}}
                        {{-- ------------------------------------------------ --}}




                        {{-- :: permission - hasStock --}}
                        @if ($versionPermission->inventoryModuleHasStock)









                        {{-- 2: suppliersTab --}}
                        <div class="tab-pane fade no--card" id="tab-2" role="tabpanel">



                            {{-- :: viewSuppliers --}}
                            <livewire:dashboard.inventory.components.inventory-view-suppliers />


                        </div>
                        {{-- endTab --}}










                        {{-- ------------------------------------------------ --}}
                        {{-- ------------------------------------------------ --}}







                        {{-- 3: purchasesTab --}}
                        <div class="tab-pane fade no--card" id="tab-3" role="tabpanel">


                            {{-- :: viewPurchases --}}
                            <livewire:dashboard.inventory.components.inventory-view-purchases />



                        </div>
                        {{-- endTab --}}







                        @endif
                        {{-- end if - permission --}}





                        {{-- ------------------------------------------------ --}}
                        {{-- ------------------------------------------------ --}}












                        {{-- 5: configurationsTab --}}
                        <div class="tab-pane fade no--card" id="tab-5" role="tabpanel">


                            {{-- :: category - group - exclude - allergy --}}
                            <livewire:dashboard.inventory.components.inventory-manage-settings />

                        </div>
                        {{-- endTab --}}






























                        {{-- ------------------------------------------------ --}}
                        {{-- ------------------------------------------------ --}}







                        {{-- 6: settingsTab --}}
                        <div class="tab-pane fade no--card" id="tab-6" role="tabpanel">






                            {{-- wrapper --}}
                            <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


                                <div class="row">
                                    <div class="col-12">
                                        <div>


                                            {{-- collapseButton --}}
                                            <a class="btn fs-5 collapse--btn fw-semibold" data-bs-toggle="collapse"
                                                href="#collapse-5" role="button" aria-expanded="false"
                                                aria-controls="collapse-5">Conversions<svg class="bi bi-chevron-expand"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z">
                                                    </path>
                                                </svg>
                                            </a>









                                            {{-- collapseContent --}}
                                            <div class="collapse collapse--content" id="collapse-5">



                                                {{-- :: store - view - update --}}
                                                {{-- wrapper --}}
                                                <div>


                                                    {{-- form --}}
                                                    <form class="row align-items-end pt-2" wire:submit='store'>




                                                        {{-- cover --}}
                                                        <div class="col-5 text-center">
                                                            <img class="w-100 inventory--image-frame"
                                                                src="{{ asset('assets/img/Allergies/allergy.png') }}" />
                                                        </div>



                                                        {{-- name - desc --}}
                                                        <div class="col-7">
                                                            <label class="form-label form--label">Name</label>
                                                            <input class="form-control form--input mb-4" type="text"
                                                                wire:model='instance.name' required />




                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>


                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>

                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>

                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>

                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>

                                                                <div class="col">
                                                                    <label class="form-label form--label">Name</label>
                                                                    <input class="form-control form--input mb-4"
                                                                        type="text" wire:model='instance.name'
                                                                        required />
                                                                </div>

                                                            </div>
                                                        </div>





                                                        {{-- submit --}}
                                                        <div class="col-12 text-end">
                                                            <button
                                                                class="btn btn--scheme btn--scheme-2 px-5 py-1 d-inline-flex align-items-center mx-1 scale--self-05 justify-content-center"
                                                                wire:loading.attr='disabled'>
                                                                Save
                                                            </button>
                                                        </div>


                                                    </form>
                                                    {{-- endForm --}}








                                                    {{-- ------------------------------------------------- --}}
                                                    {{-- ------------------------------------------------- --}}







                                                    {{-- tableView Row --}}
                                                    <div class="row align-items-end pt-2">


                                                        {{-- tableView --}}
                                                        <div class="col-12 mt-5" data-view="table">
                                                            <div class="table-responsive memoir--table w-100">
                                                                <table class="table table-bordered" id="memoir--table">


                                                                    {{-- thead --}}
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="th--xs"></th>
                                                                            <th class="th--md" s="">Group</th>
                                                                            <th class="th--md">Description</th>
                                                                            <th class="th--xs"></th>
                                                                        </tr>
                                                                    </thead>



                                                                    {{-- tbody --}}
                                                                    <tbody>




                                                                    </tbody>
                                                                    {{-- end tbody --}}


                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- endRow --}}



                                                </div>
                                                {{-- endWrapper --}}


                                            </div>
                                            {{-- end collapseContent --}}



                                        </div>
                                    </div>
                                </div>


                            </div>
                            {{-- endWrap --}}





                        </div>
                        {{-- endTab --}}











                    </div>
                </div>
                {{-- end tabsWrap --}}



            </div>
        </div>
    </div>
    {{-- endContainer --}}


















    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}




    @section('modals')



    {{-- 1: createIngredient --}}
    <livewire:dashboard.inventory.components.inventory-create-ingredient />

    {{-- 1.2: editIngredient --}}
    <livewire:dashboard.inventory.components.inventory-edit-ingredient />





    {{-- --------------------------- --}}




    {{-- 2: createSupplier --}}
    <livewire:dashboard.inventory.components.inventory-create-supplier />

    {{-- 2.2: editSupplier --}}
    <livewire:dashboard.inventory.components.inventory-edit-supplier />

    {{-- 2.2: supplierIngredients --}}
    <livewire:dashboard.inventory.components.inventory-manage-supplier-ingredients />





    {{-- --------------------------- --}}




    {{-- 2: createPurchase --}}
    <livewire:dashboard.inventory.components.inventory-create-purchase />

    {{-- 2.2: editPurchase --}}
    <livewire:dashboard.inventory.components.inventory-edit-purchase />

    {{-- 2.2: viewPurchaseIngredients --}}
    <livewire:dashboard.inventory.components.inventory-manage-purchase-ingredients />






    {{-- --------------------------- --}}





    {{-- 3: editAllergy - Ingredients --}}
    <livewire:dashboard.inventory.components.inventory-edit-allergy-ingredients />

    {{-- 3.1: editExclude - Ingredients --}}
    <livewire:dashboard.inventory.components.inventory-edit-exclude-ingredients />





    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}





</section>
{{-- endContent --}}