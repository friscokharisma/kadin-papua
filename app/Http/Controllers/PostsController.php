<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index')
            // return view('dashboard.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());

        // $post = Post::all()->limit(5);
        // return view('posts.index')->with('posts', $posts);

        // return view('index')
        //     ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function articleindex()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(3);
        $latest_post = Post::orderBy('id', 'DESC')->first();

        return view('article.index', compact('posts', 'latest_post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardindex()
    {
        // return view('article.index')
        return view('dashboard.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());

        // $post = Post::all()->limit(5);
        // return view('posts.index')->with('posts', $posts);

        // return view('index')
        //     ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('article.create');
        return view('dashboard.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName); //Image path save

        // $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/dashboard')
            ->with('message', 'Berhasil menambahkan artikel!');

        // return redirect('/article')
        //     ->with('message', 'Berhasil menambahkan artikel!');

        //$newImageName only upload image name, not the actual image
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail('id');

        return view('article.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('dashboard.edit')
            ->with('post', Post::where('slug', $slug)->first());
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
        // Update image still doesn't work

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                // 'image_path' => $newImageName,  //It should be work to update image
                'user_id' => auth()->user()->id
            ]);

        return redirect('/dashboard')
            ->with('message', 'Berhasil mengubah artikel!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/dashboard')
            ->with('message', 'Berhasil menghapus artikel!');
    }
}
