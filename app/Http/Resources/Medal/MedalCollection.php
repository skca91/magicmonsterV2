<?php

namespace App\Http\Resources\Medal;

use App\Models\Gym;
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
            'gym' => Gym::where('id', $this->gym_id)->first()->nickname,
        ];
    }

}