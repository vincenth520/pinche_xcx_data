<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){   
        $sk = $this->getOpenid(I('code'));

        $u = D('User');
        $user = $u->getUserInfo($sk['openid']);
        if(empty($user)){ //如果第一次登陆
            $UserInfo = json_decode($this->getUserInfo($sk['session_key'],I('encryptedData'),I('iv')),true);
            unset($UserInfo['watermark']);
            $u->add($UserInfo);
        }
        $user = $u->getUserInfo($sk['openid']);
        $sk = $this->get3rdSession($sk['openid'],$sk['session_key']);
        $result['user'] = $user;
        $result['sk'] = $sk;
        exit(json_encode($result));
    }

    public function editUser() //修改个人信息
    {
        $u = D('User');
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);
        $UserData = $data['userInfo'];
        $where['openId'] = vaild_sk($data['sk']);
        unset($UserData['sk']);
        unset($UserData['id']);
        $u->where($where)->save($UserData);
        $user = $u->getUserInfo($where['openId']);
        $result['status'] = 1;
        $result['msg'] = '修改成功';
        $result['user'] = $user;
        exit(json_encode($result));
    }

    private function getUserInfo($sessionKey,$encryptedData, $iv)
    {        
        vendor('wxBizDataCrypt.wxBizDataCrypt');
        $pc = new \WXBizDataCrypt(C('APPID'), $sessionKey);
        $errCode = $pc->decryptData($encryptedData, $iv, $data );
        if ($errCode == 0) {
            return $data;
        } else {
            return false;
        }
    }


    //获取session_key
    private function getOpenid($code)
    {
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".C('APPID')."&secret=".C('AppSecret')."&js_code=".$code."&grant_type=authorization_code";
        $data = file_get_contents($url);
        \Think\Log::record($data);
        $data = json_decode($data,true);
        return $data;
    }


    //生成返回给客户端的3rdsession 
    private function get3rdSession($openid,$session_key)
    {
        $session3rd = $this->randomFromDev(168);
        S($session3rd, $openid,2592000);
        return $session3rd;
    }


    public function vaild_sk()
    {
        if(vaild_sk(I('sk'))){
            $result['status'] = 1;
        }else{
            $result['status'] = 0;
        }
        exit(json_encode($result));
    }



    /**
     * 读取/dev/urandom获取随机数
     * @param $len
     * @return mixed|string
     */
    private function randomFromDev($len) {
        $fp = @fopen('/dev/urandom','rb');
        $result = '';
        if ($fp !== FALSE) {
            $result .= @fread($fp, $len);
            @fclose($fp);
        }
        else
        {
            trigger_error('Can not open /dev/urandom.');
            return substr(time().MD5(time().rand()), 0, $len);
        }
        // convert from binary to string
        $result = base64_encode($result);
        // remove none url chars
        $result = strtr($result, '+/', '-_');

        return substr($result, 0, $len);
    }
}