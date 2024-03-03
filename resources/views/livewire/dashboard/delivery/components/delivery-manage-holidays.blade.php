{{-- wrapperRow --}}
<div class="row row pt-2 align-items-center mb-4">
    <div class="col-12 mt-4" data-view="table">
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
</div>
{{-- endRow --}}