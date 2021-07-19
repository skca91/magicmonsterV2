<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gym\GymColletion;
use App\Models\Avatar;
use App\Models\Gym;
use App\Models\League;
use App\Models\User;

use Illuminate\Http\Request;


class GymController extends Controller
{

    /**
    * @OA\Get(
    *     path="/api/gyms",
    *     summary="List of gyms",
    *     tags={"gyms"},
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

    /**
    * @OA\Get(
    *     path="/api/gym",
    *     summary="Detail of a gym",
    *     tags={"gym"},
     *@OA\Parameter(
     *      name="gym_id",
     *      in="path",
     *      description="id of gym",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  *@OA\Parameter(
     *      name="league_id",
     *      in="path",
     *      description="id of league",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
    *     @OA\Response(
    *         response=200,
    *         description="Deatil of a gym"
    *     ),
    * )
    */

    public function showGym(Request $request){

        $leader = League::where('gym_id', $request->gym_id)
        ->orderBy('points','desc')
        ->first();


        $points = League::where('id', $request->league_id)
        ->get()->sum('points');


        $count = League::where('gym_id', $request->gym_id)
        ->get()->count();

        $user =  User::where('id', $leader->user_id)->first();
        $avatar = Avatar::where('id', $user->avatar_id)->first();

        $name = $user->name;
        $nickname = $avatar->nickname;


        return response()->json([
            'id' => $leader->id,
            'leader' => $name,
            'avatar' => $nickname,
            'points' => $points,
            'members' => $count,
            'ranking' => 'no'
        ]);

    }

    public function gymMembership(){

    }

    public function gymDisaffiliation(){
        
    }
}
