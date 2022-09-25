<?php

public function index(Request $request)
{
    $user = $request->user();

    $invitations = Invite::where('user_id', $user->id)->get();
    $pending_invitations = $invitations->where('accepted', false);
    $accepted_invitations = $invitations->where('accepted', true);

    return view(
        'invites.index',
        compact('user', 'pending_invitations', 'accepted_invitations')
    );
}
