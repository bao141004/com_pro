<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index(){
        $posts = Post::all();

        if ($posts ->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'khong co bai viet nao',
                'data' => [],
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'lay danh sach bai viet thanh cong',
            'data' => $posts,
        ], 200);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'userId' => 'required', 
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::create($validated);
        if ($post) {
            return response()->json([
                'status'=>true ,
                'message' => 'them thanh cong',
                'data' => $post
            ], 201);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'them khong thanh cong',
            ], 500);
        }
    }
    public function show(string $id){
        $posts = Post::find($id);
        if ($posts) {
            return response()->json([
                'status'=>true ,
                'message' => 'hien thi thanh cong',
                'data' => $posts
            ], 201);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'hien thi khong thanh cong' .$id,
            ], 404);
        }
    }
    public function update(Request $request, string $id){
        $posts = Post::find($id);
        if (!$posts) {
            return response()->json([
                'status'=>false ,
                'message' => 'khong tim thay bai viet voi ID' .$id
            ], 404);
        }

        $validated = $request->validate([
            'userId' => 'required', 
            'title' => 'required',
            'body' => 'required'
        ]);

        $posts->update($validated);

        if ($posts) {
            return response()->json([
                'status'=>true ,
                'message' => 'sua thanh cong',
                'data' => $posts
            ], 200);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'sua khong thanh cong',
            ], 500);
        }
    }   
    public function destroy(string $id){
        $posts = Post::find($id);
        if (!$posts) {
            return response()->json([
                'status'=>false ,
                'message' => 'khong tim thay bai viet voi ID' .$id
            ], 404);
        }

        $deleted = $posts->delete();

        if ($deleted) {
            return response()->json([
                'status'=>true ,
                'message' => 'xoa thanh cong'
            ]);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'xoa khong thanh cong',
            ], 500);
        }
    }
}
