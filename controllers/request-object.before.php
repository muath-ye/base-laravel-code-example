<?php

public function update()
{
    Validator::make(Request::all(), [
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
    ])->validate();

    $post = new Post(Request::all());
    $post->user_id = Auth::user()->id;
    $post->save();

    return $post;
}
