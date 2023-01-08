<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMatch extends Model
{
    use HasFactory;

    public $guarded = ['id', 'created_at', 'updated_at'];
    public $appends = ['url'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function club1()
    {
        return $this->belongsTo(Club::class, 'club1_id');
    }

    public function club2()
    {
        return $this->belongsTo(Club::class, 'club2_id');
    }

    public function stadium()
    {
        return $this->belongsTo(Stadium::class, 'stadium_id');
    }

    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }

    public function getUrlAttribute()
    {
        return route('club_matches.show', $this);
    }


}
