<?php
namespace Api\Controller;
use Think\Controller;
class DynamicController extends Controller {
	
	public function add()  
	{
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['content'] = I('content','');
		$data['img'] = htmlspecialchars_decode(I('img',''));
		$C = D('Dynamic');
		if($C->addDynamic($data)){
			$result['status'] = 1;
			$result['msg'] = '发表成功';
		}else{
			$result['status'] = 0;
			$result['msg'] = '发表失败';
		}		
		exit(json_encode($result));
	}
	
	public function del(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['id'] = I('id');
		$C = D('Dynamic');
		if($C->where($data)->delete()){
			$result['status'] = 1;
			$result['msg'] = '删除成功';
		}else{
			$result['status'] = 0;
			$result['msg'] = '删除失败';
		}
		exit(json_encode($result));		
	}
	
	public function getList(){
		$C = D('Dynamic');
		
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		
		if(I('sk')){
			$u = D('User');
			$user = $u->getUserInfo(vaild_sk(I('sk')));
			$where['uid'] = $user['id'];
		}else{
			$where = '1=1';
		}
		
		$list = $C->table('__DYNAMIC__ dynamic')->field('dynamic.*,user.avatarUrl,user.nickName')->join('__USER__ user ON user.id = dynamic.uid','LEFT')->where($where)->limit($limit,$page_count)->order('dynamic.time desc')->select();
		
		foreach($list as $v){
			$arr[] = $v['id'];
		}
		$str = '('.implode(',',$arr).')';
		$where = 'iid in '.$str.' and type = "dynamic"';
		
		$comObj = D('Comment');
		
		$comment = $comObj->table('__COMMENT__ comment')->field('comment.id,comment.iid,comment.reply,comment.content,user.nickName')->join('__USER__ user ON user.id = comment.uid','LEFT')->where($where)->order('comment.time desc')->select();
		$arr = array();
		foreach($comment as $k=>$v){
			$arr[$v['iid']][] = $v;
		}
		foreach($list as $k=>$v){
			$list[$k]['comment'] = $arr[$v['id']];
		}
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['list'] = $list;
		exit(json_encode($result));
	}

}

?>