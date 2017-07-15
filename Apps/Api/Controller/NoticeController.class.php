<?php
namespace Api\Controller;
use Think\Controller;
class NoticeController extends Controller {
	
	public function index(){
		$data = M('notice')->find(I('id'));
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $data;
		exit(json_encode($result));
	}
}