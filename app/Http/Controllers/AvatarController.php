<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    protected $avatar;

    public function __construct(Avatar $avatar){
        $this->middleware('auth');
        $this->avatar = $avatar;
    }

    public function addAvatar(Request $request){

        //$user = Auth::user();

        $this->validate($request, [
            'nickname' => 'unique:avatars|min:6'
        ]);

        $avatar = $this->avatar->addAvatarInTheModel($request);

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
