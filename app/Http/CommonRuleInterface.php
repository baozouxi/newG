<?php
/**
 * Created by PhpStorm.
 * User: sx-pc
 * Date: 2017/9/15
 * Time: 下午3:25
 */

namespace App\Http;

//状态约定接口
interface CommonRuleInterface
{

    //性别
    const MALE   = '1'; //男性
    const FEMALE = '2'; //女性

    //预约状态
    const WAITING = '0'; //未到诊
    const HOSPITALD = '1'; //已到院
    const LOSE = '2'; //失效



}