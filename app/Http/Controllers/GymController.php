<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gym\GymColletion;
use App\Models\Gym;
use Illuminate\Http\Request;


class GymController extends Controller
{
    public function index(){

        $gyms = Gym::all();

        return GymColletion::collection($gyms);
    }

    public function gymMembership(){

    }

    public function gymDisaffiliation(){
        
    }
}
