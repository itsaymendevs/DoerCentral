{{-- wrapper --}}
<div>


    {{-- filtersRow --}}
    <div class="row">



        {{-- 1: ingredientFilter --}}
        <div class="col-2">
            <label class="form-label form--label">Ingredient</label>
            <input class="form-control form--input mb-4" type="text" wire:model.live='searchIngredient' />
        </div>




        {{-- categoryFilter --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Category</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select form--search-ingredient-select" data-clear='true'
                    data-instance='searchCategory'>
                    <option value=""></option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>





        {{-- groupsFilter --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Group</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select form--search-ingredient-select" data-clear='true'
                    data-instance='searchGroup'>
                    <option value=""></option>

                    @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>





        {{-- excludeFilter --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Exclude</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select form--search-ingredient-select" data-clear='true'
                    data-instance='searchExclude'>
                    <option value=""></option>

                    @foreach ($excludes as $exclude)
                    <option value="{{ $exclude->id }}">{{ $exclude->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>





        {{-- allergyFilter --}}
        <div class="col-2" wire:ignore>
            <label class="form-label form--label">Allergy</label>
            <div class="select--single-wrapper mb-4" wire:loading.class='no-events'>
                <select class="form-select form--select form--search-ingredient-select" data-clear='true'
                    data-instance='searchAllergy'>
                    <option value=""></option>

                    @foreach ($allergies as $allergy)
                    <option value="{{ $allergy->id }}">{{ $allergy->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>







        {{-- ----------------------------------- --}}
        {{-- ----------------------------------- --}}







        {{-- switchView Buttons --}}
        <div class="col-2 text-end">



            <label class="form-label form--label invisible">placeholder</label>




            {{-- :: permission - hasMasterView --}}
            @if ($versionPermission->hasMasterView)





            {{-- switchGroup --}}
            <div class="btn-group btn--swtich-group" role="group" wire:ignore>


                {{-- cardView --}}
                <button class="btn btn--switch-view" data-view="cards" data-target="ingredients-column"
                    data-instance="1" type="button">
                    <svg class="bi bi-card-text" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z">
                        </path>
                        <path
                            d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z">
                        </path>
                    </svg>
                </button>



                {{-- 2: tableView --}}
                <button class="btn btn--switch-view active" data-view="table" data-target="ingredients-column"
                    data-instance="1" type="button">
                    <svg class="bi bi-table" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z">
                        </path>
                    </svg>
                </button>
            </div>




            @endif
            {{-- end if - permission --}}




        </div>
        {{-- endCol --}}




    </div>
    {{-- endRow --}}







    {{-- ---------------------------------- --}}
    {{-- ---------------------------------- --}}









    {{-- midRow --}}
    <div class="row pt-2 align-items-center mb-4">



        {{-- newButton --}}
        <div class="col-3">




            {{-- :: permission - hasAdminView --}}
            @if ($versionPermission->hasAdminView)




            <button class="btn btn--scheme btn--scheme-2 px-3 scalemix--3 py-2 d-inline-flex align-items-center"
                data-bs-target="#new-ingredient" data-bs-toggle="modal" type="button">
                <svg class="bi bi-plus-circle-dotted fs-5 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                    </path>
                </svg>New Ingredient
            </button>



            @endif
            {{-- end if - permission --}}




        </div>
        {{-- endCol --}}




        {{-- title --}}
        <div class="col-6 text-center">
            <h4 class="mb-0 fw-bold">Ingredients</h4>
        </div>




        {{-- counter --}}
        <div class="col-3 text-end">
            <h3 class="fw-bold text-white scale--self-05 d-inline-block badge--scheme-2 px-3 rounded-1 mb-0 py-1"
                data-bs-toggle="tooltip" data-bss-tooltip="" title="Number of Ingredients">
                {{ $ingredients->total() }}
            </h3>
        </div>







        {{-- -------------------------------------- --}}
        {{-- -------------------------------------- --}}






        {{-- cardColumn --}}
        <div class="col-12 ingredients-column" data-view="cards" style="display: none" wire:ignore.self>
            <div class="row mt-cards">



                {{-- loop - ingredients --}}
                @foreach ($ingredients as $ingredient)
                <div class="col-4 col-xl-3 col-xxl-2">
                    <div class="overview--card client-version scale--self-05 mb-floating">
                        <div class="row">



                            {{-- image --}}
                            <div class="col-12 text-center position-relative">
                                <img class="client--card-logo"
                                    src="{{ asset('storage/inventory/ingredients/' . ($ingredient->imageFile ?? $defaultIngredient)) }}" />
                            </div>


                            {{-- name --}}
                            <div class="col-12">
                                <h6 class="text-center fw-bold mt-4 mb-2 truncate-text-1l fs-16 text-heading">{{
                                    $ingredient->name }}</h6>
                            </div>





                            {{-- actions --}}
                            <div class="col-12">




                                {{-- :: permission - hasAdminView --}}
                                @if ($versionPermission->hasAdminView)




                                <div class="d-flex align-items-center justify-content-center mb-1 mt-2">



                                    {{-- 1: brands --}}
                                    <button class="btn btn--scheme btn--scheme-2 px-2 py-1 mx-1 text-white scale--3"
                                        data-bs-toggle="modal" data-bss-tooltip="" data-bs-target="#ingredient-brands"
                                        type="button">
                                        <svg class="bi bi-tags" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z">
                                            </path>
                                            <path
                                                d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z">
                                            </path>
                                        </svg>
                                    </button>





                                    {{-- edit --}}
                                    <button class="btn btn--scheme btn--scheme-2 px-2 py-1 mx-1 text-white scale--3"
                                        wire:click="edit({{ $ingredient->id }})" wire:loading.attr='disabled'
                                        data-bs-toggle="modal" data-bs-target="#edit-ingredient" type="button">
                                        <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z">
                                            </path>
                                        </svg>
                                    </button>






                                    {{-- remove --}}
                                    <button class="btn btn--scheme btn--remove px-2 py-1 mx-1 text-white scale--3"
                                        type="button" wire:click="remove({{ $ingredient->id }})"
                                        wire:loading.attr='disabled'>
                                        <svg class="bi bi-trash" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                {{-- endWrapper --}}






                                @endif
                                {{-- end if - permission --}}



                            </div>
                            {{-- endActionCol --}}


                        </div>
                    </div>
                </div>
                @endforeach
                {{-- end loop --}}













                {{-- :: pagination --}}
                <div class="col-12">
                    {{ $ingredients->links() }}
                </div>





            </div>
        </div>
        {{-- endCol - cardView --}}








        {{-- --------------------------------------------------------- --}}
        {{-- --------------------------------------------------------- --}}








        {{-- 2: tableView (HIDDEN NOW) --}}
        <div class="col-12 ingredients-column mt-4 pt-3 " data-view="table" wire:ignore.self>



            {{-- table --}}
            <div class="table-responsive memoir--table w-100 mb-4">
                <table class="table table-bordered" id="memoir--table">


                    {{-- tableHead --}}
                    <thead>
                        <tr>
                            <th class="th--xs"></th>
                            <th class="th--md">Name</th>
                            <th class="th--sm">Calories</th>
                            <th class="th--md th--sm">Proteins</th>
                            <th class="th--sm">Carbohydrates</th>
                            <th class="th--md th--sm">Fats</th>


                            {{-- :: permission - hasAdminView --}}
                            @if ($versionPermission->hasAdminView)

                            <th class="th--sm"></th>

                            @endif
                            {{-- end if - permission --}}


                        </tr>
                    </thead>






                    {{-- ------------------------------ --}}
                    {{-- ------------------------------ --}}







                    {{-- tbody --}}
                    <tbody>






                        {{-- loop - ingredients --}}
                        @foreach ($ingredients as $ingredient)




                        <tr>
                            <td class="fw-bold">{{ $globalSNCounter++ }}</td>
                            <td class="fw-bold">{{ $ingredient->name }}</td>
                            <td>{{ $ingredient->freshMacro()->calories }}</td>
                            <td>{{ $ingredient->freshMacro()->proteins }}1</td>
                            <td>{{ $ingredient->freshMacro()->carbs }}</td>
                            <td>{{ $ingredient->freshMacro()->fats }}</td>






                            {{-- actions --}}

                            {{-- :: permission - hasAdminView --}}
                            @if ($versionPermission->hasAdminView)


                            <td>

                                <div class="d-flex align-items-center justify-content-center">



                                    {{-- Brands --}}
                                    <button class="btn btn--raw-icon inline scale--3 px-2
                                    @if ($versionPermission->isProcessing) disabled @endif" data-bs-toggle="modal"
                                        data-bss-tooltip="" data-bs-target="#ingredient-brands" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-tags">
                                            <path
                                                d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z">
                                            </path>
                                            <path
                                                d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z">
                                            </path>
                                        </svg>
                                    </button>








                                    {{-- edit --}}
                                    <button class="btn btn--raw-icon inline scale--3 px-2 mx-2
                                    @if ($versionPermission->isProcessing) disabled @endif"
                                        wire:click="edit({{ $ingredient->id }})" wire:loading.attr='disabled'
                                        data-bs-toggle="modal" data-bs-target="#edit-ingredient" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-fill">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                                            </path>
                                        </svg>
                                    </button>










                                    {{-- remove --}}
                                    <button class="btn btn--raw-icon inline remove scale--3 px-2
                                    @if ($versionPermission->isProcessing) disabled @endif" type="button"
                                        wire:click="remove({{ $ingredient->id }})" wire:loading.attr='disabled'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash-fill">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                            </path>
                                        </svg>
                                    </button>



                                </div>

                            </td>


                            @endif
                            {{-- end if - permission --}}


                            {{-- endActions --}}





                        </tr>
                        @endforeach
                        {{-- end loop - ingredients --}}




                    </tbody>
                    {{-- end tbody --}}

                </table>
            </div>







            {{-- :: pagination --}}
            <div class="d-block">
                {{ $ingredients->links() }}
            </div>


        </div>
        {{-- endCol - tableView --}}














    </div>
    {{-- endRow --}}










    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(".form--search-ingredient-select").on("change", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);


        }); //end function
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}



</div>
{{-- endWrapper --}}