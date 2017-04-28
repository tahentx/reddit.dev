<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4);    
        return view('posts.index')->with(array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
        'first_name' => 'required|max:100',
        'description'   => 'required',
        'subscribed'   => 'required',
        'school_name'   => 'required'
        );

       $this->validate($request, $rules);

       $posts = new \App\Models\Student();
       $posts->first_name = $request->first_name;
       $posts->description = $request->description;
       $posts->subscribed = $request->subscribed;
       $posts->school_name = $request->school_name;
       $posts->save();

       return redirect()->action('PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = \App\Models\Post::all();
        $data = ['posts' => $posts];
        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = \App\Models\Post::find($id);
        return view('posts.edit')->with('posts', $posts);   
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
        $rules = [
             'title' => 'required|max:100',
             'url'   => 'required|url',
             'content'   => 'required',
         ];
 
         $this->validate($request, $rules);

         $post = \App\Models\Post::find($id);
         $post->title = $request->title;
         $post->url = $request->url;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = \App\Models\Post::find($id);
        $posts->delete;
        return view('posts.show');
    }
}
