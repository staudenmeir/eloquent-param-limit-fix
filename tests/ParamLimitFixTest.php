<?php

namespace Staudenmeir\EloquentParamLimitFix\Tests;

use Illuminate\Database\Capsule\Manager as DB;
use Staudenmeir\EloquentParamLimitFix\Tests\Models\User;

class ParamLimitFixTest extends TestCase
{
    public function testEagerLoading()
    {
        $users = User::with('posts')->get();

        $this->assertEquals([1], $users[0]->posts->pluck('id')->all());
        $this->assertEquals([2], $users[999]->posts->pluck('id')->all());
        $this->assertCount(3, DB::getQueryLog());
    }
}
