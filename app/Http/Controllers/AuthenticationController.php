<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    public function authentication(Request $request)
    {
        if(!$request->isJson())
        {
            return response("Recurso denegado", 401);
        }

        $user = User::where('email', '=', $request->email)->first();

        if( !Hash::check($request->password, $user->password) )
        {
            return response()->json([
                'message' => 'Recurso denegado'
            ],401);
        }
        else
        {
            $user->bearer_token = Str::random(200);
            $user->save();

            return response()->json([
                "bearer_token" => $user->bearer_token
            ], 201);
        }
    }

}
        