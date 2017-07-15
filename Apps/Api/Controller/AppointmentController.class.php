<?php
namespace Api\Controller;
use Think\Controller;
class AppointmentController extends Controller {

	public function add(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$data['uid'] = $user['id'];
		$data['iid'] = I('iid','');
		$data['name'] = I('name','');
		$data['phone'] = I('phone','');
		$data['surplus'] = I('surplus','');
		$data['time'] = time();
		
		$rules = array(
			array('name','require','请输入姓名'),
			array('phone','require','请输入手机号码'),
			array('phone','/^1[34578]\d{9}$/','手机号码格式错误'),
			array('surplus','require','请选择人数')
	   );
	   
	   $where['uid'] = $data['uid'];
	   $where['iid'] = $data['iid'];
	   $info = M('appointment')->where($where)->find();
	   if(!empty($info)){
			$result['status'] = 0;
			$result['msg'] = '请不要重复预约';
			exit(json_encode($result));
	   }
	   
		if($id = M('appointment')->validate($rules)->add($data)){
			$infoObj = D('Info');
			$info = $infoObj->field('info.*,user.openId')->table('__INFO__ info,__USER__ user')->where('info.uid=user.id and info.id = "'.$data['iid'].'"')->find();
			
			$postData['touser'] = $info['openId'];
			$postData['template_id'] = 'l5gcjhy3C_Tu-mjhoCNHOrbW4P7xlRw72dzu3iZ5tVw';
			$postData['page'] = '/pages/appointment/index?id='.$id;
			$postData['form_id'] = i('form_id');
			$postData['data']['keyword1']['value'] = $data['name'];
			$postData['data']['keyword2']['value'] = $data['phone'];
			$postData['data']['keyword3']['value'] = $info['destination'];
			$postData['data']['keyword4']['value'] = $info['departure'];
			$postData['data']['keyword5']['value'] = date('Y-m-d H:i',$info['time']);
			sendMessage($postData);
			msg('notice',$info['uid'],'10000',$data['name'].'预约了您发布的拼车信息,请及时处理',$postData['page']);
			$result['status'] = 1;
			$result['msg'] = '预约成功';
			
		}else{
			$result['status'] = 0;
			$result['msg'] = '预约失败';
		}
		exit(json_encode($result));
			
	}
	
	public function my(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$infoObj = D('Info');
		$info = $infoObj->field('info.id,appointment.*')->table('__INFO__ info')->join('__APPOINTMENT__ appointment on info.id=appointment.iid','RIGHT')->where('info.uid = "'.$user['id'].'"')->order('appointment.time desc')->select();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $info;
		exit(json_encode($result));
	}
	
	public function mycount(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$infoObj = D('Info');
		$info = $infoObj->table('__INFO__ info')->join('__APPOINTMENT__ appointment on info.id=appointment.iid','RIGHT')->where('info.uid = "'.$user['id'].'" and appointment.status = 0')->count();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $info;
		exit(json_encode($result));
	}
	
	public function getPassenger(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$infoObj = D('Info');
		$info = $infoObj->field('info.id,info.phone,info.departure,info.destination,info.time,appointment.status')->table('__INFO__ info')->join('__APPOINTMENT__ appointment on info.id=appointment.iid','RIGHT')->where('appointment.uid = "'.$user['id'].'"')->order('appointment.time desc')->select();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $info;
		exit(json_encode($result));	
	}

		
	public function detail(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$infoObj = D('Info');
		$info = $infoObj->field('info.id,info.departure,info.destination,info.time,appointment.*')->table('__INFO__ info')->join('__APPOINTMENT__ appointment on info.id=appointment.iid','RIGHT')->where('appointment.id = "'.I('id').'" and info.uid = "'.$user['id'].'"')->find();
		$result['status'] = 1;
		$result['msg'] = '获取成功';
		$result['data'] = $info;
		exit(json_encode($result));
	}
	
	public function submit(){
		$u = D('User');
		$user = $u->getUserInfo(vaild_sk(I('sk')));
		$infoObj = D('Info');
		$app['status'] = I('type');
		$info = $infoObj->field('info.*,appointment.uid as aid')->table('__INFO__ info')->join('__APPOINTMENT__ appointment on info.id=appointment.iid','RIGHT')->where('appointment.id = "'.I('id').'" and info.uid = "'.$user['id'].'"')->find();
		if(empty($info)){
			$result['status'] = 0;
			$result['msg'] = '信息错误';
		}else{
			$where['id'] = I('id');
			
			if(M('appointment')->where($where)->save($app)){
				$user = M('User')->find($info['aid']);
				$postData['touser'] = $user['openId'];
				$postData['form_id'] = i('form_id');
				$postData['page'] = '/pages/info/index?id='.$info['id'];
				if($app['status'] == 1){
					$postData['template_id'] = 'rIfea-FXQNJa9Jh05jGyZO4-v-UfHjWJn0vNGwjSivc';
					$postData['data']['keyword1']['value'] = date('Y-m-d H:i',$info['time']);
					$postData['data']['keyword2']['value'] = $info['departure'];
					$postData['data']['keyword3']['value'] = $info['name'];
					$postData['data']['keyword4']['value'] = $info['phone'];
					$content = $info['name'].'同意了您的拼车请求,请及时与车主('.$info['phone'].')取得联系';
				}else{
					$postData['template_id'] = 'ZuLTdhAVhXd7MTV0-TUyQjLSoF5taZVYM0IHalqZmJ4';
					$postData['data']['keyword1']['value'] = $info['departure'].' -> '.$info['destination'];
					$postData['data']['keyword2']['value'] = date('Y-m-d H:i',$info['time']);
					$postData['data']['keyword3']['value'] = '拼车人数已满';
					$postData['data']['keyword4']['value'] = '建议选择其他时间拼车';
					$content = $info['name'].'拒绝了您的拼车请求,原因是拼车人数已满,建议选择其他时间拼车';
				}
				sendMessage($postData);	
				msg('notice',$info['aid'],'10000',$content,$postData['page']);		
				
				$result['status'] = 1;
				$result['msg'] = '操作成功';
			}else{			
				$result['status'] = 0;
				$result['msg'] = '操作失败';
			}
		}
		
		exit(json_encode($result));
		
	}
}