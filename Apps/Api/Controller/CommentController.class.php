<?php
namespace Api\Controller;
use Think\Controller;
class CommentController extends Controller {

	public function get()  //获取评论
	{
		$C = D('Comment');
		$where['iid'] = I('id');
		$where['type'] = I('type');
		
		$page = I('page','1');
		$page_count = 20;
		$limit = ($page-1)*$page_count;
		$data = $C->getComment($where,$limit,$page_count);
		$result['status'] = 1;
		$result['msg'] = '评论加载成功';
		$result['data'] = $data;		
		exit(json_encode($result));
	}
	
	public function get_count(){
		$C = D('Comment');
		$where['iid'] = I('id');
		$where['type'] = I('type');
		$data = $C->where($where)->count();
		$result['status'] = 1;
		$result['msg'] = '评论总数加载成功';
		$result['data'] = $data;		
		exit(json_encode($result));
	}


	public function add()  //添加评论
	{
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['iid'] = I('iid');
		$data['type'] = I('type','info');
		$data['content'] = I('content','');
		$data['reply'] = I('reply','');
		$data['img'] = htmlspecialchars_decode(I('img',''));
		$C = D('Comment');
		if($id = $C->addComment($data)){
			$result['status'] = 1;
			$result['msg'] = '评论成功';
			$result['id'] = $id;
			
			$i = D('Info');
			$info = $i->getInfo(I('iid'));
			if($info['uid'] != $user['id']){
				msg('comment',$info['uid'],$user['id'],'回复了您的信息 :'.$data['content'],'/pages/'.$data['type'].'/index?id='.$data['iid']);
			}
		}else{
			$result['status'] = 0;
			$result['msg'] = '评论失败';
		}		
		exit(json_encode($result));
	}


	public function zan()
	{
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['cid'] = I('cid');
		$zanObj = M('zan');
		$zanData = $zanObj->where($data)->find();
		if(empty($zanData)){
			$data['time'] = time();
			$zanObj->add($data);  //写入赞的数据表
			$C = D('Comment');
			$com['id'] = $data['cid'];
			$C->where($com)->setInc('zan');  //评论赞+1
			$data = $C->where($com)->find();			
			if($data['uid'] != $user['id']){
				msg('zan',$data['uid'],$user['id'],'赞了你的评论:'.$data['content'],'/pages/info/index?id='.$data['iid']);
			}
			$result['status'] = 1;
			$result['msg'] = '点赞成功';
			$result['zan'] = $data['zan'];
		}else{
			$result['status'] = 0;
			$result['msg'] = '你已经赞过了';
		}

		exit(json_encode($result));		
	}

	public function test()
	{
		textEncode('H。');
	}
}
?>