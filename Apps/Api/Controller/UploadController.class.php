<?php
namespace Api\Controller;
use Think\Controller;
class UploadController extends Controller {

	public function index()
	{
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     '/Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	    	$result['status'] = 0;
	    	$result['msg'] = $upload->getError();
	    }else{// 上传成功
	        $result['status'] = 1;
	        $result['msg'] = '上传成功';
	        $result['data'] = 'https://xcx.codems.cn/Uploads/'.$info['file']['savepath'].$info['file']['savename'];
	    }
	    exit(json_encode($result));
	}
}