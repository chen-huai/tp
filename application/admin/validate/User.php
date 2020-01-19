<?php
/**
 * Created by PhpStorm.
 * User: pan 潘宏远
 * Date: 2018/8/17
 * Time: 15:31
 * email: i@panhongyuan.com
 */

namespace app\admin\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name|用户名' => 'require|min:3',
        'password|密码' => 'require|min:6|confirm:repassword',
        'email|邮箱' => 'require',
    ];

    protected $message = [
        'name.require' => '用户名不能为空',
        'name.min' => '用户名长度不能小于3',
        'password.require' => '密码不能为空',
        'password.confirm' => '两次密码不一致',
        'email.require' => '邮箱不能为空'
    ];
}