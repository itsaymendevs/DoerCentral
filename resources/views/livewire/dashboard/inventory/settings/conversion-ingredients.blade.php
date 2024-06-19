{{-- content --}}
<section class="content--section" id="content--section">
    <div class="container">





        {{-- :: SubMenu --}}
        <livewire:dashboard.inventory.components.sub-menu title='Conversion Ingredients' key='submenu' />







        {{-- -------------------------------------- --}}
        {{-- -------------------------------------- --}}







        {{-- form --}}
        <form wire:submit='update' class="row pt-2 align-items-center mb-4">
            <div class="row ">



                {{-- newIngredient --}}
                <div class="col-4 col-xl-4">
                    <button
                        class="btn btn--scheme btn--scheme-2 px-4 scalemix--3 py-2 d-inline-flex align-items-center fs-14 mb-3 fw-semibold item--scheme-0 justify-content-center"
                        type="button" wire:loading.attr='disabled' wire:click="append()">
                        <svg class="bi bi-plus-circle-dotted fs-6 me-2" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                            </path>
                        </svg>Ingredient
                    </button>
                </div>








                {{-- :: conversion --}}
                <div class="col-4">
                    <h3 class='fw-semibold text-center'>{{ $conversion->name }}</h3>
                </div>








                {{-- submitButton --}}
                <div class="col-4 col-xl-4 text-end">


                    <button
                        class="btn btn--scheme btn--scheme-1 px-5 py-2 d-inline-flex align-items-center fs-14 mb-3 fw-bold"
                        wire:loading.attr='disabled'>Update</button>


                </div>
                {{-- endCol --}}







                {{-- ---------------------------------- --}}
                {{-- ---------------------------------- --}}









                {{-- viewIngredients --}}
                <div class="col-12">
                    <div class="table memoir--table w-100 h-100">
                        <table class=" table table-bordered" id="memoir--table">

                            {{-- header --}}
                            <thead>
                                <tr style="vertical-align: middle">
                                    <th class="th--xl">Ingredient</th>

                                    {{-- loop - cookingTypes --}}
                                    @foreach ($cookingTypes as $cookingType)

                                    <th class="th--sm fs-12">{{ $cookingType->name }}</th>

                                    @endforeach
                                    {{-- end loop --}}



                                    {{-- empty --}}
                                    <th class='th--xs'></th>


                                </tr>
                            </thead>






                            {{-- -------------------------------- --}}
                            {{-- -------------------------------- --}}







                            {{-- tbody --}}
                            <tbody>



                                {{-- loop - ingredients --}}
                                @foreach ($conversionIngredients?->groupBy('groupToken') ?? []
                                as $commonToken => $conversionIngredientsByToken)



                                {{-- singleRow --}}
                                <tr key='single-conversion-ing-{{ $commonToken }}'>





                                    {{-- commonIngredient --}}
                                    <td>
                                        <div class="select--single-wrapper builder px-2 mx-auto"
                                            wire:loading.class='no-events' wire:ignore style="width: 270px !important">
                                            <select
                                                class="form-select form--select form--select-{{ $globalSNCounter++ }}"
                                                required data-modal='#edit-conversion-ingredients'
                                                data-instance="instance.ingredients.{{ $commonToken }}.ingredientId"
                                                value='{{ $conversionIngredientsByToken?->first()?->ingredientId }}'>
                                                <option value=""></option>

                                                @foreach ($ingredients as $ingredient)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </td>





                                    {{-- ---------------------------------- --}}
                                    {{-- ---------------------------------- --}}






                                    {{-- loop - cookingTypes --}}
                                    @foreach ($conversionIngredientsByToken ?? [] as $conversionIngredient)


                                    <td>
                                        <input class="form-control form--input px-2 text-center" type="number"
                                            step="0.01" required=""
                                            wire:model="instance.ingredients.{{ $commonToken }}.{{ $conversionIngredient->cookingType->id }}">
                                    </td>


                                    @endforeach
                                    {{-- end loop - cookingTypes --}}









                                    {{-- ---------------------------------- --}}
                                    {{-- ---------------------------------- --}}








                                    {{-- :: removeAction --}}
                                    <td>
                                        <button wire:click="remove('{{ $commonToken}}')"
                                            class="btn btn--raw-icon inline remove scale--3" type="button"
                                            wire:loading.attr='disabled' wire:target='remove, update, append'>
                                            <svg class="bi bi-trash-fill" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>





                                </tr>
                                {{-- endRow --}}



                                @endforeach
                                {{-- end loop - ingredientsByToken --}}




                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- endCol --}}




            </div>
        </form>
    </div>
    {{-- endContainer --}}

















    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}







    {{-- select-handle --}}
    <script>
        $(document).ready(function() {
            for (let i = 0; i < 100; i++) {
                $(document).on('change', `.form--select-${i}`, function(event) {

                    // 1.1: getValue - instance
                    selectValue = $(this).select2('val');
                    instance = $(this).attr('data-instance');


                    @this.set(instance, selectValue);

                }); //end function
            } // end loop
        }); // end listener
    </script>






    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}









</section>
{{-- endContent --}}