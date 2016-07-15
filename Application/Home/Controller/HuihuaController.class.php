<?php
namespace Home\Controller;
use Think\Controller;
class HuihuaController extends Controller {
    public function index(){



    }

//获取ssotoken
    public  function getDingDingSsoToken(){
        $corpid = 'ding85afcc010c5854f5';
        $ssosecret =  '6529OtdkrU6J2C0YRCRLzK3GNbn8skD-Rfu_5Y6Zo7rYtqzlC-sRjeSYGOH3hJZY';
        $url = "https://oapi.dingtalk.com/sso/gettoken?corpid=$corpid&corpsecret=$ssosecret";

        $res=( $this->http_curl($url,'get','json'));
        $sso_token=$res["access_token"];
        return $sso_token;

    }
    //获取accesstoken
    public  function getDingDingAccessToken(){
        $corpid = 'ding85afcc010c5854f5';
        $corpsecret =  'srzfEvxo-2GFjqBE4SQM81CBGIzEY55WQJ_GcnRS9iS7QZJqyj3vj1AqIlycThMX';
        $url = "https://oapi.dingtalk.com/gettoken?corpid=$corpid&corpsecret=$corpsecret";


        $res=( $this->http_curl($url,'get','json'));
        $access_token=$res["access_token"];

        return $access_token;
    }
//获取钉钉返回数据的方法
    public function http_curl($url,$type='get',$res='json',$arr=''){
        $headers = array("Content-type: application/json;charset=UTF-8");
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if($type=='post'){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
        }
        $output=curl_exec($ch);
        curl_close($ch);
        if($res=='json'){
            if(curl_errno($ch)){
                return curl_errno($ch);

            }else{
                return json_decode($output,true);
            }

        }

    }



    //丁丁应用发起会话
    public function Send(){

        $touser=$_POST['touser'];
        $toparty=$_POST['toparty'];
        $agentid=$_POST['agentid'];
        $msgtype=$_POST['msgtype'];
        $content=$_POST['content'];

        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/message/send?access_token=$access_token";

        $ar=array(
            'touser'=>$touser,
            'toparty'=>$toparty,
            'agentid'=>$agentid,
            'msgtype'=>$msgtype,
            'text'=>array('content'=>$content),

        );
        $arr=json_encode($ar);

        $res=$this->http_curl($url,'post','json',$arr);



        $this->redirect('Huihua/sendtpl');

    }
    //发消息模板渲染
    public function sendtpl(){
        $this->display('send');

    }

}