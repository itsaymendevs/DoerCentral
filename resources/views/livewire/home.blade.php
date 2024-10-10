<section>








    {{-- 0.5: helpers --}}
    <livewire:home.components.home-helpers key='helpers--section' />




    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}







    {{-- 1: navbar --}}
    <livewire:home.components.navbar key='navbar--section' />




    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    {{-- 2: hero --}}
    <livewire:home.components.home-hero key='hero--section' />






    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    {{-- 3: reviews --}}
    <livewire:home.components.home-reviews key='reviews--section' />







    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}









    {{-- 4: brands --}}
    <livewire:home.components.home-brands key='brands--section' />






    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}







    {{-- 5: plans --}}
    <livewire:home.components.plans key='plans--section' />







    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    {{-- 6: AI --}}
    <livewire:home.components.home-ai key='ai--section' />











    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    {{-- 7: steps --}}
    <livewire:home.components.home-steps key='steps--section' />












    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    {{-- 8: steps --}}
    <livewire:home.components.home-features key='features--section' />








    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}













    {{-- 9: footer --}}
    <livewire:home.components.footer key='footer--section' />









    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}






    @section('scripts')


    <script>
        var isTrigged = false;
        $(window).on('resize scroll', function() {
            if (isScrolledIntoView($('#w-ai--section'))) {

                if (isTrigged == false) {

                    isTrigged = true;

                    // 1: AI
                    instanceOne = $('#type--wrapper-content-1').html();

                    var instanceOneType = new Typed('#type--wrapper-1', {
                        strings: [instanceOne],
                        typeSpeed: 10,
                        cursorChar: '_',
                        contentType: 'html',
                    });



                } // end if





            } // end if
        });






        // -----------------------------------------------
        // -----------------------------------------------





        function isScrolledIntoView(elem) {

            var elementTop = elem.offset().top;
            var elementBottom = elementTop + elem.outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            return elementBottom > viewportTop && elementTop < viewportBottom;

        } // end function





    </script>


    @endsection
    {{-- endSection --}}





    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}
    {{-- ------------------------------------------------ --}}








    {{-- section --}}
    @section('modals')


    {{-- 1: features --}}
    <livewire:home.components.plans.components.plans-features key='plan--features' />



    {{-- 2: module --}}
    <livewire:home.components.plans.components.plans-module key='plan--module' />




    {{-- 3: login --}}
    <livewire:home.components.home-login key='login--modal' />



    @endsection
    {{-- endSection --}}



</section>
{{-- endSection --}}