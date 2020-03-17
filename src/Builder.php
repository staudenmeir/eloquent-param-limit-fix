<?php

namespace Staudenmeir\EloquentParamLimitFix;

use Illuminate\Database\MySqlConnection;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\SqlServerConnection;

class Builder extends \Illuminate\Database\Eloquent\Builder
{
    /**
     * The maximum number of parameters per query.
     *
     * The values are lower than the actual limits
     * to have a margin for polymorphic relationships
     * and other query parameters.
     *
     * @var array
     */
    protected $parameterLimits = [
        MySqlConnection::class => 65000,
        SQLiteConnection::class => 900,
        SqlServerConnection::class => 2000,
    ];

    /**
     * Eager load the relationships for the models.
     *
     * @param array $models
     * @return array
     */
    public function eagerLoadRelations(array $models)
    {
        foreach ($this->parameterLimits as $class => $limit) {
            if ($this->query->getConnection() instanceof $class && count($models) > $limit) {
                foreach (array_chunk($models, $limit) as $chunk) {
                    $this->eagerLoadRelations($chunk);
                }

                return $models;
            }
        }

        return parent::eagerLoadRelations($models);
    }
}
