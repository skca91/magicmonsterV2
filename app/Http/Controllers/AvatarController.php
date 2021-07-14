<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function addAvatar(Request $request){

        $this->validate($request, [
            'nickname' => 'unique:avatars|min:6'
        ]);

        $nickname = $request->input('nickname');

        $avatar = New Avatar();
        $avatar->nickname = $nickname;
        $avatar->exp = 0;
        $avatar->save();

        if($avatar){
            
            return response()->json([
                'status' => 'success',
                'message' => 'Avatar created successfully'
            ], 201);
        
        }else{

            return response()->json([
                'status' => 'error',
                'message' => 'Avatar not created'
            ], 404);

        }

    }
}
