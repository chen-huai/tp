<?php
/**
 * User: Frank
 * Date: 2020/02/10
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