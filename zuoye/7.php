<?php

/**
 * 常用字符串处理函数
 */

//根据ascii十进制编  号返回一个符号
//print_r(chr(94));
//print_r(ord('g'));


//print_r(crc32('easdfgnfbjkgdsahgvcxjaksLDFNMD'));

//echo '你好', '世界';


//$str = 'dsfghjdsaSDZFXGCHVJKGJFHDSDTRDYCsdfhbvxdf';
//// 用一个字符串去分割另一个字符串， 分割后的结果为数组
//print_r(explode('sf', $str));
//print_r(implode('', ['凤姐', '爱', '龙哥']));


//ltrim();
//rtrim();
//trim();

//print_r(md5(1231));

//$arr = [1234, 456, 789, 111];
//
//foreach ($arr as $k=>$v){
//    echo '<br>';
//    echo $v, '----', md5($v);
//}

echo '<br>';
//echo md5('123456'.'34567');
//echo md5_file('./1.txt');
//echo sha1('1234dfdggrsdfgdsfdfrsdfs5678765432');
//echo sha1_file('./1.txt');

//$a = '大哥';
//%d 整数 %f 浮点型 %.2f 保留两位小数 %s 字符串
//echo sprintf("dfghjfdsa%sSDFG%dHJFDSA", $a, 123456);
//echo sprintf("fdsghjk%.2fgfds", 0.34435674);
// 和sprintf()格式化规则一样，不过该函数自带输出功能
//printf("fdsghjk%.2fgfds", 0.34435674);


//echo password_hash('123456', PASSWORD_DEFAULT);
//var_dump(password_verify('123456', '$2y$10$eewwpAMO6t/swiY.n/3gZeHK1qzLx0hJdIgNWd5wVlYUMMIynPQ8.'));


//$str = "Hello Friend";
//// 将一个字符串按字符分割成数组
//$arr1 = str_split($str);
//// 指定分割的每个字符串的长度
//$arr2 = str_split($str, 3);
//print_r($arr1);
//print_r($arr2);

//$str = 'dsfaaaaxcgvfdsadfbbbbgxcvbbbbcvxc';
//$search = 'adf';
//$replace = '111111';
////printf(str_replace($search, $replace, $str));
//$search = ['aaaa', 'bbbb'];
//print_r(str_replace($search, $replace, $str, $a));
//print_r($a);


//print_r(stripos('23456yuthgfdsadfghb6666vcxzasdfg', '6'));
//print_r(stripos('23456yuthgfdsadfghb6666vcxzasdfg', '6', 8));

//echo strlen('3e4r5ty67iuyhgfdsadfghjfdsadfb');
//
//echo strtolower('GHJHBVHJFGFGFD');
//echo strtoupper('123rsdfdsfghfdsfgHJFGFGFD');


//echo substr('1234567890abcdefg', 3, 5);
//echo substr('1234567890abcdefg', -3, 5);


//echo substr_replace('1234567890abcdefg', 33333333, 2);
//echo substr_replace('1234567890abcdefg', 33333333, 2, 4);

//echo substr_count('q4wtyrtrsaedfghseedfghfaxcsrewa4rf', 'sr');


echo substr('我爱1122我的祖国和人民123', 0, 12);


echo strlen('你好啊');
echo mb_strlen('你好啊', 'UTF-8');

//phpinfo();
































