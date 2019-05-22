<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/29
 * Time: 上午8:47
 */

//print_r($_FILES['xxx']['error']);
//print_r($_FILES['xxx']['name']);


//if ($_FILES['xxx']['size'] > 2097152){
//    echo '您上传的文件过大';exit();
//}
//
//$tmp = explode('.', $_FILES['xxx']['name']);
//$ext = end($tmp);
//
//
//$allow = ['jpg', 'png', 'zip'];
//
//if (!in_array($ext, $allow)){
//    echo '您上传的文件类型不符合要求';exit();
//}
//
//$fileName = time().rand(100,999).'.'.$ext;
//
//
//$root = '/site/taobao.com/';
//
//date('Y');
//date('m');
//
//mkdir($root.date('Y'), 0777);

//$command = 'mkdir '.$root.date('Y');
////echo $command;
//$command2 = 'mkdir '.$root.date('Y').'/'.date('m');
//echo system($command);
//echo system($command2);


//var_dump(move_uploaded_file($_FILES['xxx']['tmp_name'], $root.$fileName));



///site/taobao.com/2019/11/22/34/44
/**
 * 递归创建目录（仅支持绝度路径传参）
 * @param $dir
 * @param string $parent
 */
//function createDir($dir, $parent='./'){
//    $dirs = explode('/', $dir);
//    if($dirs[0] == ''){
//        //绝对路径的处理的方式
//        //上级目录
//        $parent = '/';
//        //本级目录的名字
//        if (isset($dirs[1])){
//            $path = $parent.$dirs[1];
//            //判断该目录是否存在
//            if (!file_exists($path)){
//                //判断上级目录是否可写入
//                if (is_writable($parent)){
//                    //创建目录
//                    if (!mkdir($path, 0777)){
//                        echo $path.'目录创建失败';exit();
//                    }
//                    createDir(implode('/', array_slice($dirs, 2)), $path);
//                }else{
//                    echo $parent.'目录没有写入权限';exit();
//                }
//            }
//        }
//    }else{
//        //相对路径
//
//        $path = $parent.'/'.$dirs[0];
//        if (!file_exists($path)){
//            //判断上级目录是否可写入
//            if (is_writable($parent)){
//                //创建目录
//                if (!mkdir($path, 0777)){
//                    echo $path.'目录创建失败';exit();
//                }
//                createDir(implode('/', array_slice($dirs, 1)), $path);
//            }else{
//                echo $parent.'目录没有写入权限';exit();
//            }
//        }
//    }
//}


//function createDir($dir, $parent='/'){
//    $dirs = explode('/', $dir);
//    if($dirs[0] == ''){
//        //绝对路径的处理的方式
//        //上级目录
//        $parent = '/';
//        //本级目录的名字
//        if (isset($dirs[1])) {
//            $path = $parent . $dirs[1];
//            $offset = 2;
//        }
//    }else{
//        //相对路径
//        $path = $parent.'/'.$dirs[0];
//        $offset = 1;
//    }
//    if (!isset($path)){
//        exit();
//    }
//    //判断该目录是否存在
//    if (!file_exists($path)){
//        //判断上级目录是否可写入
//        if (is_writable($parent)){
//            //创建目录
//            if (!mkdir($path, 0777)){
//                echo $path.'目录创建失败';exit();
//            }
//            createDir(implode('/', array_slice($dirs, $offset)), $path);
//        }else{
//            echo $parent.'目录没有写入权限';exit();
//        }
//    }
//}




//createDir('/site/taobao.com/2019/11/22/34/44');
//createDir('site1/taobao.com/2019/11/22/34/44');
//createDir('../site2/taobao.com/2019/11/22/34/44');
