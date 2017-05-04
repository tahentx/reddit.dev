<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use Session;
use Log;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct ()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        if ($request->has('search')){
            $posts = 
            Post::join('users', 'created_by', '=', 'users.id')
            ->where('title', 'LIKE', "%$request->search%") 
            ->orWhere('name', 'LIKE', "%$request->search%") 
            ->orderBy('created_by', 'ASC')
            ->paginate(4);
        } else {
            $posts = Post::orderBy('created_at', 'ASC')->paginate(4); 
        }

        $data = [];
        $data['posts'] = $posts;

        return view('posts.index')->with($data);
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
        $this->validate($request, $rules);

        $post = new Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = User::all()->random()->id;
        $post->save();

        Log::info("New post saved", $request->all());
        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::find($id);

       if (!$post){
        Log::error("Post with id of $id not found.");
        abort(404);
       }

        $post = ['post' => $post];
        return view('posts.show', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }
        
        $data = [];
        $data['post'] = $post;
        return view('posts.edit')->with($data);
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

         $post = Post::find($id);
         
        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

         $post->title = $request->title;
         $post->url = $request->url;
         $post->content = $request->content;
         $post->created_by = $request->created_by;
         $post->save();

         $request->session()->flash('successMessage', 'Post updated successfully');
         
         return redirect()->action('PostsController@show', [$post->id]);
    }

    public function selectNewPost ($id)
    {
            dd(Post::where('id','>',3)->where('created_by','=','2')->orderBy('created_at')->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }
        
        $post->delete();
         $request->session()->flash('successMessage', 'Post deleted successfully');
        return view('posts.index');
    }
}
