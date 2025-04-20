<?php

namespace App\Http\Traits\pub;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;


class TypeFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (is_array($value)) {
            return $query->whereIn($property, $value);
        }

        $types = explode(',', $value);
        return $query->whereIn($property, $types);
    }
}
