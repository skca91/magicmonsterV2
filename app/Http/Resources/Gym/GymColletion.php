<?php

namespace App\Http\Resources\Gym;

use Illuminate\Http\Resources\Json\JsonResource;

class GymColletion extends JsonResource
{

    public static $wrap = 'gyms';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'gym' => $this->nickname,
            'description' => $this->description,
            'medal' => $this->medal,
            'leader' => $this->leader ? $this->leader: "lider".rand ( 0 , 100 ),
            'points' => $this->points? $this->points: "".rand ( 0 , 99999 ),
            'members' => $this->members? $this->leader: "".rand ( 0 , 999 ),
            'ranking' => $this->ranking? $this->leader: "".rand ( 0 , 10 )
        ];
    }
}
