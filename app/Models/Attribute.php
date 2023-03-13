<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function character()
    {
        return $this->belongsToMany(Character::class)->using(AttributeCharacter::class);;
    }
}
