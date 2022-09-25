<?php

public function update(\Illuminate\Http\Request $request)
{
    $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
    ]);

    $post = new Post($request->validated());
    $post->user_id = $request->user()->id;
    $post->save();

    return $post;
}
