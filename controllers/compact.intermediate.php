<?php

public function index(Request $request)
{
    return view('invites.index', [
        'user' => $request->user(),
        'pending_invitations' => Invite::where('user_id', $request->user()->id)
                                    ->where('accepted', false)->get(),
        'accepted_invitations' => Invite::where('user_id', $request->user()->id)
                                    ->where('accepted', true)->get(),
    ]);
}
