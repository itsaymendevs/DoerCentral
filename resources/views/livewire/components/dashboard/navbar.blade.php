{{-- Navbar --}}
<section class="navbar--section" id="navbar--section">
   <div class="container-fluid">
      <div class="row align-items-center" wire:ignore>



         {{-- logoCol --}}
         <div class="col-1" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <div class="dropdown navbar--profile-dropdown text-center " data-bs-toggle="tooltip" data-bss-tooltip=""
               data-bs-placement="left" title="Click For Menu">


               {{-- logoDropdown --}}
               <button class="btn navbar--profile-button" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                  <img src="{{ asset('assets/img/Logo/doer.png') }}" width="73" height="41">
               </button>



               {{-- dropdown Menu --}}
               <div class="dropdown-menu navbar--profile-menu">

                  {{-- 1: profile --}}
                  <a class="dropdown-item d-flex align-items-center justify-content-center d-none" href="#">
                     <svg class="bi bi-person me-2" style="font-size: 21px;" xmlns="http://www.w3.org/2000/svg"
                        width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                        <path
                           d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                        </path>
                     </svg>Profile
                  </a>



                  {{-- logout --}}
                  <a class="dropdown-item d-flex align-items-center justify-content-center "
                     href="{{ route('dashboard.login') }}">
                     <svg class="bi bi-door-open me-2" style="font-size: 21px;" xmlns="http://www.w3.org/2000/svg"
                        width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"></path>
                        <path
                           d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z">
                        </path>
                     </svg>Logout
                  </a>
               </div>
               {{-- endMenu --}}
            </div>
         </div>
         {{-- endCol --}}






         {{-- ------------------------------------------- --}}






         {{-- navLinks --}}
         <div class="col-10" data-aos="flip-up" data-aos-duration="800" data-aos-once="true">
            <div class="navbar--menu d-flex align-items-center justify-content-between">

               {{-- dashboard --}}
               <button class="btn navbar--menu-button" type="button">Dashboard</button>


               {{-- promos --}}
               <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/promo', 'dashboard/promo/*')) active @endif"
                  href="{{ route('dashboard.promos') }}" wire:navigate>Promo &amp; Rewards</a>



               {{-- customers --}}
               <a class="btn  navbar--menu-button
                    @if (Request::is('dashboard/customers', 'dashboard/customers/*')) active @endif"
                  href="{{ route('dashboard.customers') }}" wire:navigate>Customers</a>



               {{-- inventory --}}
               <a class="btn  navbar--menu-button
                    @if (Request::is('dashboard/inventory', 'dashboard/inventory/*')) active @endif"
                  href="{{ route('dashboard.inventory') }}" wire:navigate>Inventory</a>


               {{-- menu --}}
               <a class="btn navbar--menu-button
               @if (Request::is('dashboard/menu', 'dashboard/menu/*')) active @endif"
                  href="{{ route('dashboard.menuPlans') }}" wire:navigate>Menu</a>


               {{-- delivery --}}
               <a class="btn navbar--menu-button
                    @if (Request::is('dashboard/delivery', 'dashboard/delivery/*')) active @endif"
                  href="{{ route('dashboard.delivery') }}" wire:navigate>Delivery</a>


               {{-- kitchen --}}
               <button class="btn navbar--menu-button" type="button">Kitchen</button>

               {{-- settings --}}
               <button class="btn navbar--menu-button" type="button">Settings</button>








               {{-- switchMenuButton --}}
               <button class="btn navbar--menu-button px-2 rounded-1" type="button"
                  style="border: none !important;background-color: var(--bg-golden-dark);">
                  <svg class="bi bi-arrow-down-up fs-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                     fill="currentColor" viewBox="0 0 16 16">
                     <path fill-rule="evenodd"
                        d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z">
                     </path>
                  </svg>
               </button>


            </div>
         </div>
         {{-- end navLinks --}}




         {{-- ----------------------------------------------------------- --}}




         {{-- notificationCol --}}
         <div class="col-1 text-center" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
            <button class="btn btn--raw-icon navbar--notify scalebellmix--3" s="button">
               <svg class="bi bi-bell" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                  viewBox="0 0 16 16">
                  <path
                     d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z">
                  </path>
               </svg>
            </button>
         </div>


      </div>
   </div>
</section>
{{-- end Navbar --}}