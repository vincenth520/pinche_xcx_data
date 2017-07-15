<?php
namespace Api\Model;
use Think\Model;
class DynamicModel extends Model {


	public function addDynamic($data){
		$rules = array(
			array('content','require','内容不能为空')
	   	);
	   	$data['time'] = strtotime($data['date'].' '.$data['time']);
		return $this->validate($rules)->add($data);
    }

}

?>