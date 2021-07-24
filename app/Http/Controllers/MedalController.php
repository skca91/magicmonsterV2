<?php

namespace App\Http\Controllers;

use App\Http\Resources\Medal\MedalCollection;
use App\Models\Medal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MedalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function myMedals(){

        $user = Auth::user();

        return MedalCollection::collection(Medal::where('user_id', $user->id)->get());
    }
}
