[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/downloads)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)
[![License](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix/license)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix)

## Introduction

This Eloquent fix allows eager loading beyond the parameter limits of SQLite (999) and SQL Server (2,100).  
Tested with Laravel 5.4+.

## Installation

    composer require staudenmeir/eloquent-param-limit-fix

## Usage

Use the `ParamLimitFix` trait in the affected models: 

    class YourModel extends Model
    {
        use \Staudenmeir\EloquentParamLimitFix\ParamLimitFix;
    }