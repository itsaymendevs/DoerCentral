{{-- wrapperRow --}}
<div class="col-12 mt-5 city-column-{{ $cityId }}" data-view="holidays" data-instance="{{ $cityId }}"
    style="display: none;" wire:ignore.self>
    <div class="table-responsive memoir--table w-100">
        <table class="table table-bordered" id="memoir--table">

            {{-- headers --}}
            <thead>
                <tr>
                    <th class="th--sm"></th>
                    <th class="th--sm">Day-off?</th>
                    <th class="th--lg">Day-off Message</th>
                </tr>
            </thead>





            {{-- -------------------------------- --}}
            {{-- -------------------------------- --}}




            {{-- tbody --}}
            <tbody>


                {{-- loop - holidays --}}
                @foreach ($holidays as $holiday)

                <livewire:dashboard.delivery.components.delivery-view-holiday key='{{ $holiday->id }}'
                    :id='$holiday->id' />

                @endforeach
                {{-- end loop --}}


            </tbody>
            {{-- end tbody --}}





        </table>
    </div>
</div>
{{-- endCol --}}