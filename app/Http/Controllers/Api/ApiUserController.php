<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        if ($users ->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'khong co user nao',
                'data' => [],
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'lay danh sach user thanh cong',
            'data' => $users,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'required',
            'address.street' => 'required',
            'address.suite' => 'required',
            'address.city' => 'required',
            'address.zipcode' => 'required',
            'address.geo.lat' => 'required',
            'address.geo.lng' => 'required',    
            'company.name' => 'required',
            'company.catchPhrase' => 'required',
            'company.bs' => 'required',
        ]);
        
        $user = User::create($validated);
        if ($user) {
            return response()->json([
                'status'=>true ,
                'message' => 'them thanh cong',
                'data' => $user
            ], 201);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'them khong thanh cong',
            ], 500);
        }
    }

    public function show(string $id)
    {
        $users = User::find($id);
        if ($users) {
            return response()->json([
                'status'=>true ,
                'message' => 'hien thi thanh cong',
                'data' => $users
            ], 201);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'hien thi khong thanh cong' .$id,
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        if (!$users) {
            return response()->json([
                'status'=>false ,
                'message' => 'khong tim thay user voi ID' .$id
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'required',
            'address.street' => 'required',
            'address.suite' => 'required',
            'address.city' => 'required',
            'address.zipcode' => 'required',
            'address.geo.lat' => 'required',
            'address.geo.lng' => 'required',
            'company.name' => 'required',
            'company.catchPhrase' => 'required',
            'company.bs' => 'required',
        ]);

        $users->update($validated);

        if ($users) {
            return response()->json([
                'status'=>true ,
                'message' => 'sua thanh cong',
                'data' => $users
            ], 200);
        }else{
            return response()->json([
                'status'=>false ,
                'message' => 'sua khong thanh cong',
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        $users = User::find($id);
        if (!$users) {
            return response()->json([
                'status'=>false ,
                'message' => 'khong tim thay user voi ID' .$id
            ], 404);
        }

        $deleted = $users->delete();

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
