<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $credentials = $request->validate([
            'name'=>['required'],
            'password'=>['required'],
        ]);

        if(auth()->attempt($credentials)) {
            $user = auth()->user();

            return (new UserResource($user))->additional([
                'token'=>$user->createToken('myAppToken')->plainTextToken,
            ]);
        }

        return response()->json([
            'msg'=>'Credential Anda Tidak Cocok ',
        ], 401);
    }
}
