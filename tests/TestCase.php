<?php

namespace Tests;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Framework\TestCase as Base;
use Tests\Models\Post;
use Tests\Models\User;

abstract class TestCase extends Base
{
    protected function setUp()
    {
        parent::setUp();

        $db = new DB;
        $db->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
        $db->setAsGlobal();
        $db->bootEloquent();

        DB::schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        DB::schema()->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Model::unguarded(function () {
            for ($i = 0; $i < 1000; $i++) {
                User::create();
            }

            Post::create(['user_id' => 1]);
            Post::create(['user_id' => 1000]);
        });

        DB::enableQueryLog();
    }
}
