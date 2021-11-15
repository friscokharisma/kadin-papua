<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('posts.index', compact('posts'));
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
        $request->validate([
            'title' => 'required|max:100',
            'file' => 'file|image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('file')) {
            // get the image file
            $file = $request->file('file');
            $file_name = time() . "." . $file->getClientOriginalExtension();

            // saving the image
            $image = $file->storeAs('images/articles', $file_name);
        }

        $article = new Post();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->content ?? null;
        $article->image_path = $image ?? null;

        $article->save();

        $article->users()->attach(Auth::user()->id);

        flash('Success! Article has been created!')->success();

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Post::findOrFail($id);
        $editor = $article->users->first();
        // dd($editor);

        return view('posts.show', compact('article', 'editor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Post::findOrFail($id);

        return view('posts.edit', compact('article'));
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
        $request->validate([
            'title' => 'required|max:100',
            'file' => 'file|image|mimes:jpeg,png,jpg'
        ]);

        $article = Post::findOrFail($id);

        if ($request->hasFile('file')) {
            // delete previous image
            if ($article->image_path != null) {
                Storage::delete($article->image_path);
            }

            // get the image file
            $file = $request->file('file');
            $file_name = time() . "." . $file->getClientOriginalExtension();

            // saving the image
            $image = $file->storeAs('images/articles', $file_name);
        }

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->content ?? null;
        $article->image_path = $image ?? $article->image_path;

        $article->save();

        $article->users()->attach(Auth::user()->id);

        flash('Success! Article has been edited!')->success();

        return redirect()->route('articles.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Post::findOrFail($id);
        // delete file in storage
        Storage::delete($article->image_path);

        // delete data in database
        $article->delete();

        flash('Success! The article has been deleted')->success();
        return redirect()->route('articles.index');
    }
}
