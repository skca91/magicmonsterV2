<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'username',
        'name',
        'password',
        'exp',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function avatar(){

        return $this->belongsTo(Avatar::class);

    }

    public function victim(){

        return $this->hasOne(Victim::class);
        
    }

    public function league(){
        return $this->hasOne(League::class);
    }

    public function ranking(){
        return $this->hasOne(Ranking::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function medal(){
        return $this->hasOne(Medal::class);
    }

    public function leagueProgress(){
        return $this->hasOne(LeagueProgress::class);
    }

    public function historicalMedal(){
        return $this->hasOne(HistoricalMedal::class);
    }

    public function tournamentRegistered(){
        return $this->hasOne(TournamentRegistered::class);
    }
}
