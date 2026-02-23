<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'membership_date' => 'required|date',
        ]);

        Member::create($request->all() + ['is_active' => true]);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required|string|max:20',
            'membership_date' => 'required|date',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        // Deactivate instead of deleting
        $member->update(['is_active' => false]);

        return redirect()->route('members.index')->with('success', 'Member deactivated.');
    }

    // Toggle active/inactive
    public function toggle(Member $member)
    {
        $member->update(['is_active' => !$member->is_active]);

        return redirect()->route('members.index')->with('success', 'Member status updated.');
    }
}