<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /* $users = Posts::orderBy('created_at','desc')->paginate(2);
        return view('posts.index')->with('posts',$users); */
        //$posts = Posts::sortable()->paginate(2);
        //return view('posts.index')->with('posts',$posts);

        //
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $posts = Posts::sortable()
                ->where('posts.post_title', 'like', '%'.$filter.'%')
                ->paginate(2);
        } else {
            $posts = Posts::sortable()
                ->paginate(2);
        }
    
        return view('posts.index')->with('posts', $posts)->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::put('modal_post', 'modal_post');
        $post = new Posts;
		$post->post_title= $request->input('post_title');
        $post->post_body = $request->input('post_body');
        if($request->input('is_published')=='on'){
            $post->is_published = 1;
        }else{
            $post->is_published = 0;
        }
        $post->created_by = auth()->user()->id;
        //print_r($post); exit;
        $request->validate([
            'post_title' => 'required',
            'post_body' => 'required',
        ]);
    
        $post->save();
     
        return redirect()->route('posts.index')
                        ->with('success','Posts created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * * @param  int  $id
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        //
       /*  $post = Post::find($id);
        //to check the correct user to edit
        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with ('error','Unauthorized page.');
        } */
        return view('posts/edit')->with ('post',$post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'post_body' => 'required',
            'post_title' => 'required',
        ]);
        $post =  Posts::find($id);
        $post->post_title= $request->input('post_title');
        $post->post_body = $request->input('post_body');
        if($request->input('is_published')=='on'){
            $post->is_published = 1;
        }else{
            $post->is_published = 0;
        }
        $post->updated_by = auth()->user()->id;
        $post->updated_at = date("Y-m-d H:i:s");
        $post->updated_by = auth()->user()->id;

        $post->save();
    
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        //
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
