<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::paginate(10);

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create',compact('post'));
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
            'title' => 'require|unique:posts|string|min:3|max:100',
            'description'=>'require|string',
            'image'=>'string'
        ],[
            'required'=>'il campo :attribute è obbligatorio',
            'min'=>'il minimo dei caratteri per il campo :attribute è :min',
            'title:required'=>'Il titolo esiste già',
        ]);
        $data= $request()->all();

        $post=new Post();

        $post->fill($data);
        $post->slug=Str::slug('title','-');
        $post->save();

        return redirect()->route('admin.posts.show',$post);

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
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $newPost)
    {
        $request->validate([
            'title' => ['require',Rule::unique('posts')->ignore($newPost->id),'string','min:3','max:100'],
            'description'=>'require|string',
            'image'=>'string'
        ],[
            'required'=>'il campo :attribute è obbligatorio',
            'min'=>'il minimo dei caratteri per il campo :attribute è :min',
            'title:required'=>'Il titolo esiste già',
        ]);
        $data = $request()->all();

        $newPost->fill($data);
        $newPost['slug']=Str::slug($data['title'],'-');
        $newPost->save($data);

        return redirect()->route('admin.posts.show',$newPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('alert-msg','post cancellato con successo')->with('alert-type','danger');
    }
}
