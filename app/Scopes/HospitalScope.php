<?php
/**
 * Created by PhpStorm.
 * User: sx-pc
 * Date: 2017/9/16
 * Time: 下午3:33
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class HospitalScope implements Scope
{

    /**
     * 医院全局作用域
     *
     * @param Builder $builder
     * @param Model $model
     *
     * @return $this
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('hospital_id', session('hospital.id'));
    }
}