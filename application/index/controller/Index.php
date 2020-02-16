<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Person as PersonModel;
use app\index\validate\Person as PersonValidate;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }

    public function register()
    {
        return $this->fetch();
    }

    public function add()
    {
        $data = input('post.');

        $val = new PersonValidate();
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit();
        }

        $user = new PersonModel($data);
        $ret = $user->allowField(true)->save();
        if ($ret) {
            $this->success('恭喜您注册成功', 'Index/index');
        } else {
            $this->error('用户注册失败');
        }
    }

    public function check(){

        $data = input('post.');
        $person = new PersonModel();
        $result = $person->where('name', $data['name'])->find();
        if ($result) {
            if ($result['password'] === $data['password']) {
                session('name', $data['name']);
            } else {
                $this->error('密码错误');
            }
        } else {
            $this->error('用户名不存在');
            exit();
        }

        if (captcha_check($data['code'])) {
            $this->success('验证码验证正确，登录成功', 'Index/index');
        } else {
            $this->error('验证码错误');
        }
    }
}
