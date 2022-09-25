<?php

public function store(Request $request)
{
    \App\Watch::create([
        'user_id' => $request->user()->id,
        'video_id' => $request->get('video_id'),
    ]);

    event('video.watched', [$request->user(), $request->input('video_id')]);

    return response(null, 204);
}
