<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //choosing post by title
        //return Post::where('title','Post Two')->get();
        //using sql query
        //$posts = DB::select('SELECT * FROM posts');
        //taking only one data from array
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        
        //pagination
        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('posts.index')->with('posts',$posts);
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
        //validate the data
        $this->validate($request,[
            'title' =>'required|max:255',
            'body' =>'required',
        ]);
        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->body =$request->body;
        $post->user_id =auth()->user()->id;    

        $post->save();
        
        //flash message
        Session::flash('success','this blog post wsa seccessfully saved');

        //redirect to another page
        return redirect()->route('posts.show',$post->id);
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
        $post = Post::find($id);
        if (!$post) {
            Session::flash('success','this blog post was not found');
            return redirect()->route('posts.index');
        }
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post =Post::find($id);
        return view('posts.edit')->with('post',$post);
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
        //validate the data
        $this->validate($request,[
            'title' =>'required|max:255',
            'body' =>'required',
        ]);
        //store in the database
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body =$request->body;    

        $post->save();
        
        //flash message
        Session::flash('success','this blog post wsa seccessfully updated');

        //redirect to another page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','this blog post was seccessfully deleted');
        return redirect()->route('posts.index');

    }
}
