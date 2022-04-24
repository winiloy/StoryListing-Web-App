<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;

class PostController extends Controller
{

public function __construct()
{
    $this->middleware('auth',['except'=>['index','show']]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $search = $request['search'] ?? "";
        if($search!=""){
            return view('blog.index')
            ->with('posts',Post::where('title','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%")->paginate(4));
        }
        else{
            return view('blog.index')
        ->with('posts',Post::orderBy('updated_at','DESC')->paginate(4));

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
            'title'=>'required',
            'description'=>'required',
      ]);

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class,'slug',$request->title),
            'user_id'=>auth()->user()->id,
            'time'=>$request->input('time'),
        ]);

        return redirect('/blog')->with('message','Your story has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
       return view('blog.show')
       ->with('post',Post::where('slug',$slug)->first());
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        return view('blog.edit')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            
      ]);
       Post::where('slug',$slug)->update([
        'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class,'slug',$request->title),
            'user_id'=>auth()->user()->id,
            'time'=>$request->input('time'),
       ]);

       return redirect('/blog')
       ->with('message','Your story has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $post = Post::where('slug',$slug);
       $post->delete();

       return redirect('/blog')
       ->with('message','Your story has been deleted!');
    }
}


