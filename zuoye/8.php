<?php
/**
 *
 */

// print_r(exif_read_data('./IMG_20190423_112227.jpg'));
//

$arr = [
    'xiaomi' => '名称',
    'hhHhh' => '呵呵',
    'ddd' => '张三'
];

//print_r(array_change_key_case($arr, CASE_UPPER));
//
//print_r(array_change_key_case($arr, CASE_LOWER));
//
//print_r(array_keys($arr));
//print_r(array_values($arr));
//
//var_dump(array_key_exists('dddd', $arr));


//foreach ($arr as $k=>$v){
//    $arr[$k] = $v.'123';
//}
//print_r($arr);


/**
 * array_map 将数组的每一个值，都传入到函数中，去执行一遍函数
 */
//function xxx($a){
//    echo $a.'123';
//}
//array_map('xxx', $arr);
//
//echo '********************';
//
//array_map(function ($a){ print_r($a); }, $arr);


$arr2 = ['凤姐', '龙哥'];

$arr3 = [
    'ddd' => '芙蓉姐姐'
];

//print_r(array_merge($arr, $arr2, $arr3));

//print_r($arr);

//array_pop($arr);
//array_shift($arr);
//array_push($arr, '大哥');
//array_unshift($arr, '小弟', '二狗');

//print_r($arr);

$users = [
    '王赫',
    '许贺斌',
    '胡俊',
    '卞莉',
    '陈孟贤'
];

//print_r(array_rand($users, 2));


//echo rand(1,9);

//根据键值替换数组的值
//$base = ["orange", "banana", "apple", "raspberry", 'name' => '爸爸'];
//$replacements = [0 => "pineapple", 4 => "cherry"];
//$replacements2 = [0 => "grape"];
//$replacements3 = ['name' => '爷爷'];
//$basket = array_replace($base, $replacements, $replacements2, $replacements3);
//print_r($basket);

//按照反续对调数组
//print_r(array_reverse($arr2));


//print_r(array_search('卞莉', $users));

//print_r(array_slice($users, 2, 2));
//print_r(array_slice($users, -2, 5));


//array_splice($users, 2, 1, ['赵冰霜', '尹春波']);
//print_r($users);

//$arr4 = [1, 5, 9, 5];
//print_r(array_sum($arr4));
//print_r(array_unique($arr4));
//arsort($arr4);
//asort($arr4);
//print_r($arr4);


$arr5 = ['name'=> 665, 'age'=>18, 'xxx'=> 999];
//asort($arr5);
//sort($arr5);
//print_r($arr5);

//echo count($arr5);

//echo current($arr5);
//next($arr5);
//echo current($arr5);

//echo end($arr5);

//var_dump(in_array(665, $arr5));

//$arr6 = ['大哥', '二狗', '俺也一样'];
////展开数组
//list($a, $b, $c) = $arr6;
//echo $a, $b, $c;

//快速生成一个数组
//print_r(range(5, 10));
//print_r(range(5, 10, 2));


print_r(array_flip($arr5));



