<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $postDBData = post::all();
        return view('admin/post/show', compact('postDBData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $categories = category::all();
        return view('admin/post/post',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'   => 'required',
            'subtitle'=> 'required',
            'slug'    => 'required',
            'body'    => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        if($request->hasFile('image')){

           $imageName = $request->image->store('public');
        }
        
        

        $postData = new post;

        $postData->title = $request->title;

        $postData->subtitle = $request->subtitle;

        $postData->slug = $request->slug;

        $postData->body = $request->body;

        $postData->image = $imageName;

        $postData->status = $request->status;

        $postData->save();

        $postData->tags()->sync($request->tags);
        $postData->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('tags','categories')->where('id',$id)->first();

        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit',compact('tags','categories','post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request,[

            'title'   => 'required',
            'subtitle'=> 'required',
            'slug'    => 'required',
            'body'    => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        if($request->hasFile('image')){

           $imageName = $request->image->store('public');
        }
        

        $postData = post::find($id);

        $postData->title = $request->title;

        $postData->subtitle = $request->subtitle;

        $postData->slug = $request->slug;

        $postData->body = $request->body;

        $postData->image = $imageName;

        $postData->status = $request->status;

        $postData->tags()->sync($request->tags);
        $postData->categories()->sync($request->categories);

        $postData->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();

        return redirect()->back();
        
    }
}
