<?php
namespace Index\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public static $param ;

    public function _empty(){//404

        $this->redirect('/');
    }

	public function _initialize() {

		/* 读取数据库中的配置 */
		$config =   S('DB_CONFIG_DATA');
		if(!$config){
			$config =   api('Config/lists');
			S('DB_CONFIG_DATA',$config);
		}
		C($config); //添加配置	

		$this->banner();
	}




	
	/**
	 * 设置导航信息
	 * 
	 * @param mixed $param
	 */
	public function navQuery($param){


		if(is_array($this->param) && empty($this->param)){
			return $this->param;
		}

		
		if(empty($param)){
		  $param['nv'] = I('nv');
		  $param['mu'] = I('mu');
		}
       //var_dump($param['nv']);
		$menu = new \Admin\Model\NavigateModel();
        //头部导航
		$map['is_nav'] = 1 ;
		$field = 'id,title,is_nav,eng,tpl_list,tpl_info,controller,action' ;
		$navlist = $menu->getMenu($map);
		$this->assign('menu_list',$navlist);

		if(!empty($param)){

			//一级导航
			$nv = $param['nv'];

            $navlist = $menu->getMenu();
           
			$navinfo = $navlist[$nv];
 
			$this->assign('navinfo',$navinfo);

			$this->assign('snvlist',$navinfo['child']);


			//二级导航
			$mu = $param['mu'];
			if($mu){
  			  $muinfo = $navinfo['child'][$mu];
  			  $this->assign ( 'muinfo', $muinfo );

			}else{
				$muinfo = current($navinfo['child']);
				$this->assign ( 'muinfo', $muinfo);				
				$mu = $muinfo['id'];	
				$param['mu'] = $mu ;			
			}
            
			$this->param = $param ;

            //var_dump($param);
            $english=array(
                1=>'ABOUT','FOOD','SHOP','NEWS','JOIN','STORY','MESSAGE',
            );
            $this->eng = $english ;

			return $param ;

		}

	}


   public function banner(){
   	   //获取到以及栏目中的id
        $param = $this->navQuery();
   		$id = $param['nv'];

   		$nav=M('Navigate');
   		$where['id']=$id;
   		$img=$nav->where($where)->field('img')->find();
   		$this->assign('list_banner',$img);
       //var_dump($img);



   		//右侧更多文章查询
        $doc=M('Doc');
     	// $w['category_id']=array('in',array(2,3,4,5));
     	// $w['state']=1;
     	// $w['hide_flag']=0;
     	// $more_list=$doc->where($w)->field('id,title,time')->limit(15)->select();
     	// $this->assign('more_list',$more_list);
    //技术篇；列表
       unset($where);
        $where['state']=1;
        $where['hide_flag']=0;
        $where['category_id']=2;
        $jishu_list=$doc->where($where)->field('id,title,time')->limit(15)->select();
        $this->assign('jishu_list',$jishu_list);
     //散文篇；列表
        $where['category_id']=3;
        $sanwen_list=$doc->where($where)->field('id,title,time')->limit(15)->select();
        $this->assign('sanwen_list',$sanwen_list);
     //生活篇；列表
        $where['category_id']=4;
        $sheng_list=$doc->where($where)->field('id,title,time')->limit(15)->select();
        $this->assign('sheng_list',$sheng_list); 
     //日志篇：列表
        $where['category_id']=5;
        $rizhi_list=$doc->where($where)->field('id,title,time')->limit(15)->select();
        $this->assign('rizhi_list',$rizhi_list);  
        
        //右侧点击更多显示的文章列表
        $where['category_id']=array('in',array(2,3,4,5));
        $dian_more_list=$doc->where($where)->field('id,title,time,view')->limit(5,20)->select();
        $this->assign('dian_more_list',$dian_more_list);
   	   

    //说说后台数据
   	   unset($where);
		$talk=M('Talk');
		$where['state']=1;
		$where['hide_flag']=0;
		$order="top DESC,sort DESC,time DESC";
		$talk_list=$talk->where($where)->order($order)->select();
		$this->assign('talk_list',$talk_list);
       


        //友情链接列表
        unset($where);
       $link=M('Link');
       $where['state']=1;
       $where['hide_flag']=0;
       $link_arr=$link->where($where)->order($order)->limit(10)->select();
       $this->assign('link_list',$link_arr);
   }


   

    


}

?>