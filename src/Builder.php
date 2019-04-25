<?php

namespace Staudenmeir\EloquentParamLimitFix;

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
        $database = get_class($this->query->getConnection());

        if (isset($this->parameterLimits[$database])) {
            $limit = $this->parameterLimits[$database];

            if (count($models) > $limit) {
                foreach (array_chunk($models, $limit) as $chunk) {
                    $this->eagerLoadRelations($chunk);
                }

                return $models;
            }
        }

        return parent::eagerLoadRelations($models);
    }
}
