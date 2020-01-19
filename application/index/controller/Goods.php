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


class Goods extends Base
{
    protected $is_check_login = ['*'];

    public function add()
    {
        echo '我想购买商品';
    }

    public function edit()
    {
        echo '我想退货';
    }

    public function delete()
    {
        echo '我不想买了';
    }
}