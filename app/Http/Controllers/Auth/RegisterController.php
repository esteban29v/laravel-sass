<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }


    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'res' => true,
            'msg' => 'Usuario creado correctamente'
        ], 200);
    }
}
