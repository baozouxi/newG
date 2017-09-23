<?php
/**
 * Created by PhpStorm.
 * User: sx-pc
 * Date: 2017/9/22
 * Time: 下午4:22
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('active', '1');
    }
}