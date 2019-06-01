<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $table = 'teams';

    public function players()
    {
        return $this->hasMany(Players::class , 'team_id' , 'id');
    }
}
