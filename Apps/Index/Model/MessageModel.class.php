<?php
namespace Index\Model;
use Common\Model\CommonModel;

class MessageModel extends CommonModel{

	/* 自动验证规则 */
//	protected $_validate = array(
//			array('title', 'require', '标题不能为空!'),
//			array('content','require','留言内容不能为空'),
//	);
	
	/* 自动完成 */
	protected $_auto = array(
			array('time','time',1,'function'),
			array('ip','get_client_ip',1,'function')
	);

    /**
     * 加盟信息添加
     * @author zhangxu  2015-06-17
     * @param int $type 1留言 2加盟
     * @return -1   名字长度不符合规范
     * @return -2 您已添加加盟信息 感谢支持（未超过超过时间限制）
     * @return -3 添加数据失败
     * @return -4 不是手机号
     * @return -5 您已添加加盟信息 感谢支持
     * @return -6 请填写姓名
     */
    public function massage_add($type=1){

        $data=$this->create();
        if(!$data){
            $this->error;
        }

       $len = mb_strlen($data['user_name'],'utf8');

        if($len>10){//名字长度
            return -1;
        }
        if(!$data['user_name']){
            return -6;
        }


        $is_tel = is_mobile($data['tel']);
        if(!$is_tel){
            return -4;
        }
        $data['type']=$type;
        $res=$this->check_time($data['ip'],$type);
        if(!$res){
            return -2;
        }

        $re=$this->add($data);
        if(!$re){
            return -3;
        }
        return $res;
    }


    /*客服IP判断上传时间*/
    public function check_time($ip,$type=1){

//        if($type==2){
//            $ltime=C('JOIN_LIMIT_TIME');//加盟时间间隔
//
//            $tmp['type']=$type;
//        }else{
//            $ltime=C('MESSAGE_LIMIT_TIME');//留言时间间隔
//        }
        $ltime=1;
        $tmp['ip']=$ip;
        $data = $this->where($tmp)->order('time desc')->find();

        if(!$data){//没记录
            return true;
        }else{
            if($ltime==0){//只能投一次票
                return false;
            }
        }

        $diff=abs($data['time']-time());//上次投票时间离现在多少时间（秒）
        $diff=floor($diff/60);

        if($diff<$ltime){//小于配置时间
            return false;
        }
        return true;
    }


    public function lists($pagesize=12){
        $order="top desc,sort desc,time desc";
        $where['state']=1;
        $where['hide_flag']=0;
        $where['type']=1;
        $where['isreply']=1;
        $count=$this->where($where)->count();
        $page=new \Think\Page($count,$pagesize);
        $lists=$this->where($where)->order($order)->limit($page->firstRow. ',' . $page->listRows)->select();
        $page->setConfig('first', '首页');
        $page->setConfig('end', '尾页');
        $page->setConfig('theme','%FIRST% %LINK_PAGE% %END% %HEADER%');
        $list=array('list'=>$lists,'page'=>$page->show());

        return $list;
    }








}