<?php

namespace App\Http\Resources\Competition;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompetitionCollection extends ResourceCollection
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
            'id' => $this->id,
            'date' => $this->date,
        ];
    }
}
