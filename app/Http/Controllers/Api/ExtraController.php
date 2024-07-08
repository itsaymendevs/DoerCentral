<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogReference;
use App\Models\BlogSection;
use App\Models\BlogTag;
use App\Models\Social;
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




        // 1: create
        $socialMedia = Social::first();


        $socialMedia->instagramURL = $request->instagramURL ?? null;
        $socialMedia->facebookURL = $request->facebookURL ?? null;
        $socialMedia->twitterURL = $request->twitterURL ?? null;
        $socialMedia->linkedInURL = $request->linkedInURL ?? null;


        $socialMedia->save();






        return response()->json(['message' => 'Links has been updated'], 200);




    } // end function






    // --------------------------------------------------------------------------------------------













} // end controller

