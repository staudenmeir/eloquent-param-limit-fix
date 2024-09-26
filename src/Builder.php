<?php

namespace Staudenmeir\EloquentParamLimitFix;

use Illuminate\Database\Eloquent\Builder as Base;
use Staudenmeir\EloquentParamLimitFix\Traits\BuildsParamLimitFixQueries;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Illuminate\Database\Eloquent\Builder<TModel>
 */
class Builder extends Base
{
    use BuildsParamLimitFixQueries;
}
