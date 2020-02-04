<?php


namespace app\admin\model;
use think\Model;
//软删除
use traits\model\SoftDelete;

class Rule extends Model
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';
    //自动完成字段
    protected $auto = ['ip'];

    protected function setIpAttr()
    {
        return request()->ip();
    }
}