<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
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

    public function character(): BelongsToMany
    {
        return $this->belongsToMany(Character::class)
            ->withPivot('value', 'modificator')
            ->using(AttributeCharacter::class);
    }
}
