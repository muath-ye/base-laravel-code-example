<?php

public function update(Request $request, Account $account)
{
    $data = $request->except(['_method', '_token']);
    $success = "Your account details have been updated.";
    $account_id = $account->id;

    $account->update($data);

    return redirect()->route('account.edit', compact('account_id', 'success'));
}
