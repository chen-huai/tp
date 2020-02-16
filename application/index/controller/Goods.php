<?php
/**
 * User: Frank
 * Date: 2020/02/10
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