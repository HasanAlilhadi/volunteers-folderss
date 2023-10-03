<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GlobalFiltersTrait
{
    protected $paramOperators = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];

    public function scopeFilter(Builder $builder)
    {
        $queryItems = $this->filterBetter(request());
        $builder->where($queryItems);
    }

    public function scopeWithRelations(Builder $builder)
    {
        $relations = request()->query('include', '');
        $relations = explode(',', $relations);

        $relations = array_intersect($relations, $this->loadableRelations);

        foreach ($relations as $relation) {
            $builder->with($relation);
        }
    }

    public function withLoads()
    {
        $relations = request()->query('include', '');
        $relations = explode(',', $relations);

        $relations = array_intersect($relations, $this->loadableRelations);

        foreach ($relations as $relation) {
            $this->load($relation);
        }

        return $this;
    }

    public function filterBetter($request)
    {
        $eloQuery = [];

        foreach ($this->params as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columns[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->paramOperators[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
