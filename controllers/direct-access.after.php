<?php

public function store(Request $request, TodoList $list)
{
    return Todo::create([
        'user_id' => Auth::id(),
        'list_id' => $list->id,
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'completed' => $request->boolean('completed'),
    ]);
}
