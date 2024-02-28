<section class="content--section" id="content--section">
   <div class="container">




      {{-- :: SubMenu --}}
      <livewire:dashboard.menu.components.sub-menu />




      {{-- ----------------------------------------- --}}
      {{-- ----------------------------------------- --}}




      {{-- contentRow --}}
      <div class="row row pt-2 align-items-center mb-5">
         <div class="col-12">




            {{-- 1: dietsTab --}}
            <div class="tab-pane-like mt-2" style="border: 1px solid var(--color-theme-secondary)">


               <livewire:dashboard.menu.settings.components.settings-manage-diets />


            </div>
            {{-- end tab --}}












            {{-- ----------------------------------------------------------- --}}
            {{-- ----------------------------------------------------------- --}}







            {{-- 2: sizesTab --}}
            <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">

               <livewire:dashboard.menu.settings.components.settings-manage-sizes />

            </div>
            {{-- end tab --}}







            {{-- ----------------------------------------------------------- --}}
            {{-- ----------------------------------------------------------- --}}







            {{-- 3: tagsTab --}}
            <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">

               <livewire:dashboard.menu.settings.components.settings-manage-tags />

            </div>
            {{-- end tab --}}





            {{-- ----------------------------------------------------------- --}}
            {{-- ----------------------------------------------------------- --}}





            {{-- 4: cuisinesTab --}}
            <div class="tab-pane-like mt-4" style="border: 1px solid var(--color-theme-secondary)">


               <livewire:dashboard.menu.settings.components.settings-manage-cuisines />


            </div>
            {{-- end tab --}}




         </div>
      </div>
   </div>
</section>
{{-- endSection --}}
