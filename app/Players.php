<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';

    protected $fillable = [
        'first_name',
        'last_name',
        'team_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function team()
    {
        return $this->belongsTo(Teams::class , 'team_id' , 'id');
    }
}
