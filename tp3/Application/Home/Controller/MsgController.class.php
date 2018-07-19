<?php
namespace Home\Controller;
use Think\Controller;

class MsgController extends Controller {
    public function index()
    {
    	$msgs = M('msg')->select();
    	$this->assign('msgs',$msgs);
        $this->display('index');
    }

    public function add()
	{	
		if(IS_POST){
			$postData['uname'] = I('uname');
			$postData['content'] = I('content');
			$postData['create_at'] = $postData['update_at'] = time();
			$rs = M('msg')->add( $postData );
			if($rs){
				$this->redirect('home/msg/index');
			}else{
				$this->error('无法添加',U('home/msg/index'));
			}
		}
	}



}