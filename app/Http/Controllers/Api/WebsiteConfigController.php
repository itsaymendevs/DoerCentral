<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSection;
use App\Models\BlogTag;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class WebsiteConfigController extends Controller
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

        $blog->publishDate = $this->getCurrentDate();




        // 1.2: imageFiles
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
        $blog->author = $request->author;
        $blog->subtitle = $request->subtitle;




        // 1.2: imageFiles
        if ($request->imageFile)
            $blog->imageFile = $request->imageFileName;


        if ($request->headerImageFile)
            $blog->headerImageFile = $request->headerImageFileName;





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
        BlogSection::find($id)->delete();


        return response()->json(['message' => 'Blog has been removed'], 200);



    } // end function

















} // end controller

