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
                        @if ($versionPermission->hasAdminView)

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-6" role="tab">Settings</a>
                        </li>

                        @endif
                        {{-- end if - permission --}}






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








                        {{-- 4: stockTab --}}
                        <div class="tab-pane fade no--card" id="tab-4" role="tabpanel">


                            {{-- :: stock --}}
                            <livewire:dashboard.inventory.components.inventory-manage-stock />

                        </div>
                        {{-- endTab --}}









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


                            {{-- :: conversions --}}
                            <livewire:dashboard.inventory.components.inventory-manage-configurations />


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






    {{-- --------------------------- --}}





    {{-- 4: editConversion - Ingredients --}}
    <livewire:dashboard.inventory.components.inventory-edit-conversion-ingredients />














    @endsection





    {{-- ------------------------------------------ --}}
    {{-- ------------------------------------------ --}}





</section>
{{-- endContent --}}