<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gym\GymColletion;
use App\Models\Gym;
use Illuminate\Http\Request;


class GymController extends Controller
{

    /**
    * @OA\Get(
    *     path="/api/gym",
    *     summary="List of gyms",
    *     tags={"gym"},
    *     @OA\Response(
    *         response=200,
    *         description="List of gyms"
    *     ),
    * )
    */
    public function index(){

        $gyms = Gym::all();

        return GymColletion::collection($gyms);
    }

    public function gymMembership(){

    }

    public function gymDisaffiliation(){
        
    }
}
