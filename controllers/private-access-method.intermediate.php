<?php

private function modelCanAccessResource(Model $model, Resource $resource)
{
    if ($model instanceof User && $model->isOwner($resource)
        && ($resource->isAvailable() || !$resource->isAvailable())) {
        return true;
    } elseif ($resource->managers->contains($model->id)
        && ($resource->isAvailable() || !$resource->isAvailable())) {
        return true;
    }

    return false;
}
