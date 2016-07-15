<?php
namespace Home\Controller;
use Think\Controller;
class ChengyuanController extends Controller {
    public function index(){
        header('Content-type:text/html;charset=utf-8');
        $v=$this->getDepartmentList();
        $this->assign('v',$v);
        $this->display();


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

    //成员详情
    public  function Detail($userid){

        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/user/get?access_token=$access_token&userid=$userid";

        $res=$this->http_curl($url,'get','json');

        $this->assign('v',$res);
        $this->display('detail');
    }
    //删除成员
    public function Delete($userid,$department_id,$bumenmingcheng){
        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/user/delete?access_token=$access_token&userid=$userid";

        $res=$this->http_curl($url,'get','json');


        $this->redirect('bumen/Bumenchengyuan',array(department_id=>$department_id,bumenmingcheng=>$bumenmingcheng),2,'删除成功');

    }

    //添加成员
    public function Create(){

        $name=$_POST['name'];
        $department=$_POST['department'];
        var_dump($department[0]);

        $mobile=$_POST['mobile'];
        $position=$_POST['position'];

        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/user/create?access_token=$access_token";
        if($department[0]){
            $newdepartment=array($department[0]);
            if($department[1]){
                $newdepartment=array($department[0],$department[1]);
                if($department[2]){
                    $newdepartment=array($department[0],$department[1],$department[2]);
                }
            }

        }




        $ar=array(
            'name'=>$name,
            'department'=>$newdepartment,
            'mobile'=>$mobile,
            'position'=>$position

        );
        $arr=json_encode($ar);
        $res=$this->http_curl($url,'post','json',$arr);


      $this->redirect('Bumen/index');

    }
    //添加成员模板渲染
    public function Createchengyuan(){
        $this->display('create');

    }

}