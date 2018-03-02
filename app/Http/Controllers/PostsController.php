<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\PostRequest;

use App\Post;

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

        $posts = Post::all();



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
//        $post = DB::table('posts')->find($id);
//
//        if ($post == null) {
//            abort(404);
//        }

        $post = Post::findOrFail($id);

        // SELECT * FROM posts WHERE id = $id

        return view('posts.single')->with('post', $post);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $data = request()->input();

        unset($data['_token']);

//        DB::table('posts')->insert($data);

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->author = $data['author'];
        $post->draft = $data['draft'];

        $post->save();

        return redirect('/posts')->with('message', 'Įrašas sėkmingai išsaugotas!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, $id)
    {
        $data = request()->input();

        unset($data['_token'], $data['_method']);

//        DB::table('posts')->where('id', $id)->update($data);

        $post = Post::findOrFail($id);

        $post->fill($data);
        $post->save();

        return redirect('/posts/' . $id)->with('message', 'Įrašas sėkmingai atnaujintas');
    }

    public function destroy($id)
    {
//        DB::table('posts')->where('id', $id)->delete();

        // 1 budas
        $post = Post::findOrFail($id);
        $post->delete();

        // 2 budas
//        Post::destroy($id);

        // DELETE FROM posts WHERE id = $id

        return redirect('/posts')->with('message', 'Įrašas sėkmingai ištrintas');
    }
}