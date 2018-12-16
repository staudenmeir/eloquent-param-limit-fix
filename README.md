[![Build Status](https://travis-ci.org/staudenmeir/eloquent-param-limit-fix.svg?branch=master)](https://travis-ci.org/staudenmeir/eloquent-param-limit-fix)
[![Code Coverage](https://scrutinizer-ci.com/g/staudenmeir/eloquent-param-limit-fix/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/staudenmeir/eloquent-param-limit-fix/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/staudenmeir/eloquent-param-limit-fix/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/staudenmeir/eloquent-param-limit-fix/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/downloads)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)
[![License](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/license)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)

## Introduction

This Laravel Eloquent fix allows eager loading beyond the parameter limits of [SQLite](https://www.sqlite.org/limits.html#max_variable_number) (999) and [SQL Server](https://docs.microsoft.com/en-us/sql/sql-server/maximum-capacity-specifications-for-sql-server) (2,100).  
Tested with Laravel 5.4+.

## Installation

    composer require staudenmeir/eloquent-param-limit-fix

## Usage

Use the `ParamLimitFix` trait in the affected models: 

```php
class User extends Model
{
    use \Staudenmeir\EloquentParamLimitFix\ParamLimitFix;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

$users = User::with('posts')->get();
```