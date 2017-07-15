<?php
namespace Api\Model;
use Think\Model;
class CommentModel extends Model {

	public function getComment($where,$limit='',$page_count='')
	{
		if($limit == ''){
			$limit = 100000;
		}else{
			$limit = $limit.','.$page_count;
		}
		$data = $this->table('__COMMENT__ comment')->field('comment.*,user.nickName,user.avatarUrl')->join('__USER__ user ON user.id = comment.uid','LEFT')->where($where)->order('comment.time desc')->limit($limit)->select();
		return $data;
	}

	public function addComment($data){
		$rules = array(
			array('content','require','内容不能为空')
	   	);
	   	$data['time'] = strtotime($data['date'].' '.$data['time']);
		return $this->validate($rules)->add($data);
    }

}

?>