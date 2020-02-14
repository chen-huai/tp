<?php
/**
 * User: Frank
 * Date: 2020/02/10
 */

namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Base;
use app\admin\model\User as UserModel;
use app\admin\validate\User as UserValidate;
use think\Db;
use think\Model;


class User extends Base
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
        $data = UserModel::all();
        //dump($data);
        //$page = $data->render();
        $ruleData = Db::name('rule')->select();
        $userRuleData = Db::name('user_rule')->select();
        $clientData = Db::name('client')->select();
        $userClientData = Db::name('user_client')->select();
        $ruleName = Array();
        $clientName = Array();
        foreach ($data as $kd=>$vd)
        {
            //dump($vd['id']);
            $uid = $vd['id'];
            $ruleName[$uid] = Array();
            foreach ($userRuleData as $kur=>$vur)
            {

                //获取rule关系，并与u_id对应
                //dump($vur['u_id']);
                //dump($vd['id']);
                if ($vur['u_id'] == $vd['id']) {
                    foreach ($ruleData as $kr => $vr) {
                        //dump($vr);
                        if ($vur['r_id'] == $vr['id']) {
                            $ruleName[$uid][] = $vr['name'];
                        }
                    }
                }
            }
            $ruleName[$uid] = implode('、', $ruleName[$uid]);
            //dump($ruleName);
            //获取client关系，并与u_id对应
            $clientName[$uid] = Array();
            foreach ($userClientData as $kuc=>$vuc)
            {
                //dump($vur['u_id']);
                if ($vuc['u_id']==$vd['id'])
                {
                    foreach ($clientData as $kc=>$vc)
                    {
                            if ($vuc['c_id']==$vc['id'])
                            {
                                $clientName[$uid][]=$vc['name'];
                            }
                    }
                }
            }
            $clientName[$uid] = implode('、', $clientName[$uid]);

            $userData[$uid] = array(
                'id'=>$vd['id'],
                'name'=>$vd['name'],
                'password'=>$vd['password'],
                'email'=>$vd['email'],
                'create_time'=>$vd['create_time'],
                'ruleName'=>$ruleName[$uid],
                'clientName'=>$clientName[$uid],
            );
        }
        $this->assign('data', $userData);
        return $this->fetch();

        //原渲染代码
        /*
        $data = UserModel::paginate(6);
        $page = $data->render();
        $this->assign('data', $data);
        $this->assign('page', $page);
        $this->assign('ruleName',$ruleName);
        $this->assign('clientName',$clientName);
        return $this->fetch();*/

    }

    public function add()
    {
        $data = Db::name('rule')->select();
        $ruleData = array();
        foreach ($data as $k=>$d){
            $ruleData[$d['id']]=$d['name'];
        }
        $this->assign('ruleData',$ruleData);

        $data = Db::name('client')->select();
        $clientData = array();
        foreach ($data as $k=>$d){
            $clientData[$d['id']]=$d['name'];
        }
        $this->assign('clientData',$clientData);

        return $this->fetch();
    }

    public function edit()
    {
        $id = input('get.id');
        $data = UserModel::get($id);
        $this->assign('data', $data);
        //获取rule列表关系
        $data = Db::name('rule')->select();
        $ruleData = array();
        foreach ($data as $k=>$d){
            $ruleData[$d['id']]=$d['name'];
        }
        $this->assign('ruleData',$ruleData);
        //获取client列表关系
        $data = Db::name('client')->select();
        $clientData = array();
        foreach ($data as $k=>$d){
            $clientData[$d['id']]=$d['name'];
        }
        $this->assign('clientData',$clientData);
        return $this->fetch();
    }

    /*
     * 新增管理员的方法
     * */
    public function insert()
    {

        $data = input('post.');
        //获取数据
        //dump($data);
        //die;
        $val = new UserValidate();
        //验证是否符合规则
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit();
        }
        $user = new UserModel($data);
        $ret = $user->allowField(true)->save();
        //dump($user->id);
        //die;
        //插入数据
        //dump($ret)
        //die
        if ($ret) {
            $userData = $user->id;
            //dump($userData);
            if (!empty($data['ruleId'])) {
                foreach ($data['ruleId'] as $k => $v) {
                    $group = array(
                        'u_id' => $userData,
                        'r_id' => $v
                    );
                    Db::name('user_rule')->insert($group);
                }
            }
            if (!empty($data['clientId'])) {
                foreach ($data['clientId'] as $k => $v) {
                    $group = array(
                        'u_id' => $userData,
                        'c_id' => $v
                    );
                    Db::name('user_client')->insert($group);
                }
            }
            $this->success('新增用户成功', 'User/userList');
        } else {
            $this->error('新增用户失败');
        }
    }

    //提交用户信息更新
    public function update()
    {
        $data = input('post.');
        //dump($data);
        $id = input('post.id');
        $val = new UserValidate();
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit();
        }
        $user = new UserModel();
        $ret = $user->allowField(true)->save($data, ['id' => $id]);
        if ($ret) {
            Db::name('user_rule')->where(array('u_id' => $id))->delete();
            Db::name('user_client')->where(array('u_id' => $id))->delete();
            if (!empty($data['ruleId'])) {
                foreach ($data['ruleId'] as $k => $v) {
                    $group = array(
                        'u_id' => $id,
                        'r_id' => $v
                    );
                    Db::name('user_rule')->insert($group);
                }
            }
            if (!empty($data['clientId'])) {
                foreach ($data['clientId'] as $k => $v) {
                    $group = array(
                        'u_id' => $id,
                        'c_id' => $v
                    );
                    Db::name('user_client')->insert($group);
                }
            }
            $this->success('修改用户信息成功', 'User/userlist');
        } else {
            $this->error('修改用户信息失败');
        }
    }

    //删除用户信息
    public function delete()
    {
        //实现软删除的方法

        $id = input('get.id');
        $ret = UserModel::destroy($id);
        if ($ret) {
            $this->success('删除用户成功', 'User/userlist');
        } else {
            $this->error('删除用户失败');
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
    public function test()
    {
        $data=Db::view('user','id,name,password,email')
            ->view('user_rule','r_id','user_rule.u_id=user.id')
            ->view('user_client','c_id','user_client.u_id=user.id')
            ->order('id','asc')
            ->select()            ;
        //return Db:: getLastSql();
        dump($data);
        die;

    }
}