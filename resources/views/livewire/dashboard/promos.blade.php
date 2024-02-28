<section class="content--section" id="content--section">
   <div class="container">


      {{-- row --}}
      <div class="row">
         <div class="col-12">


            {{-- tabWrap --}}
            <div class="tabs--wrap">


               {{-- tabLinks --}}
               <ul class="nav nav-tabs mb-4" data-aos="flip-up" data-aos-duration="600" data-aos-delay="800"
                  data-aos-once="true" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab">Promo</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab">Rewards</a>
                  </li>
               </ul>





               {{-- --------------------------------------------- --}}




               {{-- tabContent --}}
               <div class="tab-content">



                  {{-- 1: promoCodes tab --}}
                  <div class="tab-pane fade show active no--card" id="tab-1" role="tabpanel">


                     {{-- :: promoCodes View --}}
                     <livewire:dashboard.promos.components.promos-view />

                  </div>
                  {{-- end tab --}}





                  {{-- ------------------------------------------------ --}}
                  {{-- ------------------------------------------------ --}}





                  {{-- 2: rewardsTab --}}
                  <div class="tab-pane fade no--card" id="tab-2" role="tabpanel"></div>


               </div>
               {{-- end tabWrap --}}


            </div>
         </div>
      </div>
   </div>
   {{-- endContainer --}}









   {{-- ------------------------------------------ --}}
   {{-- ------------------------------------------ --}}




   @section('modals')
      {{-- 1: createPromo --}}
      <livewire:dashboard.promos.components.promos-create />



      {{-- 2: editPromo --}}
      <livewire:dashboard.promos.components.promos-edit />
   @endsection





   {{-- ------------------------------------------ --}}
   {{-- ------------------------------------------ --}}



</section>
{{-- endSection --}}
