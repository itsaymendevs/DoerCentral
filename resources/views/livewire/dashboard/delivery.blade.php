{{-- section --}}
<section class="content--section" id="content--section">
   <div class="container">
      <div class="row">
         <div class="col-12">


            {{-- tabsWrap --}}
            <div class="tabs--wrap">


               {{-- tabLinks --}}
               <ul class="nav nav-tabs mb-4" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
                  data-aos-once="true" role="tablist">

                  {{-- delivery --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-1" role="tab">Delivery</a>
                  </li>

                  {{-- cityTime / charges --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#tab-2" role="tab">City Time &amp;
                        Charges</a>
                  </li>

                  {{-- zones --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab">Zones</a>
                  </li>

                  {{-- drivers --}}
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-4" role="tab">Drivers</a>
                  </li>
               </ul>







               {{-- ------------------------------------------------------- --}}








               {{-- tabContent --}}
               <div class="tab-content">


                  {{-- 1: deliveryTab --}}
                  <div class="tab-pane fade no--card" id="tab-1" role="tabpanel">

                     {{-- deliveryView --}}
                     <livewire:dashboard.delivery.components.delivery-view />

                  </div>
                  {{-- endTab --}}








                  {{-- ----------------------------------------------------- --}}
                  {{-- ----------------------------------------------------- --}}






                  {{-- 2: cityTiming / Charges Tab --}}
                  <div class="tab-pane fade show active no--card" id="tab-2" role="tabpanel">




                     {{-- innerTab wrapper --}}
                     <div>


                        {{-- innerTab Links --}}
                        <ul class="nav nav-tabs inner" role="tablist">


                           {{-- 2.1: citiesTab --}}
                           @foreach ($cities as $city)
                              <li class="nav-item" role="presentation">

                                 {{-- :: 1st link is active --}}
                                 <a class="nav-link @if ($city->id == 1) active @endif"
                                    data-bs-toggle="tab" href="#tab-{{ $city->id + 9 }}"
                                    role="tab">{{ $city->name }}</a>
                              </li>
                           @endforeach
                           {{-- end loop --}}



                           {{-- 2.2: configurationsTab --}}
                           <li class="nav-item" role="presentation">
                              <a class="nav-link" data-bs-toggle="tab" href="#tab-17" role="tab">Configurations</a>
                           </li>

                        </ul>








                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}





                        {{-- innerTab Content --}}
                        <div class="tab-content">



                           {{-- 2.1: cityTiming Tabs --}}
                           @foreach ($cities as $city)
                              <div class="tab-pane @if ($city->id == 1) active @endif no--card"
                                 id="tab-{{ $city->id + 9 }}" role="tabpanel">



                                 {{-- single cityTiming content --}}
                                 <livewire:dashboard.delivery.components.delivery-view-timings :id='$city->id' />


                              </div>
                           @endforeach
                           {{-- end cityTiming Tabs --}}






                           {{-- --------------------------------------------- --}}
                           {{-- --------------------------------------------- --}}








                           {{-- 2.2: configurationsTab --}}
                           <div class="tab-pane no--card" id="tab-17" role="tabpanel">


                              <livewire:dashboard.delivery.components.delivery-manage-holidays />


                           </div>
                           {{-- endTab --}}






                        </div>
                        {{-- end tabContent --}}


                     </div>
                  </div>
                  {{-- end cityTiming Outer Tab --}}










                  {{-- ------------------------------------------------------------ --}}
                  {{-- ------------------------------------------------------------ --}}










                  {{-- 3: zonesTab --}}
                  <div class="tab-pane fade no--card" id="tab-3" role="tabpanel">


                     {{-- zonesView --}}
                     <livewire:dashboard.delivery.components.delivery-view-zones />

                  </div>
                  {{-- endTab --}}








                  {{-- ------------------------------------------------------------ --}}
                  {{-- ------------------------------------------------------------ --}}






                  {{-- 4: driversTab --}}
                  <div class="tab-pane fade no--card" id="tab-4" role="tabpanel">


                     {{-- viewDrivers --}}
                     <livewire:dashboard.delivery.components.delivery-view-drivers />


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
      {{-- 1: createTiming --}}
      <livewire:dashboard.delivery.components.delivery-create-timing />

      {{-- 1.2: createTiming --}}
      <livewire:dashboard.delivery.components.delivery-edit-timing />



      {{-- --------------------------- --}}




      {{-- 2: createZone --}}
      <livewire:dashboard.delivery.components.delivery-create-zone />

      {{-- 2.1: editZone --}}
      <livewire:dashboard.delivery.components.delivery-edit-zone />





      {{-- --------------------------- --}}


      {{-- 3: createDriver --}}
      <livewire:dashboard.delivery.components.delivery-create-driver />

      {{-- 3.1: editDriver --}}
      <livewire:dashboard.delivery.components.delivery-edit-driver />
   @endsection





   {{-- ------------------------------------------ --}}
   {{-- ------------------------------------------ --}}



</section>
{{-- endSection --}}
