<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'asc')->get();
        
        if ($blog){
            return send_response("Success" , BlogResource::collection($blog));
        }else{
            return send_error('Data not Found !!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "blogTitle" => "required|min:10|max:255",
            "blogContent" => "required|min:10",
            "blogImage" => "required",
        ]);

        if($validator->fails()){
            // this function called from Helpers/function.php file
            return send_error('Validation Error', $validator->errors(), 422);
        }
        try {

            $blog = Blog::create([
                "blogTitle" => $request->blogTitle,
                "blogContent" => $request->blogContent,
                "blogImage" => $request->blogImage,
                "blogCategory" => $request->blogCategory,
            ]);

            return send_response("Blog Create Successfully" , new BlogResource($blog));

        }catch(Exception $e ){
            return send_error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        
        if ($blog){
            return send_response("Success" , new BlogResource($blog));
        }else{
            return send_error('Blog Data not Found !!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(),[
            "blogTitle" => "required|min:10|max:255",
            "blogContent" => "required|min:10",
            "blogImage" => "required",
        ]);

        if($validator->fails()){
            // this function called from Helpers/function.php file
            return send_error('Validation Error', $validator->errors(), 422);
        }

        try {

            $blog->blogTitle = $request->blogTitle;
            $blog->blogContent = $request->blogContent;
            $blog->blogImage = $request->blogImage;

            return send_response("Blog Update Successfully" , new BlogResource($blog));

        }catch(Exception $e ){
            return send_error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $blog = Blog::find($id);
        
            if ($blog){
                $blog->delete();
            }
            
            return send_response("Blog Deleted Successfully" , []);
            
        }catch(Exception $e ){
            return send_error($e->getMessage(), $e->getCode());
        }
    }
}
