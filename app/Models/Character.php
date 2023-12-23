<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'gender',
        'age',
        'height',
        'user_id',
        'profile_id',
        'advantage_id',
        'family_id',
    ];

    protected $casts = [
        'id'           => 'integer',
        'user_id'      => 'integer',
        'profile_id'   => 'integer',
        'advantage_id' => 'integer',
        'family_id'    => 'integer',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function advantage(): BelongsTo
    {
        return $this->belongsTo(Advantage::class);
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
                    ->withPivot('value', 'modificator')
                    ->using(AttributeCharacter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function weapons(): BelongsToMany
    {
        return $this->belongsToMany(Weapon::class);
    }

    public function capacities(): BelongsToMany
    {
        return $this->belongsToMany(Capacity::class);
    }
}
