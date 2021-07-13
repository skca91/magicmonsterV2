<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $table = 'avatars';

    public function user(){

        return $this->hasOne(User::class);

    }

    public function victim(){

        return $this->hasOne(Victim::class);
        
    }

    public function profile(){

        return $this->hasOne(Profile::class);

    }

    public function tournamentRegistered(){

        return $this->hasOne(TournamentRegistered::class);
    }

    public function addAvatarInTheModel($request){

        $nickname = $request->input('nickname');

        $avatar = New Avatar();
        $avatar->nickname = $nickname;
        $avatar->exp = 0;
        $avatar->save();

        return $avatar;

    }

}
