<?php

private function modelCanAccessResource(Model $model, Resource $resource)
{
    $available = $resource->isAvailable();
    $user = $model instanceof User ? $model : null;
    $has_access = $resource->managers->contains($model->id);
    $unavailable = !$available;

    if ($user && $user->isOwner($resource)
        && ($resource->isAvailable() || !$resource->isAvailable())) {
        return true;
    } elseif ($has_access && ($available || $unavailable)) {
        return true;
    }

    return false;
}
