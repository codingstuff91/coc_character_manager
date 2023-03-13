<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterWay extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "character_ways";

    protected $fillable = ['name'];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'character_way_profile', 'character_way_id', 'profile_id');
    }

    public function capacities()
    {
        return $this->hasMany(Capacity::class);
    }
}
