<?php
/**
 * Created by PhpStorm.
 * User: pan 潘宏远
 * Date: 2018/8/19
 * Time: 15:01
 * email: i@panhongyuan.com
 */

namespace app\index\validate;

use think\Validate;


class Person extends Validate
{
    protected $rule = [
        'name|用户名' => 'require|min:3',
        'password|密码' => 'require|min:6|confirm:repassword',
    ];

    protected $message = [
        'name.require' => '用户名不能为空',
        'name.min' => '用户名长度不能小于3',
        'password.require' => '密码不能为空',
        'password.confirm' => '两次密码不一致'
    ];
}