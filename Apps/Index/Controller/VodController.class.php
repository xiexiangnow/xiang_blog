<?php
namespace Index\Controller;
use Think\Controller;


class VodController  extends CommonController {

		public function index(){

			$mu=I('mu');
			
			//查询目录的相关信息
			$nav = M ( 'Navigate' );
			$map['id'] = $mu ;
			$muinfo = $nav->where ( $map )->field('tpl_list')->find ();
			$tpl = $muinfo['tpl_list'];			
						
            //获取课程信息
            $article = new \Index\Model\CourseModel();
            $conds['sid'] = $mu ;
            $conds['state'] = 1;
            $conds['hide_flag']=0;
            $field = '*' ;
            $pagesize = 12 ;
            $order = 'top DESC,sort DESC,id DESC' ;
            $list = $article->search($conds,$field,$pagesize,$order);             
                                  
            $this->assign('list',$list['list']);
            $this->assign('page',$list['page']);
                        
            $this->display($tpl);
		}
		
		
		//课程介绍
		public function info($id){
		
			$nv = I('nv');
			$this->assign('nv',$nv);
			$mu = I('mu');
			$this->assign('mu',$mu);
											
			//基础信息
			$course=M('course');
			$base=$course->where("id={$id} AND state=1 AND hide_flag=0")->find();
			$this->assign('base',$base);
			
			$order = 'id asc';
			$list = M('doc')->where('sid='.$id.' AND state=1 AND hide_flag=0')->order($order)->select();
			$this->assign('list',$list);			
			$this->assign('doc_title',$base['title']);
						
			$this->display('vod_info');
		}		
		

		//详情页
		public function show ($id){
				
			$nv = I('nv');
			$this->assign('nv',$nv);
			$mu = I('mu');
			$this->assign('mu',$mu);			
			
			//基础信息
			$doc=M('doc');
			$base=$doc->where("id={$id} AND state=1 AND hide_flag=0")->find();
			$this->assign('base',$base);
			$this->assign('doc_title',$base['title']);

			//详细信息
			if($base){
			  $info=M('Doc_content')->where("id={$id}")->find();
			  $this->assign('info',$info);			  			  

			  $pid = $base['category_id'];
             // $this->nextpage($pid, $id);			  
			}			
			
			$this->display('vod_show');
		}

		//上页，下页  (随着数据的增加，这部分代码需要优化)
		private function nextpage($pid,$id){
			$doc=M('doc');
			$order = 'top DESC,sort DESC,id DESC' ;
			$ids = $doc->field('id')->where("state=1 AND hide_flag=0 AND category_id={$pid}")->order($order)->select();
			$pre_id = 0;
			$next_id = 0;
			foreach($ids as $key=>$val){
				if($id==$val['id']){
					$pre_id = $ids[$key-1]?$ids[$key-1]['id']:0;
					$next_id = $ids[$key+1]?$ids[$key+1]['id']:0;
					break;
				}
			}
			
			if($pre_id){
				$pre_info = $doc->field('id,title')->where('id='.$pre_id)->find();
				$this->assign('pre',$pre_info);
			}
				
			if($next_id){
				$next_info = $doc->field('id,title')->where('id='.$next_id)->find();
				$this->assign('next',$next_info);
			}			
		}

		
		
}





?>