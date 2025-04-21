<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function StoreApi(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        if($response->successful()) {
            $posts = $response->json();

            foreach ($posts as $item) {
                Post::updateOrCreate(
                    ['id' => $item['id']],
                    [
                        'userId' => $item['userId'],
                        'title' => $item['title'],
                        'body' => $item['body']
                    ]
                );
            }

            return response()->json(['message' => 'luu tru du lieu thanh cong']);
        }

        return response()->json(['message' => 'luu tru du lieu khong thanh cong'], 500);
    }

    public function index()
    {
        $post = Post::all(); //paginate(10)
        return view('posts.index',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required', 
            'title' => 'required',
            'body' => 'required'
        ]);
        Post::create([
            'userId' => $request->userId,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect('posts')->with('status','them thanh cong');
    }

    public function show(string $id)
    {
        $posts = Post::find($id);
        return view('posts.show', compact('posts'));
    }

    public function edit(string $id)
    {
        $posts = Post::find($id);
        return view('posts.edit', compact('posts'));
    }

    public function update(Request $request, string $id)
    {
        $posts = Post::find($id);
        $request->validate([
            'userId' => 'required', 
            'title' => 'required',
            'body' => 'required'
        ]);
        $posts->update([
            'userId' => $request->userId,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect('posts')->with('status','them thanh cong');

    }

    public function destroy(string $id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect('posts')->with('status', 'xoa thanh cong');
    }
}
