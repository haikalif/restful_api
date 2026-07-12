<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) // register
    {

        //untuk memvalidasi inputan dari user, kita menggunakan method validate() yang disediakan oleh Laravel. Method ini akan memeriksa apakah inputan yang diberikan sesuai dengan aturan yang telah ditentukan. Jika inputan tidak valid, maka akan mengembalikan response error secara otomatis.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);


        //masukan data user baru ke table 'user'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // mengirim data user berupa json
        return response()->json([
            'message' => 'akun berhasil di buat',
            'user' => '$user'
        ]);
    }

   
}
