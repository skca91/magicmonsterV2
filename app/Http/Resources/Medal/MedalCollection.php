<?php

namespace App\Http\Resources\Medal;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MedalCollection extends ResourceCollection
{
    public static $wrap = 'medals';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'gym' => $this->gym_id,
        ];
    }

}