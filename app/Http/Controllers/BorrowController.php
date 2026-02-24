<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // Borrow a book
    public function borrow(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        // Check availability
        if ($book->available_copies <= 0) {
            return back()->with('error', 'This book is currently unavailable.');
        }

        // Create borrow record
        Borrow::create([
            'member_id' => Auth::id(), // Make sure Auth::id() returns the logged-in member ID
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => now()->addWeeks(2), // optional default due date
        ]);

        // Decrease available copies
        $book->decrement('available_copies');

        return back()->with('success', 'Book borrowed successfully!');
    }

    // Return a book
    public function return(Borrow $borrow)
    {
        if ($borrow->returned_at) {
            return back()->with('error', 'This book is already returned.');
        }

        $borrow->update([
            'returned_at' => now(),
        ]);

        // Increase available copies
        $borrow->book->increment('available_copies');

        return back()->with('success', 'Book returned successfully!');
    }

    // Optional: List all borrowed books
    public function index()
    {
        $borrows = Borrow::with(['book', 'member'])->get();
        return view('borrows.index', compact('borrows'));
    }
}