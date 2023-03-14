<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
    ];
    protected $casts = [
        'id' => 'integer',
    ];

    public function character()
    {
        return $this->hasOne(User::class);
    }

    public function advantages()
    {
        return $this->hasMany(Advantage::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function characterWays()
    {
        return $this->belongsToMany(CharacterWay::class, 'character_way_profile', 'profile_id', 'character_way_id');
    }
}
