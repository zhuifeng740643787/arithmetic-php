<?php
spl_autoload_register(function($class_name){
    $class_name = str_replace("\\", "/", lcfirst($class_name));
    require_once $class_name.".php";
});


//测试
use Helper\TestSort;
use Sort\SelectionSort;
use Sort\InsertionSort;


$n = !empty($argv[1]) ? $argv[1] : 100;
$arr = TestSort::generateRandomArray($n, 0, 100);
//$arr = TestSort::generateRandomAlmostOrderlyArray($n, 10);
$arr1 = TestSort::copyArray($arr, $n);
TestSort::showArray($arr, $n);

$ss = new SelectionSort();
$is= new InsertionSort();
TestSort::sortTime("选择排序", [$ss, 'sort'], $arr, $n);
TestSort::sortTime("插入排序", [$is, 'sort'], $arr1, $n);
TestSort::showArray($arr, $n);
