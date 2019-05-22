<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/29
 * Time: 下午2:52
 */

//print_r($_FILES);

class uploadx
{
    //一定要传绝对路径
    public $root = '';
    public $allow = ['jpg', 'jpeg', 'png', 'zip', 'rar', 'gif', 'ttf'];
    public $max = 2097152;

    public $error = '';

    /**
     * 单文件上传处理
     * @return array|bool
     */
    public function uploadOne($fileInfo = null)
    {
//        print_r($fileInfo);

        if ($fileInfo == null){
            $fileInfo = current($_FILES);
        }

        if (is_array($fileInfo['name'])){
            foreach ($fileInfo as $k=>$v){
                $fileInfo[$k] = $v[0];
            }
        }
        if($fileInfo['size'] == 0){
            $this->error = '请选择上传的文件';
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
            $this->error = '您上传的文件类型不符合要求';
            return false;
        }
        //自动生成文件的新名称
        $fileName = time().rand(100,999).'.'.$ext;

        //自动生成文件的保存目录(按年月保存)
        $saveDir = date('Y').'/'.date('m').'/';
        $this->root = rtrim($this->root, '/');
        $realDir = $this->root.'/'.$saveDir;

        if ($this->createDir($realDir)){

            if(move_uploaded_file($fileInfo['tmp_name'], $realDir.$fileName)){
                return [
                    'status' => 1,
                    'name' => $fileInfo['name'],
                    'size' => $fileInfo['size'],
                    'savedir' => $saveDir,
                    'savename' => $fileName,
                    'savepath' => $saveDir.$fileName
                ];
            }else{
                $this->error = '上传文件失败'.$fileInfo['error'];
                return false;
            }
        }else{
            return false;
        }
    }


    public function uploadMany()
    {
        $returnDate = [];

        if (count($_FILES) > 1){
            $newFile = $_FILES;

        }else{
            $files = current($_FILES);
            $newFile = [];
            if (is_array($files['name'])){

                foreach ($files['name'] as $k=>$v){
                    $tmp['name'] = $files['name'][$k];
                    $tmp['type'] = $files['type'][$k];
                    $tmp['tmp_name'] = $files['tmp_name'][$k];
                    $tmp['error'] = $files['error'][$k];
                    $tmp['size'] = $files['size'][$k];
                    $newFile[] = $tmp;
                }
            }
        }

        foreach ($newFile as $v){
            $res = $this->uploadOne($v);
            if($res){
                $returnDate[] = $res;
            }else{
                continue;
            }
        }

        return $returnDate;
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

//$m = new upload();
//$m->root = '/site/taobao.com/';
////print_r($m->uploadOne());
//
////var_dump($m->error);
//
//print_r($m -> uploadMany());
//print_r($m->error);