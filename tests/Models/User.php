<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentParamLimitFix\ParamLimitFix;

class User extends Model
{
    use ParamLimitFix;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
