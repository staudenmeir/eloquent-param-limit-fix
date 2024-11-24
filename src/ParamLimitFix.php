<?php

namespace Staudenmeir\EloquentParamLimitFix;

/**
 * @phpstan-ignore trait.unused
 */
trait ParamLimitFix
{
    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }
}
