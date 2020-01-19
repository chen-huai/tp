<?php
/**
 * Created by PhpStorm.
 * User: pan 潘宏远
 * Date: 2018/8/19
 * Time: 19:10
 * email: i@panhongyuan.com
 */

namespace app\index\controller;

use app\index\controller\Base;


class Comment extends Base
{
    protected $is_check_login = ['add','edit'];
    public function add()
    {
        echo '我想发表评论';
    }

    public function edit()
    {
        echo '我想编辑评论';
    }
}