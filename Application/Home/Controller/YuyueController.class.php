<?php
namespace Home\Controller;
use Think\Controller;
class YuyueController extends Controller {
    //渲染有多少客户需要处理
    public function index()
    {

        $Message = M("message");
        $message=$Message->where('hidden=0')->select();
        $count=count($message);
        $this->assign('count',$count);
        $this->assign('message',$message);
        $this->display('index');

        //预约监听功能，因为需要客户端刷新执行命令，过于被动，暂时不用
//        if($count>0){
//            $this->Send($count);
//
//        }



    }
    //渲染有多少客户已经处理
    public function dealwithed()
    {

        $Message = M("message");
        $message=$Message->where('hidden=1')->select();
        $count=count($message);
        $this->assign('count',$count);
        $this->assign('message',$message);
        $this->display('beizhu');
    }
    //渲染有多少垃圾客户
    public function trash()
    {

        $Message = M("message");
        $message=$Message->where('hidden=2')->select();
        $count=count($message);
        $this->assign('count',$count);
        $this->assign('message',$message);
        $this->display('trash');
    }
    //删除客户（设定为垃圾客户）
    public function maketrash($id){
        $Message = M("message");
        $Message->find($id);
        $Message->hidden='2';
        $Message->save();
        $this->redirect('Yuyue/index');


    }
    //处理已经联系的客户
    public function makedealwithed($id){
        $Message = M("message");
        $Message->find($id);
        $Message->hidden='1';
        $Message->save();
        $this->redirect('Yuyue/trash');


    }
    //恢复到开始
    public function makestart($id){
        $Message = M("message");
        $Message->find($id);
        $Message->hidden='0';
        $Message->save();
        $this->redirect('Yuyue/index');


    }
    //备注客户信息
    public function beizhu(){
        $id=$_POST['id'];
        $Message = M("message");
        $Message->find($id);
        $Message->user=$_POST['user'];
        $Message->title=$_POST['title'];
        $Message->content=$_POST['content'];
        $Message->beizhu=$_POST['beizhu'];


        $Message->save();
        $this->redirect('Yuyue/dealwithed');


    }
    //跳转到编辑
    public function bianji($id){

        $Message = M("message");
        $message=$Message->where('id='.$id)->select();


        $this->assign('message',$message);

      $this->display('bianji');


    }
    public function delete($id){
        $Message = M("message");
        $Message->delete($id);
       $this->redirect('Yuyue/trash');

    }
    //主动获取客户预约信息，并钉钉发送提示
    public  function add(){
        $user=$_POST['user'];
        $title=$_POST['title'];
        $content=$_POST['content'];




        $Message=M('message');

        $Message->create();
        $Message->lastdate=date("Y-m-d H:i:s",time());

        $res=$Message->add();
        if($res){
            $this->Send();
        }

        $this->redirect('Yuyue/index');




    }
    //接受客户添加渲染模板
    public function addtpl(){
        $this->display('add');
    }

    //---------------------------------接下来的是钉钉发送功能--------------------------------
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



        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/message/send?access_token=$access_token";

        $ar=array(
            'touser'=>'02543202244183',
            'toparty'=>'',
            'agentid'=>'10899866',
            'msgtype'=>'text',
            'text'=>array('content'=>'客户已经提交了信息，请及时处理！'),

        );
        $arr=json_encode($ar);

        $this->http_curl($url,'post','json',$arr);





    }












}//class end
