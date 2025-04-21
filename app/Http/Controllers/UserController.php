<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function StoreUsersFromApi()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if (!$response->successful()) {
            return response()->json(['message' => 'Lỗi gọi API'], 500);
        }

        $users = $response->json();

        $operations = array_map(function ($user) {
            return [
                'updateOne' => [
                    ['id' => $user['id']],
                    [
                        '$set' => [
                            'name' => $user['name'],
                            'username' => $user['username'],
                            'email' => $user['email'],
                            'phone' => $user['phone'],
                            'website' => $user['website'],
                            'address' => [
                                'street' => $user['address']['street'],
                                'suite' => $user['address']['suite'],
                                'city' => $user['address']['city'],
                                'zipcode' => $user['address']['zipcode'],
                                'geo' => [
                                    'lat' => $user['address']['geo']['lat'],
                                    'lng' => $user['address']['geo']['lng'],
                                ],
                            ],
                            'company' => [
                                'name' => $user['company']['name'],
                                'catchPhrase' => $user['company']['catchPhrase'],
                                'bs' => $user['company']['bs'],
                            ],
                        ],
                    ],
                    ['upsert' => true],
                ],
            ];
        }, $users);

        $collection = DB::connection('mongodb')
            ->getMongoClient()
            ->selectDatabase('postdb')
            ->selectCollection('user_apis');

        $collection->bulkWrite($operations);

        return response()->json(['message' => 'Lưu dữ liệu người dùng thành công']);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $data = $request->all();
        // Nếu model sử dụng kiểu JSON cho address và company
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'address' => $data['address'],       // phải là JSON casted field
            'company' => $data['company'],       // phải là JSON casted field
        ]);

        return redirect()->route('users.index')->with('status', 'Thêm thành công!');
    }

    public function show(string $id)
    {
        $users = User::find($id);
        return view('users.show', compact('users'));
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
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

        $users = User::find($id);
        $data = $request->all();

        $users->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'address' => $data['address'],
            'company' => $data['company'],
        ]);

        return redirect()->route('users.index')->with('status', 'Cập nhật thành công!');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Xóa thành công!');
    }
}
