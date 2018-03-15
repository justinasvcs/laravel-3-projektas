<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\PostRequest;

use App\Post;
use Auth;

class PostsController extends Controller
{
    // CRUD
    // Create: create(), store()
    // Read: index(), single($id)
    // Update: edit($id), update()
    // Delete: destroy($id)

    public function index()
    {
        $date = date('Y-m-d');

//        $query = DB::table('posts'); // `SELECT * FROM posts`
//        $posts = $query->get();

        $user = Auth::user('email');
        $posts = $user->posts()->paginate(3);

//        $posts = Post::paginate(3);

        // SELECT * FROM posts ORDER BY id DESC
        // SELECT * FROM posts ORDER BY id DESC LIMIT 10
        // SELECT * FROM posts ORDER BY id DESC LIMIT 10 OFFSET 5

//        dd(
//            $posts->count(),
//            $posts->first(),
//            $posts->last()
//        );

        $data = [
            'todayDate' => $date,
            'posts' => $posts
        ];

        return view('posts.index', $data);
    }

    public function single($id)
    {
        $post = Post::findOrFail($id);

        // SELECT * FROM posts WHERE id = $id

        return view('posts.single')->with('post', $post);
    }

    public function create()
    {
        $data = \App\Product::all();

        return view('posts.create')->with('products', $data);
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->draft = $request->input('draft');
//        $post->user_id = Auth::id();

        // TODO: išsaugoti relationshipą naudodamas
        // User objektą
        // Auth::user()

        $user = Auth::user();
        $post = $user->posts()->save($post);

        $post->products()->attach($request->input('products'));
        // update atveju naudojamas "sync" vietoje "attach"

        return redirect('/posts')->with('message', 'Įrašas sėkmingai išsaugotas!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->fill($request->input());
        $post->save();

        return redirect('/posts/' . $id)->with('message', 'Įrašas sėkmingai atnaujintas');
    }

    public function destroy($id)
    {
        // 1 budas
        $post = Post::findOrFail($id);
        $post->delete();

        // 2 budas
//        Post::destroy($id);

        return redirect('/posts')->with('message', 'Įrašas sėkmingai ištrintas');
    }
}