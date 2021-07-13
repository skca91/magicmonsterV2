<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    public function league(){
        return $this->hasOne(League::class);
    }

    public function medal(){
        return $this->hasOne(Medal::class);
    }

    public function historicalMedal(){
        return $this->hasOne(HistoricalMedal::class);
    }
}
