<?php
namespace Api\Model;
use Think\Model;
class InfoModel extends Model {
 
   
    public function addInfo($data){
		$rules = array(
			array('name','require','请输入姓名'),
			array('phone','require','请输入手机号码'),
			array('phone','/^1[34578]\d{9}$/','手机号码格式错误'),
			array('departure','require','请选择出发地'),
			array('destination','require','请选择目的地'),
			array('time','require','请选择出发时间'),
			array('surplus','require','请选择人数')
	   );
	   $data['time'] = strtotime($data['date'].' '.$data['time']);
	   if(isset($data['id'])){
		$data['addtime'] = time();
		if($this->validate($rules)->save($data)){
			return $data['id'];
		}else{
			return false;
		}
	   }else{
		return $this->validate($rules)->add($data);
	   }
    }
	
	public function getInfo($id){
		$this->where('id = "'.$id.'"')->setInc('see');
		return $this->field('info.*,user.nickName,user.avatarUrl')->table('__INFO__ info,__USER__ user')->where('info.uid=user.id and info.id = "'.$id.'"')->find();
	}
	

	
}

?>