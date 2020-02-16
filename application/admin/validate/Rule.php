<?php


namespace app\admin\validate;


use think\Validate;

class Rule extends Validate
{
    protected $rule = [
        'name|权限名' => 'require|min:3',
    ];
    protected $message = [
        'name.require' => '权限名不能为空',
        'name.min' => '权限名长度不能小于3',
    ];
}