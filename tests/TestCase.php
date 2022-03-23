<?php

namespace Staudenmeir\EloquentParamLimitFix\Tests;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Framework\TestCase as Base;
use Staudenmeir\EloquentParamLimitFix\Tests\Models\Post;
use Staudenmeir\EloquentParamLimitFix\Tests\Models\User;

abstract class TestCase extends Base
{
    protected function setUp(): void
    {
        parent::setUp();

        $db = new DB();
        $db->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        $db->setAsGlobal();
        $db->bootEloquent();

        $this->migrate();

        $this->seed();

        DB::enableQueryLog();
    }

    /**
     * Migrate the database.
     *
     * @return void
     */
    protected function migrate()
    {
        DB::schema()->create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        DB::schema()->create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Seed the database.
     *
     * @return void
     */
    protected function seed()
    {
        Model::unguard();

        for ($i = 0; $i < 1000; $i++) {
            User::create();
        }

        Post::create(['user_id' => 1]);
        Post::create(['user_id' => 1000]);

        Model::reguard();
    }
}
