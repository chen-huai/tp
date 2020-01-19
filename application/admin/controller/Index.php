<?php
/**
 * Created by PhpStorm.
 * User: pan 潘宏远
 * Date: 2018/8/18
 * Time: 11:07
 * email: i@panhongyuan.com
 */

namespace app\admin\controller;

use think\Controller;
use app\admin\model\User;


class Index extends Controller
{
    public function login()
    {
        return $this->fetch();
    }

    public function check()
    {
        $data = input('post.');
        $user = new User();
        $result = $user->where('name', $data['name'])->find();
        if ($result) {
            if ($result['password'] === md5($data['password'])) {
                session('name', $data['name']);
            } else {
                $this->error('密码错误');
            }
        } else {
            $this->error('用户名不存在');
            exit();
        }

        if (captcha_check($data['code'])) {
            $this->success('验证码验证正确，登录成功', 'User/index');
        } else {
            $this->error('验证码错误');
        }
    }

    //用户退出登录的方法
    public function logout()
    {
        session(null);
        $this->success('退出登录成功', 'Index/login');
    }
}