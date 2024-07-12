{{-- itemsCol --}}
<div class="col-5">
    <div class="table memoir--table w-100 h-100">
        <table class=" table table-bordered" id="memoir--table">



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
                    <td class="fw-bold" style="height: 62px" colspan="3">
                        After Cook <small class="fw-semibold text-gold fs-10 ms-1">(Manual)</small>
                    </td>
                </tr>






                {{-- 1.2: afterCookAuto --}}


                {{-- :: permission - hasConversion --}}
                @if ($versionPermission->menuModuleHasBuilderConversion)

                <tr>
                    <td class="fw-bold" style="height: 62px" colspan="3">
                        After Cook
                    </td>
                </tr>

                @endif
                {{-- end if - permission --}}








                {{-- 1.3: rawAuto --}}
                <tr>
                    <td class="fw-bold" style="height: 62px" colspan="3">
                        Raw
                    </td>
                </tr>








                {{-- 1.4: type - cookType --}}
                <tr class="subheader">


                    <td class="fw-bold fs-11"></td>
                    <td class="fw-bold th--sm fs-11">Type</td>




                    {{-- :: permission - hasConversion --}}
                    @if ($versionPermission->menuModuleHasBuilderConversion)

                    <td class="fw-bold th--lg fs-11">Cook Type</td>

                    @endif
                    {{-- end if - permission --}}


                </tr>








                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}








                {{-- 2: loop - items --}}
                @for ($i = 0; count($instance->typeId ?? []) > $i; $i++)





                {{-- 2.1: ingredients --}}
                @if ($instance->type[$i] == 'Ingredient')





                <livewire:dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-ingredient
                    :instance='$instance' i='{{ $i }}'
                    key='builder-content-items-ingredient-{{ $instance->groupToken[$i] }}' />






                {{-- ---------------------------------------- --}}
                {{-- ---------------------------------------- --}}








                {{-- 2.5: parts --}}
                @elseif ($instance->type[$i] == 'Part')



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
</div>
{{-- endCol --}}