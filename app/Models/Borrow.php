<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'borrowed_at',
        'due_date',
        'returned_at',
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
