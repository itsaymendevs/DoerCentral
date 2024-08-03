<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogReference;
use App\Models\BlogSection;
use App\Models\BlogSetting;
use App\Models\BlogTag;
use App\Models\MailConfiguration;
use App\Models\Profile;
use App\Models\Social;
use App\Models\SubscriptionSetting;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class ExtraController extends Controller
{

    use HelperTrait;





    public function storeBlog(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $blog = new Blog();


        $blog->title = $request->title;
        $blog->titleURL = $this->getNameURL($request->title);

        $blog->author = $request->author;
        $blog->subtitle = $request->subtitle;
        $blog->summary = $request->summary ?? null;
        $blog->publishDate = $this->getCurrentDate();




        // 1.2: togglers
        $blog->showTags = $request->showTags ?? false;
        $blog->showReferences = $request->showReferences ?? false;
        $blog->isHeaderFluid = $request->isHeaderFluid ?? false;
        $blog->isSquareCard = $request->isSquareCard ?? false;





        // 1.3: imageFiles
        $blog->imageFile = $request->imageFileName ?? null;
        $blog->headerImageFile = $request->headerImageFileName ?? null;



        $blog->save();






        // -------------------------------
        // -------------------------------





        // 2: tags
        foreach ($request->tags ?? [] as $tag) {



            // 2.1: create
            $blogTag = new BlogTag();


            $blogTag->tag = $tag;
            $blogTag->blogId = $blog->id;


            $blogTag->save();


        } // end loop








        return response()->json(['message' => 'Blog has been created'], 200);




    } // end function




    // --------------------------------------------------------------------------------------------











    public function updateBlog(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $blog = Blog::find($request->id);

        $blog->title = $request->title;
        $blog->titleURL = $this->getNameURL($request->title);

        $blog->author = $request->author;
        $blog->subtitle = $request->subtitle;
        $blog->summary = $request->summary ?? null;




        // 1.2: togglers
        $blog->showTags = $request->showTags ?? false;
        $blog->showReferences = $request->showReferences ?? false;
        $blog->isHeaderFluid = $request->isHeaderFluid ?? false;
        $blog->isSquareCard = $request->isSquareCard ?? false;






        // 1.3: imageFiles
        $blog->imageFile = $request->imageFileName ?? null;
        $blog->headerImageFile = $request->headerImageFileName ?? null;





        $blog->save();







        // -------------------------------
        // -------------------------------







        // 2: tags - removePrevious
        BlogTag::where('blogId', $blog->id)->delete();



        foreach ($request->tags ?? [] as $tag) {



            // 2.1: create
            $blogTag = new BlogTag();


            $blogTag->tag = $tag;
            $blogTag->blogId = $blog->id;


            $blogTag->save();


        } // end loop









        return response()->json(['message' => 'Blog has been updated'], 200);






    } // end function








    // --------------------------------------------------------------------------------------------








    public function toggleBlog(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;






        // 1: get instance
        $instance = Blog::find($id);

        $instance->isForWebsite = ! boolval($instance->isForWebsite);

        $instance->save();




        return response()->json(['message' => 'Status has been changed'], 200);



    } // end function













    // --------------------------------------------------------------------------------------------




    public function removeBlog(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        Blog::find($id)->delete();


        return response()->json(['message' => 'Blog has been removed'], 200);



    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function storeBlogSection(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $section = new BlogSection();


        $section->type = $request->type;
        $section->title = $request->title ?? null;
        $section->content = $request->content ?? null;







        // 1.2: imageFiles
        $section->imageFile = $request->imageFileName ?? null;
        $section->secondImageFile = $request->secondImageFileName ?? null;
        $section->thirdImageFile = $request->thirdImageFileName ?? null;
        $section->fourthImageFile = $request->fourthImageFileName ?? null;






        // 1.4: blog
        $section->blogId = $request->blogId;





        $section->save();







        return response()->json(['message' => 'Section has been created'], 200);




    } // end function










    // --------------------------------------------------------------------------------------------


















    public function updateBlogSection(Request $request)
    {




        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: create
        $section = BlogSection::find($request->id);

        $section->type = $request->type;
        $section->title = $request->title ?? null;
        $section->content = $request->content ?? null;





        // 1.2: imageFiles
        $section->imageFile = $request->imageFileName ?? null;
        $section->secondImageFile = $request->secondImageFileName ?? null;
        $section->thirdImageFile = $request->thirdImageFileName ?? null;
        $section->fourthImageFile = $request->fourthImageFileName ?? null;





        $section->save();







        return response()->json(['message' => 'Section has been created'], 200);




    } // end function



















    // --------------------------------------------------------------------------------------------







    public function removeBlogSection(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $id = $request->instance;




        // 1: get instance
        BlogSection::find($id)->delete();


        return response()->json(['message' => 'Section has been removed'], 200);



    } // end function


















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------









    public function updateSocialMedia(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $socialMedia = Social::first();


        $socialMedia->instagramURL = $request->instagramURL ?? null;
        $socialMedia->facebookURL = $request->facebookURL ?? null;
        $socialMedia->twitterURL = $request->twitterURL ?? null;
        $socialMedia->tiktokURL = $request->tiktokURL ?? null;
        $socialMedia->snapchatURL = $request->snapchatURL ?? null;
        $socialMedia->linkedInURL = $request->linkedInURL ?? null;


        $socialMedia->save();






        return response()->json(['message' => 'Links has been updated'], 200);




    } // end function















    // --------------------------------------------------------------------------------------------












    public function updateMailConfiguration(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $configuration = MailConfiguration::first();





        // 1.2: general
        $configuration->username = $request->username ?? null;
        $configuration->password = $request->password ?? null;

        $configuration->port = $request->port ?? null;
        $configuration->mailer = $request->mailer ?? null;
        $configuration->host = $request->host ?? null;
        $configuration->encryption = $request->encryption ?? null;




        // 1.3: sender
        $configuration->senderName = $request->senderName ?? null;
        $configuration->senderEmail = $request->senderEmail ?? null;




        // 1.4: broadcast
        $configuration->broadcastEmail = $request->broadcastEmail ?? null;
        $configuration->broadcastSecondEmail = $request->broadcastSecondEmail ?? null;
        $configuration->broadcastThirdEmail = $request->broadcastThirdEmail ?? null;




        $configuration->save();






        return response()->json(['message' => 'Configuration has been updated'], 200);




    } // end function














    // --------------------------------------------------------------------------------------------












    public function updateProfile(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $profile = Profile::first();





        // 1.2: general
        $profile->fontLinks = $request->fontLinks ?? null;
        $profile->textFont = $request->textFont ?? null;
        $profile->headingFont = $request->headingFont ?? null;




        // 1.3: imageFiles
        $profile->imageFile = $request->imageFileName ?? null;
        $profile->imageFileDark = $request->imageFileDarkName ?? null;




        $profile->save();



        return response()->json(['message' => 'Profile has been updated'], 200);




    } // end function















    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------












    public function updateBlogSettings(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $settings = BlogSetting::first();



        // 1.2: colors
        $settings->textColor = $request->textColor ?? null;
        $settings->bodyColor = $request->bodyColor ?? null;
        $settings->heroBackgroundColor = $request->heroBackgroundColor ?? null;
        $settings->heroTextColor = $request->heroTextColor ?? null;
        $settings->sliderIndicatorColor = $request->sliderIndicatorColor ?? null;

        $settings->cardTitleColor = $request->cardTitleColor ?? null;
        $settings->cardSubtitleColor = $request->cardSubtitleColor ?? null;
        $settings->cardAuthorColor = $request->cardAuthorColor ?? null;
        $settings->cardDateColor = $request->cardDateColor ?? null;
        $settings->cardButtonColor = $request->cardButtonColor ?? null;
        $settings->cardButtonHoverColor = $request->cardButtonHoverColor ?? null;
        $settings->cardButtonBorderColor = $request->cardButtonBorderColor ?? null;
        $settings->cardButtonBorderHoverColor = $request->cardButtonBorderHoverColor ?? null;
        $settings->cardButtonShadowColor = $request->cardButtonShadowColor ?? null;
        $settings->cardButtonShadowHoverColor = $request->cardButtonShadowHoverColor ?? null;





        $settings->hrColor = $request->hrColor ?? null;
        $settings->cursorColor = $request->cursorColor ?? null;
        $settings->cursorSecondaryColor = $request->cursorSecondaryColor ?? null;

        $settings->mobileMenuTextColor = $request->mobileMenuTextColor ?? null;
        $settings->mobileMenuBackgroundColor = $request->mobileMenuBackgroundColor ?? null;

        $settings->singleBlogAuthorColor = $request->singleBlogAuthorColor ?? null;
        $settings->singleBlogNavbarTextColor = $request->singleBlogNavbarTextColor ?? null;
        $settings->singleBlogNavbarBackgroundColor = $request->singleBlogNavbarBackgroundColor ?? null;


        $settings->singleBlogTagColor = $request->singleBlogTagColor ?? null;
        $settings->singleBlogTagHoverColor = $request->singleBlogTagHoverColor ?? null;
        $settings->singleBlogTagTextColor = $request->singleBlogTagTextColor ?? null;
        $settings->singleBlogTagTextHoverColor = $request->singleBlogTagTextHoverColor ?? null;







        // 1.3: features
        $settings->heroPictureRadius = $request->heroPictureRadius ?? null;
        $settings->numberOfColumns = $request->numberOfColumns ?? null;




        // 1.4: alignments
        $settings->cardAlignment = $request->cardAlignment ?? null;
        $settings->heroTextAlignment = $request->heroTextAlignment ?? null;
        $settings->singleBlogHeroAlignment = $request->singleBlogHeroAlignment ?? null;
        $settings->singleBlogSectionTitleAlignment = $request->singleBlogSectionTitleAlignment ?? null;
        $settings->singleBlogSectionContentAlignment = $request->singleBlogSectionContentAlignment ?? null;





        // 1.5: content
        $settings->heroText = $request->heroText ?? null;
        $settings->contentTitleText = $request->contentTitleText ?? null;
        $settings->footerText = $request->footerText ?? null;
        $settings->footerCopyrightsText = $request->footerCopyrightsText ?? null;



        $settings->save();





        return response()->json(['message' => 'Settings has been updated'], 200);




    } // end function















    // --------------------------------------------------------------------------------------------










    public function updateBlogAttachments(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $settings = BlogSetting::first();





        // 1.2: logoFile - heroFiles
        $settings->heroImageFile = $request->heroImageFileName ?? null;
        $settings->heroSecondImageFile = $request->heroSecondImageFileName ?? null;
        $settings->heroThirdImageFile = $request->heroThirdImageFileName ?? null;
        $settings->heroFourthImageFile = $request->heroFourthImageFileName ?? null;


        // 1.3: footerFile
        $settings->footerImageFile = $request->footerImageFileName ?? null;




        $settings->save();





        return response()->json(['message' => 'Attachments has been updated'], 200);




    } // end function












    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------











    public function updateSubscriptionSettings(Request $request)
    {


        // :: root
        $request = json_decode(json_encode($request->all()));
        $request = $request->instance;




        // 1: get instance
        $settings = SubscriptionSetting::first();




        // 1.1: template
        $settings->template = $request->template ?? null;




        // 1.2: colors
        $settings->textColor = $request->textColor ?? null;
        $settings->preloaderLineColor = $request->preloaderLineColor ?? null;

        $settings->cursorColor = $request->cursorColor ?? null;
        $settings->cursorHoverColor = $request->cursorHoverColor ?? null;

        $settings->planCardTitleColor = $request->planCardTitleColor ?? null;
        $settings->planCardSubtitleColor = $request->planCardSubtitleColor ?? null;
        $settings->planCardCaptionColor = $request->planCardCaptionColor ?? null;
        $settings->planCardHrColor = $request->planCardHrColor ?? null;
        $settings->planCardButtonColor = $request->planCardButtonColor ?? null;
        $settings->planCardButtonHoverColor = $request->planCardButtonHoverColor ?? null;

        $settings->navbarMenuColor = $request->navbarMenuColor ?? null;
        $settings->navbarMenuActiveColor = $request->navbarMenuActiveColor ?? null;


        $settings->navbarLinksColor = $request->navbarLinksColor ?? null;
        $settings->navbarLinksHoverColor = $request->navbarLinksHoverColor ?? null;
        $settings->navbarSocialLinksColor = $request->navbarSocialLinksColor ?? null;


        $settings->planSideTitleColor = $request->planSideTitleColor ?? null;
        $settings->planFilterLinksColor = $request->planFilterLinksColor ?? null;
        $settings->planFilterLinksHoverBorderColor = $request->planFilterLinksHoverBorderColor ?? null;
        $settings->planListNumbersColor = $request->planListNumbersColor ?? null;
        $settings->planMealDietColor = $request->planMealDietColor ?? null;
        $settings->planMealsBorderColor = $request->planMealsBorderColor ?? null;
        $settings->planMealsHoverBorderColor = $request->planMealsHoverBorderColor ?? null;
        $settings->planReviewsTitleColor = $request->planReviewsTitleColor ?? null;
        $settings->planActionButtonColor = $request->planActionButtonColor ?? null;




        $settings->sliderLineColor = $request->sliderLineColor ?? null;
        $settings->sliderBulletsColor = $request->sliderBulletsColor ?? null;



        // 2: backgrounds
        $settings->bodyBackgroundColor = $request->bodyBackgroundColor ?? null;

        $settings->planCardBackgroundColor = $request->planCardBackgroundColor ?? null;
        $settings->planCardButtonBackgroundColor = $request->planCardButtonBackgroundColor ?? null;

        $settings->navbarBackgroundColor = $request->navbarBackgroundColor ?? null;

        $settings->planActionButtonBackgroundColor = $request->planActionButtonBackgroundColor ?? null;





        // 3: radius
        $settings->planCardRadius = $request->planCardRadius ?? null;



        // 4: alignments
        $settings->planCardAlignment = $request->planCardAlignment ?? null;



        // 5: extra
        $settings->planSliderArrows = $request->planSliderArrows ?? null;
        $settings->planSideTitleDisplay = $request->planSideTitleDisplay ?? 'inline';



        // 6: hide / show
        $settings->showPlanCustomSection = boolval($request->showPlanCustomSection ?? false);
        $settings->showPlanMealsTypeFilter = boolval($request->showPlanMealsTypeFilter ?? false);





        // 7: custom
        $settings->planCustomSectionVideoURL = $request->planCustomSectionVideoURL ?? null;
        $settings->planCustomSectionTitle = $request->planCustomSectionTitle ?? null;

        $settings->planCustomSectionImageFile = $request->planCustomSectionImageFileName ?? null;
        $settings->planCustomSectionSubtitle = $request->planCustomSectionSubtitle ?? null;
        $settings->planCustomSectionCaption = $request->planCustomSectionCaption ?? null;

        $settings->planCustomSectionSecondImageFile = $request->planCustomSectionSecondImageFileName ?? null;
        $settings->planCustomSectionSecondSubtitle = $request->planCustomSectionSecondSubtitle ?? null;
        $settings->planCustomSectionSecondCaption = $request->planCustomSectionSecondCaption ?? null;

        $settings->planCustomSectionThirdImageFile = $request->planCustomSectionThirdImageFileName ?? null;
        $settings->planCustomSectionThirdSubtitle = $request->planCustomSectionThirdSubtitle ?? null;
        $settings->planCustomSectionThirdCaption = $request->planCustomSectionThirdCaption ?? null;


        $settings->planCustomSectionFourthImageFile = $request->planCustomSectionFourthImageFileName ?? null;
        $settings->planCustomSectionFourthSubtitle = $request->planCustomSectionFourthSubtitle ?? null;
        $settings->planCustomSectionFourthCaption = $request->planCustomSectionFourthCaption ?? null;


        $settings->planCustomSectionFifthImageFile = $request->planCustomSectionFifthImageFileName ?? null;
        $settings->planCustomSectionFifthSubtitle = $request->planCustomSectionFifthSubtitle ?? null;
        $settings->planCustomSectionFifthCaption = $request->planCustomSectionFifthCaption ?? null;


        $settings->planCustomSectionSixthImageFile = $request->planCustomSectionSixthImageFileName ?? null;
        $settings->planCustomSectionSixthSubtitle = $request->planCustomSectionSixthSubtitle ?? null;
        $settings->planCustomSectionSixthCaption = $request->planCustomSectionSixthCaption ?? null;



        $settings->save();






        return response()->json(['message' => 'Settings has been updated'], 200);




    } // end function








} // end controller

