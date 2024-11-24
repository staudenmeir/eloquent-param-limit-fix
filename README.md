# Eloquent Param Limit Fix

[![CI](https://github.com/staudenmeir/eloquent-param-limit-fix/actions/workflows/ci.yml/badge.svg)](https://github.com/staudenmeir/eloquent-param-limit-fix/actions/workflows/ci.yml?query=branch%3Amain)
[![Code Coverage](https://codecov.io/gh/staudenmeir/eloquent-param-limit-fix/graph/badge.svg?token=33ZV474OJH)](https://codecov.io/gh/staudenmeir/eloquent-param-limit-fix)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%210-brightgreen.svg?style=flat)](https://github.com/staudenmeir/eloquent-param-limit-fix/actions/workflows/static-analysis.yml?query=branch%3Amain)
[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/downloads)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix/stats)
[![License](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/license)](https://github.com/staudenmeir/eloquent-param-limit-fix/blob/main/LICENSE)

This Laravel Eloquent fix allows eager loading beyond the parameter limits of MySQL/MariaDB (65,535),
[PostgreSQL](https://www.postgresql.org/docs/current/limits.html) (65,535),
[SQLite](https://www.sqlite.org/limits.html#max_variable_number) (999), and
[SQL Server](https://docs.microsoft.com/en-us/sql/sql-server/maximum-capacity-specifications-for-sql-server) (2,100).

Tested with Laravel 5.4+.

## Installation

    composer require staudenmeir/eloquent-param-limit-fix

## Usage

Use the `ParamLimitFix` trait in the affected parent models: 

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

### Package Conflicts

- `staudenmeir/laravel-adjacency-list`: Replace both packages
  with [staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list](https://github.com/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list)
  to use them on the same model.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE OF CONDUCT](.github/CODE_OF_CONDUCT.md) for details.
