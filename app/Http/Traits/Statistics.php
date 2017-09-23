<?php
/**
 * Created by PhpStorm.
 * User: sx-pc
 * Date: 2017/9/22
 * Time: 下午2:23
 */

namespace App\Http\Traits;


use App\Http\CommonRuleInterface;
use App\User;

trait Statistics
{


    /**
     * 患者统计 和 预约统计需要用到的统计功能
     *
     * @param $field 用于分组的标志
     *
     * @return \Closure 回调函数
     */
    public function statis($field)
    {
        return function ($item, $key) use ($field) {

            switch ($field) {

                case 'day':
                    return $item->created_at->format('Y-m-d');
                    break;

                case 'user_id':
                    return $item->load('user')->user->name;
                    break;

                case 'time':
                    return $item->created_at->format('H') . '点';
                    break;

                case 'date':
                    return $item->created_at->format('d') . '号';
                    break;

                case 'week':
                    $week = ['星期天', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];

                    return $week[$item->created_at->format('w')];
                    break;
                case 'month':

                    return $item->created_at->format('Y-m') . '月';
                    break;

                case 'illness':
                    return $item->load('illness')->illness->name;
                    break;

                case 'doctor':
                    return $item->load('doctor')->doctor->name;
                    break;

                case 'area':
                    list(, $city, $town) = array_values(area($item->province, $item->city, $item->town));

                    return $city . $town;
                    break;

                case 'gender':
                    return $item->gender == CommonRuleInterface::MALE ? '男' : '女';
                    break;

                case 'age':
                    return $item->age . '岁';
                    break;

                default:
                    return $item->$field;
                    break;
            }


        };
    }


}