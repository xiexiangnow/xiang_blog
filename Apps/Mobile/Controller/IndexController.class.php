<?php
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $article = M('doc');
        $order="top DESC,sort DESC,time DESC" ;

        //加盟信息
        $data['category_id']=array('in',array(11,12,13,15,47,48,49,50));
        $data['hide_flag']=0;
        $data['state']=1;

        $news = $article->field('id,title,time')->where($data)->order($order)->limit(10)->select();




        $this->assign("news",$news);





        $this->display();
    }
}