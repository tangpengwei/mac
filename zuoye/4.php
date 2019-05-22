<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/22
 * Time: 上午11:33
 */


$c = 'HHHHHHH';

//在单引号声明的字符串中，变量以及大部分的转义字符不可以被解析，在双引号声明的字符串中可以
$a = '你好啊的鹅鹅鹅\'n1343tfddsxfh$c';
var_dump($a);
$b = "dsafdhjkxj\ns\"gfbhzxc{$c}jhkvbvjkhx";
var_dump($b);


$d = 'ABC';
$e = 1234;

echo $d.$e;

//echo 'ABC'.'3456';
echo '<br>';
echo 'ABC'..3456;

$f = <<<XVG
drsdfhgjhgfesdfgb
$c
asdfbfsdcvg
f
sdfdszdxcg csA
DXVGFD
ADZV BCSEDFB DSA
XVG;


echo $f;


$ff = <<<'ffsdsdggdfsdgfgdfgdf'
$c
rsdfghjhgsdfghfgsafdgf
dffdghghjdrs
xdgfnhfxcgvmhgfc
ffsdsdggdfsdgfgdfgdf;

echo $ff;