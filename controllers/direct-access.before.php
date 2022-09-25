<?php

public function store(Request $request, TodoList $list)
{
    $user = Auth::user();
    $data = $request->all();

    $item = Todo::create([
        'user_id' => $user->id,
        'list_id' => $list->id,
        'title' => $data['title'],
        'content' => $data['content'],
        'completed' => $data['completed'] ?? false,
    ]);

    return $item;
}
