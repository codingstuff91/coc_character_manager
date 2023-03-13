<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'gender',
        'age',
        'height',
        'user_id',
        'profile_id',
        'advantage_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'           => 'integer',
        'user_id'      => 'integer',
        'profile_id'   => 'integer',
        'advantage_id' => 'integer',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function advantage()
    {
        return $this->belongsTo(Advantage::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->using(AttributeCharacter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class);
    }

    public function capacities()
    {
        return $this->belongsToMany(Capacity::class);
    }
}
