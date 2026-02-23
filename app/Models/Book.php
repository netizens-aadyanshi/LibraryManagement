<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'published_year',
        'total_copies',
        'available_copies',
    ];

    // One book belongs to one author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // One book can have many borrow records
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}