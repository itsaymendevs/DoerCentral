{{-- wrapper --}}
<div>



    {{-- styles --}}
    @section('styles')




    <style>
        :root {


            /* fonts */
            --textFont: <?php echo "$profile->textFont" ?>;
            --headingFont: <?php echo "$profile->headingFont" ?>;

            /* colors */
            --textColor: <?php echo "$settings->textColor" ?>;
            --preloaderLineColor: <?php echo "$settings->preloaderLineColor" ?>;

            --cursorColor: <?php echo "$settings->cursorColor" ?>;
            --cursorHoverColor: <?php echo "$settings->cursorHoverColor" ?>;

            --planCardTitleColor: <?php echo "$settings->planCardTitleColor" ?>;
            --planCardSubtitleColor: <?php echo "$settings->planCardSubtitleColor" ?>;
            --planCardCaptionColor: <?php echo "$settings->planCardCaptionColor" ?>;
            --planCardHrColor: <?php echo "$settings->planCardHrColor" ?>;
            --planCardButtonColor: <?php echo "$settings->planCardButtonColor" ?>;
            --planCardButtonHoverColor: <?php echo "$settings->planCardButtonHoverColor" ?>;


            --navbarMenuColor: <?php echo "$settings->navbarMenuColor" ?>;
            --navbarMenuActiveColor: <?php echo "$settings->navbarMenuActiveColor" ?>;
            --navbarLinksColor: <?php echo "$settings->navbarLinksColor" ?>;
            --navbarLinksHoverColor: <?php echo "$settings->navbarLinksHoverColor" ?>;
            --navbarSocialLinksColor: <?php echo "$settings->navbarSocialLinksColor" ?>;


            --sliderLineColor: <?php echo "$settings->sliderLineColor" ?>;
            --sliderBulletsColor: <?php echo "$settings->sliderBulletsColor" ?>;




            /* forPlan */
            --planSideTitleColor: <?php echo "$settings->planSideTitleColor" ?>;
            --planFilterLinksColor: <?php echo "$settings->planFilterLinksColor" ?>;
            --planFilterLinksHoverBorderColor: <?php echo "$settings->planFilterLinksHoverBorderColor" ?>;

            --planListNumbersColor: <?php echo "$settings->planListNumbersColor" ?>;
            --planMealDietColor: <?php echo "$settings->planMealDietColor" ?>;

            --planMealsBorderColor: <?php echo "$settings->planMealsBorderColor" ?>;
            --planMealsHoverBorderColor: <?php echo "$settings->planMealsHoverBorderColor" ?>;

            --planReviewsTitleColor: <?php echo "$settings->planReviewsTitleColor" ?>;

            --planActionButtonColor: <?php echo "$settings->planActionButtonColor" ?> !important;
            --planActionButtonHoverColor: <?php echo "$settings->planActionButtonHoverColor" ?> !important;








            /* -------------------------------------------------- */
            /* -------------------------------------------------- */
            /* -------------------------------------------------- */






            /* background */
            --bodyBackgroundColor: <?php echo "$settings->bodyBackgroundColor" ?>;
            --navbarBackgroundColor: <?php echo "$settings->navbarBackgroundColor" ?>;

            --planCardBackgroundColor: <?php echo "$settings->planCardBackgroundColor" ?>;
            --planCardButtonBackgroundColor: <?php echo "$settings->planCardButtonBackgroundColor" ?>;


            /* forPlan */
            --planActionButtonBackgroundColor: <?php echo "$settings->planActionButtonBackgroundColor" ?> !important;





            /* -------------------------------------------------- */
            /* -------------------------------------------------- */
            /* -------------------------------------------------- */






            /* radius */
            --planCardRadius: <?php echo "$settings->planCardRadius" ?>px;





            /* -------------------------------------------------- */
            /* -------------------------------------------------- */
            /* -------------------------------------------------- */




            /* align */
            --planCardAlignment: <?php echo "$settings->planCardAlignment" ?>;


        }
    </style>


    @endsection
    {{-- endSection --}}





</div>
{{-- endWrapper --}}