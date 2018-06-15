<?php
namespace Index\Widget;
use Think\Controller;
use Index\Model\GatherModel;

class GatherWidget extends Controller {
    /*投票*/
    public function Index(){

        $gaobj =new GatherModel();

        $list= $gaobj -> show_data('1');
        $gaid=$list['gather']['id'];
        if(!$gaid){
            die;
        }
        M('gather')->where("id={$gaid}")->setInc('view');

        foreach($list['childs'] as $k){
            $count += $k['count'];
        }
        $this->assign('count',$count);
        $this->assign('gather',$list['gather']);
        $this->assign('doc_list',$list['childs']);

        $this->display('Gather/gather');
    }
}

?>