<?php
namespace Index\Controller;
use Think\Controller;


class NewsController  extends ComController {

	 
              
   //二维码
	public function qrcode(){
		$url = I('url');
           $url = base64_decode($url);
		echo code_create($url);
	}


	
	
	
}

?>