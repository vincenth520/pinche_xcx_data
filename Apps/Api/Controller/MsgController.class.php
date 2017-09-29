<?php
namespace Api\Controller;
use Think\Controller;
class MsgController extends Controller {
	public function get(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$where['msg.uid'] = $user['id'];
		$where['msg.type'] = I('type');
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		$data = M('msg')->field('msg.*,user.avatarUrl,user.nickName')->table('__MSG__ msg')->join('__USER__ user on msg.fid=user.id','LEFT')->where($where)->limit($limit,$page_count)->order('msg.time desc')->select();
		if(!empty($data)){
			$see['see'] = 1;
			foreach($data as $v){
				$arr[] = $v['id'];
			}
			$str = implode(',',$arr);
			$str = 'id in ('.$str.')';
			M('msg')->where($str)->save($see);
		}
		$result['status'] = 1;
		$result['msg'] = '消息加载成功';
		$result['data'] = $data;		
		exit(json_encode($result));
	}
	
	public function getAll(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$where['uid'] = $user['id'];
		$where['see'] = 0;
		$data = M('msg')->field('type,count(*) as count')->where($where)->group('type')->select();
		$result['status'] = 1;
		$result['msg'] = '消息加载成功';
		$result['data'] = $data;		
		exit(json_encode($result));
	}
}