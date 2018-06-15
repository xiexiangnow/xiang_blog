<?php
namespace Index\Controller;
use Think\Controller;
use Index\Controller\CommonController;
/*
*留言板处理
*/

class MesController extends CommonController {
	
	protected $mes ;
	
	function _initialize(){
		parent::_initialize();
		$this->mes = new \Index\Model\MessageModel();
	}

	public function index(){
			
		$where['isreply']=1;
		$where['state']=1;   //1显示，0隐藏
		$where['hide_flag']=0;				        
		$field='*' ;
		$pagesize = 10 ;
		$order = 'top desc,sort desc,id desc' ;
		$res = $this->mes->search($where,$field,$pagesize,$order);
		
        $this->assign('mes_list',$res['list']);
		$this->assign('page',$res['page']);

	    $this->display();
	}

	
	
	public function edit(){
		//检查上传留言时间，不能小于一个小时
		$ip = get_client_ip();
		$where = "ip='{$ip}'" ;
		$last=$this->mes->field('time')->where($where)->order('id desc')->find();
		if($last && (NOW_TIME-$last['time'])<5){
			$this->error('您已留个言了，请稍后再试');
		}
		
		
		$data['title'] = I('title');
		$data['user_name'] = I('user_name');
		$data['tel'] = I('tel');
		$data['content'] = I('content');
		
		$c=$this->mes->create($data);
		if(!$c){
			$this->error($this->mes->error());
		}
		$res = $this->mes->add();
		if($res){
			$this->success('留言成功');
			exit;
		} 
		
		$this->error('留言失败');
	}
	
	
	

	 //添加留言
	public function jia(){
		if(empty($_POST['username'])){
			$this->error('姓名不能为空！');
		}elseif(empty($_POST['tel'])){
			$this->error('电话不能为空！');
		}elseif(empty($_POST['content'])){
			$this->error('留言内容不能为空！');
		}

		$m=M('Message');
		 $m->user_name=$_POST['username'];
		 $m->tel=$_POST['tel'];
		 $m->content=$_POST['content'];
		 $m->posttime=date('Y-m-d H:i:s',time());
		 $m->display=1;        //1显示  2隐藏  0回收站
		$re=$m->add();
		if($re>0){
			$this->success('留言成功！',U('Mes/index'));
		}else{
			$this->error('留言失败！');
		}

	}
}






?>