<?php


namespace app\admin\validate;


use think\Validate;

class Client extends Validate
{
    protected $rule = [
        'name|客户名' => 'require|min:3',
        'password|密码' => 'require|min:6|confirm:repassword',
        'email|邮箱' => 'require',
        'phone|电话' => 'require',
    ];

    protected $message = [
        'name.require' => '客户名不能为空',
        'name.min' => '客户名长度不能小于3',
        'password.require' => '密码不能为空',
        'password.confirm' => '两次密码不一致',
        'email.require' => '邮箱不能为空',
        'phone.require' => '电话不能为空',
    ];
}