<?php

private function modelCanAccessResource(Model $model, Resource $resource)
{
    if ($model instanceof User && $model->isOwner($resource)) {
        return true;
    } elseif ($resource->managers->contains($model->id)) {
        return true;
    }

    return false;
}
