<?php


namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
use app\admin\model\Client as UserModel;
use app\admin\validate\Client as UserValidate;

class Client extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    //用户列表
    public function userlist()
    {
        //显示所有数据
        //首先将database中'auto_timestamp'  => 'datetime',
        /*$data = UserModel::all();
        $this->assign('data', $data);
        return $this->fetch();*/

        //分页显示数据
        $data = UserModel::order('id','asc')->paginate(6);

        $page = $data->render();
        $this->assign('data', $data);
        $this->assign('page', $page);
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }

    public function edit()
    {
        $id = input('get.id');
        $data = UserModel::get($id);
        $this->assign('data', $data);
        return $this->fetch();
    }

    /*
     * 新增管理员的方法
     * */
    public function insert()
    {
        $data = input('post.');
        //获取数据
        //dump($data)
        //die
        $val = new UserValidate();
        //验证是否符合规则
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit();
        }
        $user = new UserModel($data);
        $ret = $user->allowField(true)->save();
        //插入数据
        //dump($ret)
        //die
        if ($ret) {
            $this->success('新增客户成功', 'Client/userList');
        } else {
            $this->error('新增客户失败');
        }
    }

    //提交用户信息更新
    public function update()
    {
        $data = input('post.');
        $id = input('post.id');
        $val = new UserValidate();
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit();
        }
        $user = new UserModel();
        $ret = $user->allowField(true)->save($data, ['id' => $id]);
        if ($ret) {
            $this->success('修改客户信息成功', 'Client/userlist');
        } else {
            $this->error('修改客户信息失败');
        }
    }

    //删除用户信息
    public function delete()
    {
        //实现软删除的方法

        $id = input('get.id');
        $ret = UserModel::destroy($id);
        if ($ret) {
            $this->success('删除客户成功', 'Client/userlist');
        } else {
            $this->error('删除客户失败');
        }

        //实现真实删除的方法
        /*
        $id = input('get.id');
        $ret = UserModel::destroy($id, true);
        if ($ret) {
            $this->success('删除用户成功', 'User/userlist');
        } else {
            $this->error('删除用户失败');
        }*/
    }
}