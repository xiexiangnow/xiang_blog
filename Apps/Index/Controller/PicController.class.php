<?php
namespace Index\Controller;
use Think\Controller;


class PicController extends CommonController {

    public function index(){
		//一级目录
		$nav=M('Navigate');
		$data['is_show']=1;
		$data['level']=1;
		$re=$nav->where($data)->order('sort desc')->select();
		$this->assign('nav',$re);
		//var_dump($re);

        //二级目录
		$data['is_show']=1;
		$data['level']=2;
		$er_re=$nav->where($data)->order('sort desc')->select();
		$this->assign('er',$er_re);

		//查询出二级菜单
		$pid=$_GET['pid'];
		$cai=M('Navigate');
		$cai_arr=$cai->where("pid={$pid}")->order("id")->select();
		$this->assign('list',$cai_arr);

		//接受一级菜单名字 
        $t=$_GET['t'];
        $this->assign('t',$t);
		$this->display();
	}

}






?>