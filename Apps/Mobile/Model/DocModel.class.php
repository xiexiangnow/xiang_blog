<?php
namespace Mobile\Model;
use Think\Model;


/**
 *通用模型层
 *@author leiqianyong 2015-03-11
 */
class DocModel extends Model{
  
	/**
	 * 根据条件分页查询
	 * @author leiqianyong 2015-03-05
	 *
	 * @param array $map 查询条件数组
	 * @param string $field 
	 * @param int $pagesize 单页记录条数
	 */
	public function search($map,$field='*',$pagesize=10,$order='id DESC'){
		 

		$count = $this->where($map)->count();
		$page = new \Think\Page($count,$pagesize);

        $page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %DOWN_PAGE% %END% %HEADER%');

		$list = $this->field($field)->where($map)->limit($page->firstRow. ',' . $page->listRows)->order($order)->select();


		return array('list'=>$list,'page'=>$page->show());
	
	}














	
		
}