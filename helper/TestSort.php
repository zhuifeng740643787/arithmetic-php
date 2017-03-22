<?php
namespace Helper;
/**
 * Created by PhpStorm.
 * User: gongyidong
 * Date: 2017/3/22
 * Time: 上午10:57
 */
class TestSort
{

    public static function generateRandomArray($n, $min, $max)
    {
        print_r("生成随机数组($n)\n");
        $arr = [];
        if ($n <= 0 || $min > $max) {
            return $arr;
        }

        for ($i = 0; $i < $n; $i++) {
            $arr[] = rand($min, $max);
        }
        return $arr;
    }

    public static function generateRandomAlmostOrderlyArray($n, $unOrderlyCount)
    {
        print_r("生成近乎有序数组($n)\n");
        $arr = [];
        if ($n <= 0) {
            return $arr;
        }

        for ($i = 0; $i < $n; $i++) {
            $arr[] = $i;
        }
        for ($i = 0; $i < $unOrderlyCount; $i++) {
            $arr[rand(0, $n)] = rand(0, $n);
        }
        return $arr;
    }

    public static function copyArray(array $arr, $n)
    {
        $newArr = [];
        for ($i = 0; $i < $n; $i++) {
            $newArr[] = $arr[$i];
        }
        return $newArr;
    }

    public static function isOrderly(array $arr, $n)
    {
        for ($i = 0; $i < $n - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                return false;
            }
        }
        return true;
    }

    public static function sortTime($sortFunctionName, $sortFunction, &$arr, $n)
    {
        $startTime = microtime(true);
        call_user_func_array($sortFunction, array(&$arr, $n));//call_user_func只能传递值，不能传递引用
        $endTime = microtime(true);
        if (!self::isOrderly($arr, $n)) {
            print_r("算法：$sortFunctionName 排序失败：\n");
            exit();
        }
        $totalTime = number_format($endTime - $startTime, 6);
        print_r($sortFunctionName . "：" . $totalTime . "s \n");
    }

    public static function showArray($arr, $n)
    {
        if ($n > 100) {
            return;
        }
        for ($i = 0; $i < $n; $i++) {
            echo $arr[$i];
            if ($i == $n - 1) {
                echo "\n";
            } else {
                echo ",";
            }
        }
    }

}