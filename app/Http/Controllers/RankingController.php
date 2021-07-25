<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ranking\RankingCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('topGlobalRanking');
    }
    /**
    * @OA\Get(
    *     path="/api/globalranking",
    *     summary="List of top global ranking",
    *     tags={"ranking"},
    *     @OA\Response(
    *         response=200,
    *         description="List of top global ranking"
    *     ),
    * )
    */
    public function topGlobalRanking(){

        return RankingCollection::collection(Ranking::orderBy('points','desc')->get());
    }


     /**
    * @OA\Get(
    *     path="/api/myglobalranking",
    *     summary="my position on top global ranking",
    *     tags={"ranking"},
    *     @OA\Response(
    *         response=200,
    *         description="my position on top global ranking"
    *     ),
    * )
    */
    public function myGlobalRanking(){

        $user = Auth::user();

        $ranking = Ranking::all();
        $rankingGlobal = Ranking::orderBy('points','desc')->get();
        $position = $rankingGlobal->search(function($ranking, $key) use ($user){
            return $ranking->user_id == $user->id;
        });                         

        return response()->json([
            'position'=> $position+1
        ]);
    }
}
