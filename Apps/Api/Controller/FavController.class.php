<?php
namespace Api\Controller;
use Think\Controller;
class FavController extends Controller {
	
	public function addFav(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['iid'] = I('iid');
		$data['time'] = time();
		$favObj = M('Fav');
		if($favObj->add($data)){
			$result['status'] = 1;
			$result['msg'] = '收藏成功';
		}else{
			$result['status'] = 0;
			$result['msg'] = '收藏失败';
		}
		exit(json_encode($result));
	}
	
	
	public function delFav(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['iid'] = I('iid');
		$favObj = M('Fav');
		if($favObj->where($data)->delete()){
			$result['status'] = 1;
			$result['msg'] = '取消收藏成功';
		}else{
			$result['status'] = 0;
			$result['msg'] = '取消收藏失败';
		}
		exit(json_encode($result));
	}
	
	public function isFav(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['iid'] = I('iid');
		$favObj = M('Fav');
		$data = $favObj->where($data)->find();
		if(!empty($data)){
			$result['status'] = 1;
			$result['msg'] = '已收藏';
		}else{
			$result['status'] = 0;
			$result['msg'] = '未收藏';
		}
		exit(json_encode($result));
	}
	
	
	public function myFav(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$where['fav.uid'] = $user['id'];
		
		$i = D('Info');
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		$list = M('fav')->table('__FAV__ fav')->field('info.*,fav.id as fad')->join('__INFO__ info ON info.id = fav.iid','LEFT')->where($where)->limit($limit,$page_count)->order('fav.time asc')->select();
		
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $list;
		exit(json_encode($result));
	}
}
?>