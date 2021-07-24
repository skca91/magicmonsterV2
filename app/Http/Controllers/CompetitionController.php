<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Http\Resources\Competition\CompetitionCollection;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


     /**
    * @OA\Get(
    *     path="/api/competitions",
    *     summary="List of competitions",
    *     tags={"competitions"},
    *     @OA\Response(
    *         response=200,
    *         description="List of competitions"
    *     ),
    * )
    */
    public function index(){

        return CompetitionCollection::collection(Competition::all());
    }
}
