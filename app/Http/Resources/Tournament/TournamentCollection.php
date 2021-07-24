<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TournamentCollection extends ResourceCollection
{

    public static $wrap = 'tournaments';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'tournament' => $this->name,
            'medals' => $this->medals,
            'date' => $this->date,
        ];
    }
}
