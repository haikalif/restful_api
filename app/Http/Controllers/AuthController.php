<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\Message;

class AuthController extends Controller
{
    public function register(Request $request) // register
    {

        //untuk memvalidasi inputan dari user, kita menggunakan method validate() yang disediakan oleh Laravel. Method ini akan memeriksa apakah inputan yang diberikan sesuai dengan aturan yang telah ditentukan. Jika inputan tidak valid, maka akan mengembalikan response error secara otomatis.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|'
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
            'user' => $user
        ], 201);
    }

    public function login(request $request)
    { //login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = user::where('email', $request->email)->first(); //check apakah email atau password tersedia
        if (!$user || !Hash::check($request->password, $user->password)) { //cek jika nilai user dan password false, langsung tolak
            return response()->json([
                'message' => 'Email atau password salah atau tidak di temukan',

            ], 401);
        }

        $token = $user->createToken('kartu akses')->plainTextToken; //membuat token dan memberikan ke setiap user yang berhasil login

        return response()->json([
            'message' => 'token valid dan berhasil login',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    Public function logout(Request $request){

    $takeToken = $request->user()->currentAccessToken()->delete();

    return response()->json([
        'Message' => 'logout berhasil atau token sudah terhapus',
        'data' => $takeToken
    ]);
    }
}
