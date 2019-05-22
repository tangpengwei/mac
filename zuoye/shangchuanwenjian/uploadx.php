<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/6
 * Time: 上午9:50
 */

//print_r($_FILES);

class uploadx
{
    //路径：绝对路径
    public $root = '';
    //允许的格式
    public $allow = ['jpg', 'jpeg', 'png', 'zip', 'txt', 'rar', 'tar', 'ttf'];
    //允许的最大图片的尺寸
    public $max = 2097152;
    //收集错误信息
    public $error = '';

//    //单文件上传
//    public function uploadOne($fileInfo = null)
//    {
//        //判断uploadOne（）是否传参  如果不传参 则从文件上传信息中获取
//        if ($fileInfo == null) {
//            $fileInfo = current($_FILES);
//        }
//        //判断$fileInfo的name属性是不是一个数组  如果是一个数组K就把他的第零个值赋值给$fileInfo
//        if (is_array($fileInfo['name'])) {
//            foreach ($fileInfo as $K => $v) {
//                $fileInfo[$K] = $v[0];
//            }
//        }
//        //通过判断size是否存在  如果为零，继而判断上传文件为空 返回一个值为失败
//        if ($fileInfo['size'] == 0) {
//            $this->error = '请选择上传的文件';
//            return false;
//        }
//        //通过比较上传文件的大小继而限制上传的最大容量  返回一个错误信息
//        if ($fileInfo['size'] > $this->max) {
//            $this->error = '你上传的文件过大';
//            return false;
//        }
//        //通过explode 函数  把$fileInfo 的name属性的文件格式后缀提取出来
//        $tmp = explode('.', $fileInfo['name']);
//        $ext = end($tmp);
//        //判断上传的文件后缀符不符合allow数组里面的内容   不符合就上传错误信息 并返回一个失败值
//        if (!in_array($ext, $this->allow)) {
//            $this->error = '你上传的文件不符合类型';
//            return false;
//        }
//        //定义一个自动生成文件的新名称
//        $fileName = time() . rand(100, 999) . '.' . $ext;
//        //生成文件的目录 并以年月的形式保存起来
//        $saveDir = date('Y') . '/' . date('m') . '/';
//        //把root右边的带'/'的全部去掉
//        $this->root = rtrim($this->root, '/');
//        //文件路径
//        $realDir = $this->root . '/' . $saveDir;
//        //判断文件是绝对路径还是相对路径
//        if ($this->createDir($realDir)) {
//            //判断上传的文件是否移动到指定位置
////            print_r($fileInfo['tmp_name']);
////            echo '<br>';
////            print_r($realDir);
//            if (move_uploaded_file($fileInfo['tmp_name'], $realDir.$fileName)) {
//
//
//                return [
//                    //显示成功信息
//                    'status' => 1,
//                    'name' => $fileInfo['name'],
//                    'size' => $fileInfo['size'],
//                    'savedir' => $saveDir,
//                    'savename' => $fileName,
//                    'savepath' => $saveDir . $fileName
//                ];
//            } else {
//
//                //如果上传不成功 则上传失败信息
//                $this->error = '上传文件失败' . $fileInfo['error'];
//                return false;
//            }
//        } else {
//            //如果上传的不是绝对路径 直接返回 false
//            return false;
//        }
//    }






    public function uploadMany()
    {

        //创建一个新数组变量$returnDate
        $returnDate = [];
//       如果通过$_FILES得到的数组长度大于1  把这个数组赋值给一个变量 $newFile
        if (count($_FILES)>1){
            $newFile = $_FILES;

        }else {
            //如果数组长度不大于1  把当前指向的$_FILES 赋值给$files
            $files = current($_FILES);
            //新建一个新的空数组
            $newFile = [];
            //判断$files['name']是不是一个数组
            print_r($files['name']);
            if (is_array($files['name'])) {
                //如果是一个数组  遍历这个数组  并且把里边的值重新赋值给变量
                foreach ($files['name'] as $k => $v) {
                    $tmp['name'] = $files['name'][$k];
                    $tmp['type'] = $files['type'][$k];
                    $tmp['tmp_name'] = $files['tmp_name'][$k];
                    $tmp['error'] = $files['error'][$k];
                    $tmp['size'] = $files['size'][$k];
                    //把$tmp这个数组重新赋值给$newFile
                    $newFile[] = $tmp;

                }
            }
        }
            //遍历$newFile 关联数组
        foreach ($newFile as $v) {
                    //把遍历的值$v赋值给$res变量
                    $res = $this->uploadOne($v);
                    //如果$res有意义
                    if ($res){
                        //把$res 的值赋值给$returnDate
                        $returnDate[]= $res;
                    }else{
                        //如果$res 没有意义的情况下 跳出本次循环
                        continue;
                    }
                    //返回一个$returnDate 的值
                    return $returnDate;

            }

    }








    public function uploadOne($fileInfo = null){
    if ($fileInfo == null){
        $fileInfo = current($_FILES);
    }


    if (!is_string($fileInfo['name'])){
        print_r($fileInfo['name']);
        $this->error = '数据格式有误';
        return false;
    }
    if ($fileInfo['size'] == 0){
        $this->error = '您没有上传文件,请上传文件';
        return false;
    }
    if ($fileInfo['size'] > $this->max){
        $this->error = '上传文件过大';
        return false;
    }
    $tmp = explode('.',$fileInfo['name']);
    $end = end($tmp);
    if (!in_array($end, $this->allow)){
        $this->error = '你上传的文件格式不对';
        return false;
    }
    $fileName = time().rand(100,999).'.'.$end;
    $saveDir = date('Y').'/'.date('m').'/';
    $this->root = rtrim($this->root,'/');
    $realDir = $this->root.'/'.$saveDir;
    if ($this->createDir($realDir)){
        if (move_uploaded_file($fileInfo['tmp_name'],$realDir.$fileName)){
            return[
                'status'=>1,
                'name'=>$fileInfo['name'],
                'size'=>$fileInfo['size'],
                'savedir'=>$saveDir,
                'savename'=>$fileName,
                'savepath'=>$realDir.$fileName
            ];
        }else{
            $this->error = '文件上传失败';
            return false;
        }
    }
}






//public function uploadMany(){
//        //指向通过$_FILE传过来第一个元素
//        $check = current($_FILES);
////            print_r($check['name']);
//        if (is_array($check['name'])){
//            $newDate = [];
//            foreach ($check['name'] as $k=>$v){
//                $tmp['name']= $check['name'][$k];
//                $tmp['type']= $check['type'][$k];
//                $tmp['tmp_name']= $check['tmp_name'][$k];
//                $tmp['size']= $check['size'][$k];
//                $tmp['error']= $check['error'][$k];
//                $newDate[] = $tmp;
//            }
//
//
//        }else{
//            $newDate = $_FILES;
//        }
//        $info = [];
//
//
//        foreach ($newDate as $v){
//            if ($res=$this->uploadOne($v)){
//                $info[] = $res;
//
//            }
//        }
//        return $info;
//}



//自动创建递归目录
    protected function createDir($dir, $parent = '/')
    {
        //把参数传过来的路径名称通过/分割成为若干个数组
        $dirs = explode('/', $dir);
        //如果分割之后的数组的第零个值为空 说明为绝对路径  即下面为绝对路劲的处理方法
        if ($dirs[0] == '') {
            //根目录
            $parent = '/';
            //判断分割之后数组的第一个值是不是为null 如果不为null
            if (isset($dirs[1])) {
                // 把根目录和$dirs[1]拼接起来
                $path = $parent . $dirs[1];
                //偏移量
                $offset = 2;
            }

        } else {
            //即为传的参数为相对路径
            //那就把/ 和$dirs的第零个拼接
            $path = $parent .'/'. $dirs[0];
            //偏移量
            $offset = 1;
        }
        //如果$path路径为空  返回一个失败值
        if (!isset($path)) {
            return false;
        }
//判断文件路径是否存在

        if (!file_exists($path)) {
            //判断上级目录是否可写
            if (is_writable($parent)) {
                //如果可写
                //创建目录
                //判断目录是不是创建成功
//                print_r($path);
                if (!mkdir($path, 0777)) {
                    //创建失败 即储存一个报警信息
                    $this->error = $path . '创建文件目录失败';
                    //返回一个false
                    return false;
                }
                //递归创建目录
                $this->createDir(implode('/', array_slice($dirs, $offset)), $path);
            } else {
                $this->error = $parent . '目录没有写入权限';
                return false;
            }

        } else {
            //如果文件存在直接递归创建目录
            $this->createDir(implode('/', array_slice($dirs, $offset)), $path);
        }
        return true;
    }

}


//print_r($_FILES);

$m = new uploadx();

$m->root = '/taobo';
//
//print_r($m->uploadOne());

echo '<br>';
var_dump($m->error);

print_r($m -> uploadMany());
//print_r($m->error);




