<?php
/**
 * User: Frank
 * Date: 2020/02/10
 */

namespace app\admin\model;

use think\Model;
//软删除
use traits\model\SoftDelete;


class User extends Model
{
    use SoftDelete;
    protected static $deleteTime = 'delete_time';
    //自动完成字段
    protected $auto = ['ip', 'password', 'repassword'];

    protected function setIpAttr()
    {
        return request()->ip();
    }

    protected function setPasswordAttr($value)
    {
        return md5($value);
    }

    protected function setRepasswordAttr($value)
    {
        return md5($value);
    }
}