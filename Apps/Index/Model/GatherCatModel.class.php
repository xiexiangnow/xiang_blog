<?php
namespace Index\Model;
use Think\Model;
use Common\Model\CommonModel;

class GatherCatModel extends CommonModel{


    protected $_validate = array(
        array('node_id','require','投票内容必须选！'),  // 都有时间都验证
        );


    protected $_auto = array (
        array('time','time',1,'function'),// 对time字段在更新的时候写入当前时间戳


    );
    /**
     *添加数据
     * @author zhangxu 2015-06-10
     *
     */

    public function add_gather(){
        $data=$this->create();
        if(!$data){
            return $this->error;
        }


        if(is_array($data['node_id'])){
            foreach($data['node_id'] as $id){
                $ids .=$id.',';
            }
            $ids=substr($ids,0,-1);
            $data['node_id']=$ids;
        }


       $ip = getRealIp();
        $res=$this->check_time($ip);//ip判断用户时间

        if(!$res){
            return -1;
        }
        $data['ip'] = $ip;
       $res = $this->add($data);
        if(!$res){
            return -2;
        }
        if($res){//判断是否是多选
            if(!$ids){
              M('gather_node')->where('id='.$data['node_id'])->setInc('count');
            }else{
               $map['id']=array('in',$ids);
               M('gather_node')->where($map)->setInc('count');

            }
        }

        return $res;
    }

    /*判断投票时间*/
    public function check_time($ip){

        $ltime=C('VOTE_LIMIT_TIME');//投票时间间隔
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



}



?>