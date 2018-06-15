<?php
namespace Index\Model;
use Think\Model;
use Common\Model\CommonModel;

class GatherModel extends CommonModel{
    protected $tableName = 'gather_node' ;
    /**
     * 查询信息搜查表
     * @author zhangxu 2015-06-10
     *
     */
	public function show_data($search){

        $search .=" and state = 1";
        $ga=M('gather')->where($search)->find();

        $list=$this->where('pid='.$ga['id'])->select();

        return $list=array('gather'=>$ga,'childs'=>$list);

    }






}



?>