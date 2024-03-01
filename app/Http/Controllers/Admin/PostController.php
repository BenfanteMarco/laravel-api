<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use App\Models\Technology;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        // if($request->hasFile('cover_image')){
        //     $path = Storage::disk('public')->put('posts_image', $form_data['cover_image']);
        //     $form_data['cover_image'] = $path;
        // }

        $form_data = $request->all();
    
        $post = new Post();

        if($request->hasFile('cover_image')){
            // dump($request->cover_image);
            $path = Storage::disk('public')->put('posts_image', $form_data['cover_image']);
            $form_data['cover_image'] = $path;
        }
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;
        $post->fill($form_data);

        $post->save();

        if ($request->has('technology')){
            $post->technologies()->attach($form_data['technology']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->all();

        if($request->hasFile('cover_image')){
            if($post->cover_image != null){
                Storage::delete($post->cover_image);
            }
            $path = Storage::disk('public')->put('posts_image', $form_data['cover_image']);
            $form_data['cover_image'] = $path;
        }

        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;
        $post->update($form_data);

        if ($request->has('technology')){
            $post->technologies()->sync($form_data['technology']);
        }

        return redirect()->route('admin.posts.index', ['post' =>  $post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->cover_image != null){
            Storage::delete($post->cover_image);
        }
        $post->technologies()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
