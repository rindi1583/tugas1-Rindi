<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function register(Request $request){
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        $validasi['password'] =  bcrypt(($request['password']));
        $result = User::create($validasi);
        if($result){
            return $this->sendSuccess($result, 'User berhasil ditambahkan', 201);
        }
        else{ 
            return $this->sendError('', 'User gagal ditambah', 400);
        }
    }

    public function login(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = Auth::user();
            $result['token'] = $user->createToken('MI5AApp')->plainTextToken;
            return $this->sendSuccess($result, 'user berhasil login', 200);
            
            }else{ 
                return $this->sendError([], 'email atau password salah', 400);
        }
    }
}
