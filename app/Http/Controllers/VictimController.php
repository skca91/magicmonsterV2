<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use App\Models\Victim;

use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addVictim(Request $request){

        $user_id = $request->input('user_id');
        $avatar_id = $request->input('avatar_id');
        $exp = $request->input('exp');
        $evolution = $request->input('evolution');

        $countVictims = Victim::where('user_id', $user_id)->count();
        if($countVictims > 2) return "error is already 3 times";

        $user = User::where('id', $user_id)->first();
        $avatar = Avatar::where('id', $avatar_id)->first();

        if(!$user || !$avatar){
            return response()->json([
                'status' => 'error',
                'message' => 'the victim cannot be added'
            ], 404);
        }

        $victim = new Victim;
        $victim->user()->associate($user->id);
        $victim->avatar()->associate($avatar_id);
        $victim->exp = $exp;
        $victim->evolution = $evolution;
        $victim->save();

        if($victim){
            return response()->json([
                'status' => 'success',
                'message' => 'the victim was successfully added'
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'the victim cannot be added'
            ], 404);
        }
       
    }
}
