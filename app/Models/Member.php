<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'membership_date',
        'is_active',
    ];

    protected $casts = [
        'membership_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function borrow() {
        return $this->hasMany(Borrow::class);
    }
}
