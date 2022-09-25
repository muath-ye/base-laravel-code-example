<?php

public function update(Request $request, Account $account)
{
    $data = $request->except(['_method', '_token']);
    $account->update($data);

    $account_id = $account->id;
    $success = "Your account details have been updated.";
    return redirect()->route('account.edit', compact('account_id', 'success'));
}
