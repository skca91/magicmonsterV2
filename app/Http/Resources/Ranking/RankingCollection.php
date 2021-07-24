<?php

namespace App\Http\Resources\Ranking;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RankingCollection extends ResourceCollection
{
    public static $wrap = 'ranking';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'username' => User::where('id', $this->user_id)->first()->username,
            'name' => User::where('id', $this->user_id)->first()->name,
            'points' => $this->points,
        ];
    }
}
