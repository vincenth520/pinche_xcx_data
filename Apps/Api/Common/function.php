<?php

function vaild_sk($sk){
	if(!S($sk)){
		$result['status'] = -1;
		$result['msg'] = '登录已过期';
		exit(json_encode($result));
	}
	return S($sk);
}

function msg($type,$uid,$fid,$content,$url)  //发送消息
{
	$data['type'] = $type;
	$data['uid'] = $uid;
	$data['fid'] = $fid;
	$data['content'] = $content;
	$data['url'] = $url;
	$data['time'] = time();
	return M('msg')->add($data);
}

function sendMessage($data){
	
	$url = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token='.getToken();
	\Think\Log::record(json_encode($data).'##'.json_encode(http_post_data($url,json_encode($data))));
	
}

function http_post_data($url, $data_string) {  
  
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_URL, $url);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
		'Content-Type: application/json; charset=utf-8',  
		'Content-Length: ' . strlen($data_string))  
	);  
	ob_start();  
	curl_exec($ch);  
	$return_content = ob_get_contents();  
	ob_end_clean();  

	$return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
	return array($return_code, $return_content);  
}  

function getToken(){
	$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.C('APPID').'&secret='.C('AppSecret');
	$data = json_decode(file_get_contents($url),true);
	return $data['access_token'];
}

?>