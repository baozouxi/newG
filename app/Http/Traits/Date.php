<?php
/**
 * Created by PhpStorm.
 * User: sx-pc
 * Date: 2017/9/22
 * Time: 下午3:03
 */

namespace App\Http\Traits;


use Illuminate\Support\Facades\DB;

trait Date
{

    //用于模型中 日期数组的获取

    public function getMonths()
    {
        return $this->getDate('%Y-%m');
    }

    public function getYear()
    {
        return $this->getDate('%Y');
    }

    public function getDate($format)
    {
        return $this->get([DB::raw('DISTINCT Date_Format(created_at, "' . $format . '") as month')]);
    }


}