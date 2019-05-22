<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/7
 * Time: 下午8:39
 */
interface ssd
{
    public function xxx();
}
interface hd
{
    public function yyy();
    public function zzz();
}
class yp implements ssd,hd
{
    public function xxx()
    {
        // TODO: Implement xxx() method.
    }
    public function yyy()
    {
        // TODO: Implement yyy() method.
    }
    public function zzz()
    {
        // TODO: Implement zzz() method.
    }
}