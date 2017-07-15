<?php
namespace Api\Model;
use Think\Model;
class UserModel extends Model {

	function getUserInfo($id)  //获取用户信息id或者openid
	{
		$where = 'id = "'.$id.'" or openid ="'.$id.'"';
		$user = $this->field('id,avatarUrl,city,gender,nickName,province,county,phone,vehicle,name')->where($where)->find();
		return $user;
	}
}

?>