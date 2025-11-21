<?php

namespace App\Http\Controllers;

use App\Mail\MemberProfileMail;
use App\Models\Member;
use Illuminate\Http\Request;
use Log;
use Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view("backend.member.index", compact("members"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.member.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:members,email",
            "role" => "required|string",
        ]);

        // Auto-generate 6-digit random password
        $plainPassword = sprintf("%06d", mt_rand(0, 999999));

        // Create member
        $member = Member::create([
            "email" => $request->email,
            "role" => $request->role,
            "password" => bcrypt($plainPassword),
        ]);

        // Send Email
        try {
            Mail::to($member->email)->send(new MemberProfileMail($member, $plainPassword));
        } catch (\Exception $e) {
            // Log the detailed error
            Log::error('Email sending failed: ' . $e->getMessage());

            // Optionally, return the error message for debugging (remove in production)
            return back()->with('error', "Member created but email failed to send. Error: " . $e->getMessage());
        }

        return back()->with('success', "Member Profile Created Successfully! Email sent to {$member->email}");
    }



    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if ($member) {
            // Delete logo if exists
            // $logoPath = public_path("media/members/" . $member->photo);

            // if (!empty($member->photo) && file_exists($logoPath)) {
            //     @unlink($logoPath); // The @ prevents warning if file is already deleted
            // }

            $member->delete();

            return back()->with('success', 'member deleted successfully!');
        }

        return back()->with('error', 'member not found!');
    }
}
