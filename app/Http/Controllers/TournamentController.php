<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tournament\TournamentCollection;
use App\Models\Tournament;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     /**
    * @OA\Get(
    *     path="/api/tournaments",
    *     summary="List of tournaments",
    *     tags={"tournaments"},
    *     @OA\Response(
    *         response=200,
    *         description="List of tournaments"
    *     ),
    * )
    */
    public function index(){

        return TournamentCollection::collection(Tournament::all());
    }
}
