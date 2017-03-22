<?php
namespace Sort;

/**
 * Created by PhpStorm.
 * User: gongyidong
 * Date: 2017/3/22
 * Time: 上午10:54
 */
class InsertionSort implements ISort
{

    public function sort(array &$arr, $n)
    {
        for ($i = 1; $i < $n; $i++) {
            $e = $arr[$i];
            $j = $i;
            for ($j; $j > 0; $j--) {
                if ($arr[$j-1] <= $e) {
                    break;
                }
                //交换
                $arr[$j] = $arr[$j-1];
            }
            $arr[$j] = $e;
        }
    }
}
