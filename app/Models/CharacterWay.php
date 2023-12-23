<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterWay extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'character_ways';
    protected $fillable = ['name'];

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'character_way_profile', 'character_way_id', 'profile_id');
    }

    public function capacities(): HasMany
    {
        return $this->hasMany(Capacity::class);
    }
}
