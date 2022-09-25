<?php

public function index(Request $request)
{
    return view('invites.index', [
        'user' => $request->user(),
        'pending' => Invite::pending($request->user())->get(),
        'accepted' => Invite::accepted($request->user())->get(),
    ]);
}
