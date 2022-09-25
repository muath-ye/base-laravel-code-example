<?php

public static function findByRepository($service, $repository)
{
    $teamRepository = TeamRepository::query()
        ->where('scs', 'LIKE', strtolower($service) . ':' . $repository . ':%')
        ->first();
    if (is_null($teamRepository)) {
        return null;
    }

    if ($teamRepository->name->subscription->ended()) {
        return null;
    }

    return $teamRepository->team->subscription;
}
