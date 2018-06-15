<?php
namespace Index\Controller;
use Think\Controller;

/**
 * 标签列表页
 **/
class TypelistController extends CommonController {

    /**
     * 通过标签检索出来的列表页
     **/
    public function index(){
        $param = $this->navQuery();

        $article_type = I('article_type');

        //错误传参
        if(!$param['nv'] || !is_numeric($param['nv']) || !$param['mu']){
            $this->redirect('/');
        }

        //查询目录的相关信息
        $nav = M ( 'Navigate' );
        $map['id'] = $param['mu'] ;

        $muinfo = $nav->where ( $map )->field('tpl_list,type')->find ();
        $tpl = $muinfo['tpl_list'];

        //获取二级目录的文档内容
        $article = new \Index\Model\ArticleModel();

        $conds['state'] = 1;
        $conds['hide_flag']=0;
        if($article_type){
            $conds['article_type'] = $article_type;
        }
        $field = 'id,title,time,coverimg,description,view,article_type' ;
        $pagesize = 9 ;
        $order = 'top DESC,sort DESC,time DESC' ;
        $list = $article->search($conds,$field,$pagesize,$order);



        $this->assign('doc_list',$list['list']);

        $this->assign('page',$list['page']);

        $this->display($tpl);
    }




}