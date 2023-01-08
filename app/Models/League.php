<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
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

    public function getUrlAttribute()
    {
        return route('leagues.show', $this);
    }

    public function image()
    {
        if ($this->image == null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL") . "/uploads/leagues/" . $this->image;
    }
}
