<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/29
 * Time: 下午4:38
 */

class upload
{

    //上传文件的根目录
    public $root = '';
    //允许上传的文件后缀名
    public $allow = ['jpg', 'jpeg', 'png', 'zip', 'rar', 'gif', 'ttf'];
    //允许上传文件的最大字节数
    public $max = 2097152;
    // 记录上传中产生的错误信息
    public $error = '';

    public function uploadOne($fileInfo = null){

        if ($fileInfo == null){
            //如果uploadOne不是被其它方法调用，则从表单中获取数据
            $fileInfo = current($_FILES);
        }

        if (!is_string($fileInfo['name'])){
            $this->error = '数据格式有误';
            return false;
        }

        if ($fileInfo['size'] == 0){
            $this->error = '您没有上传任何数据';
            return false;
        }

        //验证大小
        if ($fileInfo['size'] > $this->max){
            $this->error = '您上传的文件过大';
            return false;
        }

        //文件后缀名处理
        $tmp = explode('.', $fileInfo['name']);
        $ext = end($tmp);

        if (!in_array($ext, $this->allow)){
            $this->error = '您上传的文件类型不再允许范围内';
            return false;
        }

        //自动生成文件的新名称
        $fileName = time().rand(100,999).'.'.$ext;

        //自动生成文件的保存目录(按年月保存)

        //从我们设置的上传根目录开始算起，后面的目录名称
        $saveDir = date('Y').'/'.date('m').'/';

        //为了统一规范，用户设置的根目录带不带最后结尾的/，我们都能处理
        $this->root = rtrim($this->root, '/');
        //文件在服务器上保存的绝对路径
        $realDir = $this->root.'/'.$saveDir;
        //由于保存文件的目录可能不存在，我们要确定其存在才能进行上传处理，如果不存在，我们先创建目录
        if ($this->createDir($realDir)){
            //将上传的临时文件移动到我们要保存的文件目录中
            if(move_uploaded_file($fileInfo['tmp_name'], $realDir.$fileName)){
                //如果移动成功，将上传者可能需要的数据返回
                return [
                    'status' => 1,
                    'name' => $fileInfo['name'],
                    'size' => $fileInfo['size'],
                    'savedir' => $saveDir,
                    'savename' => $fileName,
                    'savepath' => $saveDir.$fileName
                ];
            }else{
                $this->error = '文件上传失败';
                return false;
            }
        }
    }

    public function uploadMany(){

        $check = current($_FILES);
        //如果从用户表单中获取的数据格式不符合规范，我们转成规范的即可
        if(is_array($check['name'])){
            $newDate = [];
            foreach ($check['name'] as $k=>$v){
//                print_r($k);
                $tmp['name']     = $check['name'][$k];
                $tmp['type']     = $check['type'][$k];
                $tmp['tmp_name'] = $check['tmp_name'][$k];
                $tmp['error']    = $check['error'][$k];
                $tmp['size']     = $check['size'][$k];
//                print_r($tmp);
                $newDate[] = $tmp;
            }
        }else{
            $newDate = $_FILES;
        }

        //程序运行到这里的时候，数据格式已经统一
        $info = [];
        foreach ($newDate as $v){
            if ($res = $this->uploadOne($v)){
                $info[] = $res;
            }
        }
        return $info;
    }



    /**
     * 自动递归创建目录
     * @param $dir
     * @param string $parent
     * @return bool
     */
    protected function createDir($dir, $parent='/'){
        $dirs = explode('/', $dir);
        if($dirs[0] == ''){
            //绝对路径的处理的方式
            //上级目录
            $parent = '/';
            //本级目录的名字
            if (isset($dirs[1])) {
                $path = $parent . $dirs[1];
                $offset = 2;
            }
        }else{
            //相对路径
            $path = $parent.'/'.$dirs[0];
            $offset = 1;
        }

        if (!isset($path)){
            return false;
        }
        //判断该目录是否存在
        if (!file_exists($path)){
            //判断上级目录是否可写入
            if (is_writable($parent)){
                //创建目录
                if (!mkdir($path, 0777)){
                    $this->error = $path.'目录创建失败';
                    return false;
                }
                $this->createDir(implode('/', array_slice($dirs, $offset)), $path);
            }else{
                $this->error = $parent.'目录没有写入权限';
                return false;
            }
        }else{
            $this->createDir(implode('/', array_slice($dirs, $offset)), $path);

        }
        return true;
    }

}

$m = new upload();

print_r($m->uploadMany());