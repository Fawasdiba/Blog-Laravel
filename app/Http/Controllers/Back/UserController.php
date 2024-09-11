<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() 
    {
        // Hanya admin yang dapat melihat semua pengguna
        $users = (auth()->user()->role == 1) ? User::all() : User::whereId(auth()->user()->id)->get();
        
        return view('back.user.index', ['users' => $users]);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/back/picture', $fileName);
            $data['img'] = $fileName;
        }

        User::create($data);

        return back()->with('success', 'User successfully created');
    }


    public function update(UserUpdateRequest $request, $id)
    {
    $data = $request->validated();

    // Cek jika ada file gambar baru yang diunggah
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back/picture', $fileName);

        // Hapus gambar lama jika ada
        if ($request->oldImg) {
            Storage::delete('public/back/picture/' . $request->oldImg);
        }

        $data['img'] = $fileName;
       } else {
        // Tetap gunakan gambar lama jika tidak ada gambar baru
        $data['img'] = $request->oldImg;
       }

        // Periksa dan update password jika ada
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Update data pengguna
        User::find($id)->update($data);

        return back()->with('success', 'User successfully updated');
}

    public function destroy($id)
    {
        // Hanya admin atau pengguna yang bersangkutan yang dapat menghapus
        if (auth()->user()->role != 1 && auth()->user()->id != $id) {
            return back()->with('error', 'You do not have permission to delete this user.');
        }

        User::find($id)->delete();

        return back()->with('success', 'User successfully deleted');
    }
}
