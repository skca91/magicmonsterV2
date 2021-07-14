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
        if($countVictims > 2) return "ERROR ya esta 3 veces ";

        $avatar = NULL;
        $user = User::where('id', $user_id)->first();


        $victim = new Victim;
        $victim->user()->associate($user->id);
        $victim->avatar()->associate($avatar_id);
        $victim->exp = $exp;
        $victim->evolution = $evolution;
        $victim->save();

       // return new VictimaResource($victim);
    }
}
