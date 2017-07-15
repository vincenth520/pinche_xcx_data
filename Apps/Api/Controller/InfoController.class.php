<?php
namespace Api\Controller;
use Think\Controller;
class InfoController extends Controller {
	
	//添加拼车信息
	public function add(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data = $_POST;
		$data['uid'] = $user['id'];
		$i = D('Info');
		if (!($id=($i->addInfo($data)))){
			$result['status'] = 0;
			$result['msg'] = $i->getError();
		}else{
			$result['status'] = 1;
			$result['msg'] = '发布成功';
			$result['info'] = $id;
			
			if($user['vehicle'] == ''){
				$u->vehicle = $data['vehicle'];
			}	
			if($user['phone'] == ''){
				$u->phone = $data['phone'];
			}
			if($user['name'] == ''){
				$u->name = $data['name'];
			}		
			$u->save();	
		}
		exit(json_encode($result));
	}
	
	public function index(){
		$i = D('Info');
		$data = $i->getInfo(I('id'));
		//dump($i->getLastSql());
		if(empty($data)){
			$result['status'] = 0;
			$result['msg'] = '没有找到该信息';
		}else{
			$result['status'] = 1;
			$result['msg'] = '获取成功';
			$result['data'] = $data;		
		}
		exit(json_encode($result));
	}
	
	
	public function lists(){
		$i = D('Info');
		$start = I('start','');
		$over = I('over','');
		$date = I('date','');
		$where = 'info.status = 1 and info.time >= "'.time().'"';
		
		if($date != ''){
			$where .= ' and info.date <= "'.$date.'"';
		}
		
		if($start != ''){
			$where .= ' and info.departure like "%'.$start.'%"';
		}
		
		if($over != ''){
			$where .= ' and info.destination like "%'.$over.'%"';
		}
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		
		$list = $i->table('__INFO__ info')->field('info.*,user.avatarUrl')->join('__USER__ user ON user.id = info.uid','LEFT')->where($where)->limit($limit,$page_count)->order('time asc')->select();
		//dump($i->getLastSql());
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['list'] = $list;
		exit(json_encode($result));
	}
	
	
	public function mycount(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$i = D('Info');
		$where['uid'] = $user['id'];
		$data = $i->where($where)->count();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $data;
		exit(json_encode($result));
	}
	public function mylist(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$i = D('Info');
		$where['uid'] = $user['id'];
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		$data = $i->where($where)->limit($limit,$page_count)->order('addtime desc')->select();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $data;
		exit(json_encode($result));
	}
	
	public function del(){
		$u = D('User');
		$i = D('Info');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$where['uid'] = $user['id'];
		$where['id'] = I('id');
		if($i->where($where)->delete() > 0){
			$result['status'] = 1;
			$result['msg'] = '删除成功';
		}else{
			$result['status'] = 0;
			$result['msg'] = '删除失败';
		}
		exit(json_encode($result));
	}
}