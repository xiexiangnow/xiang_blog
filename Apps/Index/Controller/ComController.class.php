<?php
namespace Index\Controller;
use Think\Controller;

class ComController  extends CommonController {

		public function lis(){
						
			$param = $this->navQuery();

            //如果进来搜索的关键词 则执行search操作
            if(I('keywords')){
                $this->search();
                die;
            }

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
            $conds['category_id'] = $param['mu'] ;
            $conds['state'] = 1;
            $conds['hide_flag']=0;
            $field = 'id,title,time,coverimg,description,view,article_type' ;
            $pagesize = 9 ;
            $order = 'top DESC,sort DESC,time DESC' ;
            $list = $article->search($conds,$field,$pagesize,$order);

            //如果只有一条记录则跳转到详细页面 或者栏目为单页
            if($tpl!="piclist" && $tpl!='pics'){
                if(1==count($list['list']) || 2==$muinfo['type']){
                    $tpl =2==$muinfo['type']?'single':$muinfo['tpl_info'];
    
                    $this->show($list['list'][0]['id'],$tpl);

                    exit;
                }
            }

            //如果进入简历页面，将简历信息查询出来
            if($param['mu']==21){
                $resume = M('Resume');
                $re_info = $resume->find();              //基本信息

                $pro = M('Project');
                $where['hide_flag'] = 0;
                $order = "sort DESC,id DESC";
                $pro_list = $pro->where($where)->order($order)->select();   //实战项目

            }
            $this->assign('pro_list',$pro_list);

            $this->assign('re_info',$re_info);

            $this->assign('doc_list',$list['list']);

            $this->assign('page',$list['page']);
       
            $this->display($tpl);
		}

		
		//详情页
		public function show ($id='',$tpl=''){


            if(!$id || !is_numeric($id)){//错误传参 跳转首页
                $this->redirect("/");
            }

			//基础信息
			$doc=M('doc');
			$base=$doc->where("id={$id} AND state=1 AND hide_flag=0")->find();


            if(!$base){//没有查询的和数据
                $this->redirect("/");
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


			  /***************取出数组中的sourceurls值，将其转化为二维数组，在传值到页面******************/
			  $pic_list=string2array($info['sourceurls']);
              $this->assign('pic_list',$pic_list);
	  			  

			  $pid = $base['category_id'];
              $this->nextpage($pid, $id);			  
			}

            //浏览量的累加
            $doc->where("id={$id}")->setInc('view',1);

			$this->display($tpl);
		}

		
		/**
		 * 搜索
		 */
		public function search(){

			$keywords = I('keywords');
            $this->keywords=$keywords;

			if($keywords){
				$conds['title|keywords']    =   array('like', '%'.$keywords.'%');
				$this->assign('keywords',$keywords);

				$article = new \Index\Model\ArticleModel();
				$conds['state'] = 1;
				$conds['hide_flag']=0;
				$field = 'id,title,time,coverimg,description,view,article_type' ;
				$pagesize = 12 ;
				$order = 'top DESC,sort DESC,time DESC' ;
				$res = $article->search($conds,$field,$pagesize,$order);


				$this->assign ('doc_list', $res['list'] );
				$this->assign('page',$res['page']);
			}

			$this->display('News/search');

		}



		
		//上页，下页  (随着数据的增加，这部分代码需要优化)
		private function nextpage($pid,$id){
			$doc=M('doc');
			$order = 'top DESC,sort DESC,time DESC' ;
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


   //
        public function mes(){
        	if(IS_POST){
				// $this->ajaxReturn(1);
			 //检查是否已经留言
		     $data['ip'] = get_client_ip(0,true);			 
			 $message = M('Message');
			 $where = "ip='{$data['ip']}'";
			 $time = NOW_TIME;
			 $msg = $message->where($where)->order('id desc')->find();
			 $settime = 600;   //设置留言的间隔时间
			 if($msg && $time-$msg['time']<$settime){
			     //留过言了
			 	echo '您已经留言过了，过段时间再来吧！';
			 	die;
			 }
			
		     $data['user_name'] = htmlspecialchars(I('username'),ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);
		     $data['tel'] = htmlspecialchars(I('tel'),ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);
		     $data['email'] = htmlspecialchars(I('email'),ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);
		     $data['content'] = htmlspecialchars(I('content'),ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);
		     $data['qq']=I('qq');
		     $data['time'] = $time ;
		     $res=$message->add($data);	

		     if($res>0){
		     	//echo "1";  //留言成功
		     	echo '留言成功，感谢您的宝贵建议！';
		     	exit;
		     }else{
		     	echo "留言失败！";

		     }
		}

         
   }


  //验证码
       //评论中的验证码
		public function code(){
			$config =    array(    
				'fontSize'    =>    30,    // 验证码字体大小    
				'length'      =>    4,     // 验证码位数    
				'useNoise'    =>    false, // 关闭验证码杂点useNoise
			 );
			$Verify = new \Think\Verify($config);
			$Verify->codeSet = '0123456789';
			$Verify->entry();
		}

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串  
	  public function check_verify($code, $id = ''){    
	 	$verify = new \Think\Verify();    
	 	return $verify->check($code, $id);
	 }






    
}


?>