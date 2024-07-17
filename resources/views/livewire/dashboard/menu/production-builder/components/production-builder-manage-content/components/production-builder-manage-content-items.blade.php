{{-- itemsCol --}}
<div class="col-6 pe-0">





    {{-- upperTable --}}
    <div class="table memoir--table w-100 mb-0">
        <table class="table builder--table mb-0" id="memoir--table">



            {{-- header --}}
            <thead>
                <tr>
                    <th class="th--md" style="opacity: 0" colspan="3">
                        Placeholder
                    </th>
                </tr>
            </thead>
            {{-- endHeaders --}}







            {{-- ------------------------------------------- --}}
            {{-- ------------------------------------------- --}}
            {{-- ------------------------------------------- --}}
            {{-- ------------------------------------------- --}}







            {{-- tbody --}}
            <tbody>



                {{-- 1: afterCookManual --}}
                <tr>
                    <td class="fw-bold" style="height: 62px">
                        After Cook <small class="fw-semibold text-gold fs-10 ms-1">(Manual)</small>
                    </td>
                </tr>






                {{-- 2: afterCookAuto --}}


                {{-- :: permission - hasConversion --}}
                @if ($versionPermission->menuModuleHasBuilderConversion)

                <tr>
                    <td class="fw-bold" style="height: 62px">
                        After Cook
                    </td>
                </tr>

                @endif
                {{-- end if - permission --}}








                {{-- 3: rawAuto --}}
                <tr>
                    <td class="fw-bold" style="height: 62px">
                        Raw
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    {{-- endTable --}}









    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}
    {{-- ------------------------------------- --}}










    {{-- contentTable --}}
    <div class="table memoir--table w-100 h-100">
        <table class=" table table-responsive table-bordered" id="memoir--table">




            {{-- tbody --}}
            <tbody>




                {{-- subHeader --}}
                <tr class='subheader border-top-0'>




                    <td @if(!$versionPermission->menuModuleHasBuilderConversion) colspan='2' @endif class="fw-bold
                        fs-11"></td>




                    {{-- :: permission - hasBrand --}}
                    @if ($versionPermission->menuModuleHasBuilderConversion)

                    <td class="fw-bold th--sm fs-11">Brand</td>

                    @endif
                    {{-- end if - permission --}}



                    <td class="fw-bold th--sm fs-11">Type</td>




                    {{-- :: permission - hasConversion --}}
                    @if ($versionPermission->menuModuleHasBuilderConversion)

                    <td class="fw-bold th--lg fs-11">Cook Type</td>

                    @endif
                    {{-- end if - permission --}}

                </tr>
                {{-- endHeaders --}}










                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}








                {{-- 1: loop - items --}}
                @for ($i = 0; count($instance->typeId ?? []) > $i; $i++)





                {{-- 1.2: ingredients --}}
                @if ($instance->type[$i] == 'Ingredient' && $instance->isRemoved[$i] == false)




                <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-ingredient
                    :instance='$instance' i='{{ $i }}'
                    key='builder-content-items-ingredient-{{ $instance->groupToken[$i] }}' />






                {{-- 2.5: parts --}}
                @elseif ($instance->type[$i] == 'Part' && $instance->isRemoved[$i] == false)



                <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-part
                    :instance='$instance' i='{{ $i }}'
                    key='builder-content-items-part-{{ $instance->groupToken[$i] }}' />



                @endif
                {{-- end if --}}



                @endfor
                {{-- end loop --}}






            </tbody>
        </table>
    </div>
    {{-- endTable --}}





</div>
{{-- endCol --}}