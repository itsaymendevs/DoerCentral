<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSection;
use App\Models\BlogTag;
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
        $blog->author = $request->author;
        $blog->subtitle = $request->subtitle;
        $blog->summary = $request->summary ?? null;


        $blog->publishDate = $this->getCurrentDate();
        $blog->isCenter = $request->isCenter ?? false;
        $blog->isDarkMode = $request->isDarkMode ?? false;




        // 1.2: imageFiles
        $blog->imageFile = $request->imageFileName ?? null;
        $blog->mobileImageFile = $request->mobileImageFileName ?? null;
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
        $blog->author = $request->author;
        $blog->subtitle = $request->subtitle;
        $blog->summary = $request->summary ?? null;


        $blog->isCenter = $request->isCenter ?? false;
        $blog->isDarkMode = $request->isDarkMode ?? false;



        // 1.2: imageFiles
        $blog->imageFile = $request->imageFileName ?? null;
        $blog->mobileImageFile = $request->mobileImageFileName ?? null;
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

        $section->title = $request->title ?? null;
        $section->content = $request->content ?? null;




        // 1.2: imageFiles
        $section->sideImageFile = $request->sideImageFileName ?? null;
        $section->bottomImageFile = $request->bottomImageFileName ?? null;




        // 1.3: isCenter
        $section->isCenter = $request->isCenter ?? false;




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

        $section->title = $request->title ?? null;
        $section->content = $request->content ?? null;




        // 1.2: imageFiles
        $section->sideImageFile = $request->sideImageFileName ?? null;
        $section->bottomImageFile = $request->bottomImageFileName ?? null;




        // 1.3: isCenter
        $section->isCenter = $request->isCenter ?? false;




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











} // end controller

