<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

class SortByOrdinal
{
    public static function bootSortByOrdinal()
    {
        static::addGlobalScope('ordinal', function (Builder $builder) {
            $builder->orderBy('ordinal', 'asc');
        });
    }
}
