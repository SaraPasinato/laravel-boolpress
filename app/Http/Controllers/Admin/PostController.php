<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // ddd(Auth::user()->userInfo);

        $posts= Post::orderBy('id','desc')->paginate(10);
        $categories=Category::all();
      
        
        return view('admin.posts.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories= Category::all();
        $tags=Tag::all();
        return view('admin.posts.create',compact('tags','post','categories'));
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
            'title' => 'required|unique:posts|string|min:3|max:500',
            'content'=>'required|string',
            'image'=>'string',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'nullable|exists:tags,id',
        ],[
            'required'=>'il campo :attribute è obbligatorio',
            'min'=>'il minimo dei caratteri per il campo :attribute è :min',
            'title:required'=>'Il titolo esiste già',
        ]);

        $data =$request->all();
        $data['user_id']=Auth::id();
        $post=new Post();

        $post->fill($data);
        $post->slug=Str::slug($post->title,'-');
        $post->save();

        if(array_key_exists('tags',$data)) $post->tags()->attach($data['tags']);
        return redirect()->route('admin.posts.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=Tag::all();
        $categories= Category::all();
        $tagIds=$post->tags->pluck('id')->toArray();
        return view('admin.posts.edit',compact('tags','tagIds','post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required',Rule::unique('posts')->ignore($post->id),'string','min:3','max:500'],
            'content'=>'required|string',
            'image'=>'string',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'nullable|exists:tags,id',
        ],[
            'required'=>'il campo :attribute è obbligatorio',
            'min'=>'il minimo dei caratteri per il campo :attribute è :min',
            'title:required'=>'Il titolo esiste già',
        ]);

        $data = $request->all();

        $post->slug=Str::slug($data['title'],'-');

        if(!array_key_exists('tags',$data)) $post->tags()->detach();
        else
            $post->tags()->sync($data['tags']);

        $post->update($data);

        return redirect()->route('admin.posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(count($post->tags)) $post->tags()->detach();
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('alert-msg','post cancellato con successo')->with('alert-type','danger');
    }
}
