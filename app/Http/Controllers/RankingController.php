<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ranking\RankingCollection;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{

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
}
