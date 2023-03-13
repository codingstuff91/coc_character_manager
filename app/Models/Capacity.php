<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function characterWay()
    {
        return $this->belongsTo(CharacterWay::class);
    }
}
