<?php
namespace Index\Controller;
use Think\Controller;
use Index\Model\GatherModel;

class GatherController  extends ComController {

    public function info(){
        $id=I('id');
        if(!$id){
            $this->error('参数错误');
        }
        $this->id=$id;
        $gaobj =new GatherModel();
        $map="id={$id}";
        $list= $gaobj -> show_data($map);

        if(!$list['gather']){
            $this->error('未找到您查询的内容');
        }


        $gaid=$list['gather']['id'];

        M('gather')->where("id={$gaid}")->setInc('view');

        foreach($list['childs'] as $k){
            $count += $k['count'];
        }
        $this->assign('count',$count);
        $this->assign('gather',$list['gather']);
        $this->assign('doc_list',$list['childs']);
            if(IS_AJAX){
                $this->ajaxReturn($list['childs']);
            }



    $this->navQuery();
    $this->display();

    }



			
}

?>