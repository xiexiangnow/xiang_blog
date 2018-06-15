<?php
namespace Mobile\Controller;
use Think\Controller;


class NewsController extends CommonController{

    /*列表*/
    public function news(){
        $param = $this->navQuery();

        if($param['nv']== 6 && $param['mu'] == 29){
            $this->message();
            die;
        }
        $nav = M ( 'Navigate' );
        $map['id'] = $param['mu'] ;

        $muinfo = $nav->where ( $map )->field('tpl_list,type')->find ();

        $tpl = $muinfo['tpl_list'];

        //获取二级目录的文档内容
        $article = D('Doc');
        $conds['category_id'] = $param['mu'] ;
        $conds['state'] = 1;
        $conds['hide_flag']=0;    
        $field = 'id,title,time,coverimg,description' ;
        $pagesize = 5;
        $order = 'top DESC,sort DESC,time DESC' ;
        $list = $article->search($conds,$field,$pagesize,$order);

        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);

            //如果只有一条记录则跳转到详细页面 或者栏目为单页
                if(1==count($list['list']) || 0==$muinfo['type']){
                    $tpl ='news_show';
                    $this->show($list['list'][0]['id'],$tpl);
                    exit;
                }
            $this->display($tpl);



    }


    /*内容*/
    public function show($id,$tpl=''){
        if(!$id || !is_numeric($id)){//错误传参 跳转首页
            $this->redirect("Mobile/index/index");
        }


        //基础信息
        $doc=M('doc');
        $base=$doc->where("id={$id} AND state=1 AND hide_flag=0")->find();


        if(!$base){//没有查询的和数据
            $this->redirect("Mobile/index/index");
        }

       

        $this->assign('base',$base);
        $this->assign('doc_title',$base['title']);

        $nav_ary = explode(',', $base['category_ids']);
        $param = $this->navQuery(array('nv'=>$nav_ary[0],'mu'=>$nav_ary[1]));
        if(empty($tpl)){
            $map['id'] = $param['mu'] ;
            $muinfo = M( 'Navigate' )->where ( $map )->field('tpl_info')->find ();
            $tpl = $muinfo['tpl_info'];
        }

        //详细信息
        if($base){
            $info=M('Doc_content')->where("id={$id}")->find();

            $this->assign('info',$info);

        }



        $this->display($tpl);
    }







    public function message(){

        if(IS_POST){

           $mesobj = new \Index\Model\MessageModel();

           $res=$mesobj->massage_add(1);

            if($res<0){
                switch($res){
                    case -1: $result['msg']="名字长度不符合规范";break;
                    case -2: $result['msg']="已提交留言信息 感谢支持";break;
                    case -3: $result['msg']="添加留言失败";break;
                    case -4: $result['msg']="手机格式错误";break;
                    case -5: $result['msg']="已提交留言信息 感谢支持";break;
                    case -6: $result['msg']="请填写姓名";break;
                }
                $this->error($result['msg']);
            }
            $this->success('提交成功：感谢支持',U('News/news'));
            die;
        }


        $this->display('message');
    }

}

?>