<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
    public function index(){


      

       $map['hide_flag'] = 0;
       $map['state'] = 1 ; 
       $order = "top DESC,sort DESC,id DESC" ;

     //首页bannar图
       $adv=M('Advert');
       $where['state']=1;
       $where['posi']=1;
       $where['hide_flag']=0;
       $bannar=$adv->where($where)->order($order)->limit(5)->select();
       $this->assign('bannar',$bannar);
     
     
    //文章列表
       $doc=M('Doc');
       unset($where);
       $where['category_id']=2;
       $where['state']=1;
       $where['hide_flag']=0;
       $doc_list=$doc->where($where)->order($order)->limit(6)->select();
       $this->assign('doc_list',$doc_list);

     //首页中间3图区域  
       $nav=M('Navigate');
       unset($map);
       $map['id']=1;
       $map['is_show']=1;
       $map['is_nav']=1;
       $bo_info=$nav->where($map)->field('id,info,img')->find();
       $this->assign('bo_info',$bo_info);
      
       $map['id']=6;
       $zuo_info=$nav->where($map)->field('id,info,img')->find();
       $this->assign('zuo_info',$zuo_info);
       
       $map['id']=10;
       $ce_info=$nav->where($map)->field('id,info,img')->find();
       $this->assign('ce_info',$ce_info);



      //留言列表
        unset($where);
        $mes=M('Message');
        $where['isreply']=1;
        $where['state']=1;
        $where['hide_flag']=0;
        $mes_res=$mes->where($where)->order($order)->limit(20)->select();
        $this->assign('mes_res',$mes_res);

         

      //友情链接
       unset($where);
       $link=M('Link');
       $where['state']=1;
       $where['hide_flag']=0;
       $link_arr=$link->where($where)->order($order)->limit(10)->select();
       $this->assign('link_list',$link_arr);
   







        if(IS_POST){


                /*加盟信息添加*/
                $mesobj = D('Message');
                $res = $mesobj->massage_add(2);

                if($res<0){
                    switch($res){
                        case -1: $result="名字长度不符合规范";break;
                        case -2: $result="您已提交加盟信息 感谢支持";break;
                        case -3: $result="添加数据失败";break;
                        case -4: $result="手机格式错误";break;
                        case -5: $result="您已提交加盟信息 感谢支持";break;
                        case -6: $result="请填写姓名";break;
                    }

                    $this->error($result);
                }
                $this->success('提交成功：我们近期会联系您的');
        }else{
            $this->navQuery($param);
            $this->display();
        }
    }
    
}