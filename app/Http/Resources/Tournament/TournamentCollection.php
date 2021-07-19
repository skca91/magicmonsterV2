<?php

namespace App\Http\Resources\Tournament;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TournamentCollection extends ResourceCollection
{
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
