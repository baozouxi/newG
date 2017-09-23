<?php

namespace App\Http\Controllers;

use App\Http\Traits\Statistics;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ExpensesStatisticsController extends Controller
{

    use Statistics;

    public function __invoke(Request $request)
    {

        $view  = 'expense.statistics.index';//根据情况选择模板
        $field = 'user_id'; //分组标志

        if ($request->has('field')) {
            $view  = 'expense.statistics.table';
            $field = $request->input('field');
        }

        $patients   = new Patient;
        $months     = $patients->getMonths();
        $sent_month = false;

        $patients = $patients->with([
            'expenses' => function ($query) {
                $query->orderBy('created_at', 'ASC');
            }
        ]);


        if ($request->has('month')) {
            $month      = Carbon::parse($request->month)->format('m');
            $patients   = $patients->whereMonth('created_at', $month);
            $sent_month = $request->month;
        }


        $patients = $patients->get();


        $total                    = new \stdClass();
        $total->count             = $patients->count();
        $total->hospital_count    = 0;
        $total->check_price       = 0;
        $total->sum               = 0;
        $total->check_count       = 0;
        $total->re_hospital_count = 0;
        $total->re_hospital_sum   = 0;

        //统计总共
        $patients->map(function ($item, $key) use ($total) {

            $sum = $item->expenses->sum(function ($item) {
                return $item->check_price + $item->drug_price + $item->cure_price + $item->hospital_price;
            });
            $sum == '0' || $total->hospital_count += 1;
            $total->sum += $sum; //总消费

            //总检查费
            $check_price = $item->expenses->sum(function ($item) {
                return $item->check_price;
            });
            $check_price == '0' || $total->check_count += 1;
            $total->check_price += $check_price;

            //总复诊费用
            if ($item->expenses->count() > 1) {
                $total->re_hospital_count += 1;
                $item->expenses->map(function ($item, $key) use ($total) {
                    if ($key == '0') {
                        return;
                    }
                    $total->re_hospital_sum += $item->check_price + $item->drug_price + $item->cure_price + $item->hospital_price;
                });
            }

        });

        //数据分组
        $patients = $patients->groupBy($this->statis($field));


        //单列数据
        foreach ($patients as $field => $patient) {
            $temp                    = new \stdClass();
            $temp->count             = $patient->count();
            $temp->hospital_count    = 0;
            $temp->check_price       = 0;
            $temp->sum               = 0;
            $temp->check_count       = 0;
            $temp->re_hospital_count = 0;
            $temp->re_hospital_sum   = 0;

            foreach ($patient as $patient_item) {

                //检查费用
                $check_price = $patient_item->expenses->sum(function ($item) {
                    return $item->check_price;
                });
                $check_price == '0' || $temp->check_count += 1;
                $temp->check_price += $check_price; //检查费用

                //总费用
                $sum = $patient_item->expenses->sum(function ($item) {
                    return $item->check_price + $item->drug_price + $item->cure_price + $item->hospital_price;
                });
                $sum == '0' || $temp->hospital_count += 1;
                $temp->sum += $sum; //总费用

                //复诊 有两次以上消费即为复诊
                if ($patient_item->expenses->count() > 1) {
                    $temp->re_hospital_count += 1;
                    $patient_item->expenses->shift(); //去掉第一次消费，即时间最早的消费，剩下的即为复诊消费
                    $temp->re_hospital_sum += $patient_item->expenses->sum(function ($item) {
                        return $item->check_price + $item->drug_price + $item->cure_price + $item->hospital_price;
                    });

                }

            }
            //更新单项
            $patients->put($field, $temp);

        }


        return view($view, compact('patients', 'total', 'months', 'sent_month'));
    }
}
