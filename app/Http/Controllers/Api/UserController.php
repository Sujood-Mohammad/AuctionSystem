<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function getUser()
        {
            $user = Auth::user();
            if ($user) {
                return response()->json([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'type' => $user->type, 
                ]);
            }

            return response()->json(['message' => 'Unauthorized'], 401);
        }
}
