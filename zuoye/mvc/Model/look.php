<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/8
 * Time: 上午10:27
 */

namespace Model;
class look
{
    protected $pdo;
    public  function __construct()
    {

        $this-> pdo =  new \PDO('mysql:host=127.0.0.1;dbname = shuju','root','t49057163');
//        $this-> pdo =  new \PDO('mysql:host=127.0.0.1;dbname = shuju','root','t49057163');
        $this->pdo=new \PDO('mysql:host=127.0.0.1;dbname=shuju','root','t49057163');









    }

    public function file(){
        echo '<br>';
        echo 111;


        $res=$this->pdo->query('select  *  from study');

        return $res->fetchAll(\PDO::FETCH_ASSOC);


    }







}
