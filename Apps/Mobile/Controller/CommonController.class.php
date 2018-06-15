<?php
namespace Mobile\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public static $param ;

    public function _empty(){//404
        $this->redirect('Mobile/index/index');
    }

	public function _initialize() {
		/* 读取数据库中的配置 */
		$config =   S('DB_CONFIG_DATA');
		if(!$config){
			$config =   api('Config/lists');
			S('DB_CONFIG_DATA',$config);
		}
		C($config); //添加配置
	}





	/**
	 * 设置导航信息
	 *
	 * @param mixed $param
	 */
	public function navQuery($param){

		if(is_array($this->param)){
			return $this->param;
		}

		if(empty($param)){
		  $param['nv'] = I('nv');
		  $param['mu'] = I('mu');
		}

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
            $this->assign('nvcount',count($navinfo['child']));
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

			return $param ;
		}







	}





}

?>