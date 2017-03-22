<?php
namespace Sort;

/**
 * Created by PhpStorm.
 * User: gongyidong
 * Date: 2017/3/22
 * Time: 上午10:54
 */
class SelectionSort implements ISort
{

    public function sort(array &$arr, $n)
    {
        for ($i = 0; $i < $n - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            if($minIndex != $i) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$minIndex];
                $arr[$minIndex] = $temp;
            }
        }
    }
}
