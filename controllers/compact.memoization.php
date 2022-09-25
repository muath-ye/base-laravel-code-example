<?php

public function index(Request $request)
{
    return view('invites.index', [
        'user' => $request->user(),
        'pending' => $this->invitations($request->user())
                            ->where('accepted', false),
        'accepted' => $this->invitations($request->user())
                            ->where('accepted', true),
    ]);
}

// ...

private function invitations($user)
{
    static $invitations;

    if (!$invitations) {
        $invitations = Invite::where('user_id', $user->id)->get();
    }

    return $invitations;
}
