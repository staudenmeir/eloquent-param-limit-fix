<?php

namespace Staudenmeir\EloquentParamLimitFix;

use Illuminate\Database\Eloquent\Builder as Base;
use Staudenmeir\EloquentParamLimitFix\Traits\BuildsParamLimitFixQueries;

class Builder extends Base
{
    use BuildsParamLimitFixQueries;
}
