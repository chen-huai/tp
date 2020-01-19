<?php
/**
 * Created by PhpStorm.
 * User: pan 潘宏远
 * Date: 2018/8/19
 * Time: 14:40
 * email: i@panhongyuan.com
 */

namespace app\admin\controller;

use think\Controller;


class Base extends Controller
{
    public function _initialize()
    {
        if (!session('name')) {
            $this->error('请先登录系统', 'Index/login');
        }
    }
}