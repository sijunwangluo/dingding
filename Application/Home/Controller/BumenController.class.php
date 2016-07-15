<?php
namespace Home\Controller;
use Think\Controller;
class BumenController extends Controller {
    public function index(){
        header('Content-type:text/html;charset=utf-8');
        $v=$this->getDepartmentList();

        $this->assign('v',$v);
        $this->display();


    }


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

    //获取部门列表
    public  function getDepartmentList(){


        $access_token=$this->getDingDingAccessToken();

        $url="https://oapi.dingtalk.com/department/list?access_token=$access_token";

        $res=$this->http_curl($url,'get','json');

        $department=$res['department'];

        return $department;


    }

    //获取部门详情
    public  function getDepartmentDetail($id){
        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/department/get?access_token=$access_token&id=$id";

        $v=$this->http_curl($url,'get','json');

        $this->assign('v',$v);
        $this->display('detail');

    }
    //获取部门名称

    //创建部门
    public  function CreateDepartment(){
        $name=$_POST['name'];
        $parentid=$_POST['parentid'];
        $order=$_POST['order'];
        $status=$_POST['status'];

        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/department/create?access_token=$access_token";

        $arr=array(
            'name'=>$name,
            'parentid'=>$parentid,
            'order'=>$order,
            'createDeptGroup'=>$status,
        );
        $arr=json_encode($arr);

        $this->http_curl($url,'post','json',$arr);
        $this->redirect('Bumen/index');


    }
    //增加部门  表单提交
    public function Createbumen(){
        $this->display('createbumen');
    }
    //删除部门
    public  function DeleteDepartment($id){

        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/department/delete?access_token=$access_token&id=$id";
        $this->http_curl($url,'get','json');
        $this->redirect('Bumen/index');

    }
    //更新部门信息
    public  function Update(){
        //接受post方式传过来的值
        $id=$_POST['id'];
        $name=$_POST['name'];
        $parentid=$_POST['parentid'];
        $order=$_POST['order'];
        $createDeptGroup=$_POST['createDeptGroup'];
        $autoAddUser=$_POST['autoAddUser'];
        $deptManagerUseridList=$_POST['deptManagerUseridList'];
        $deptHiding=$_POST['deptHiding'];
        $deptPerimits=$_POST['deptPerimits'];
        $userPerimits=$_POST['userPerimits'];
        $outerDept=$_POST['outerDept'];
        $outerPermitDepts=$_POST['outerPermitDepts'];
        $outerPermitUsers=$_POST['outerPermitUsers'];
        $orgDeptOwner=$_POST['orgDeptOwner'];


        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/department/update?access_token=$access_token";

        $arr=array(
            'name'=>$name,
            'parentid'=>$parentid,
            'order'=>$order,
            'createDeptGroup'=>$createDeptGroup,
            'id'=>$id,
            'autoAddUser'=>$autoAddUser,
            'deptManagerUseridList'=>$deptManagerUseridList,
            'deptHiding'=>$deptHiding,
            'deptPerimits'=>$deptPerimits,
            'userPerimits'=>$userPerimits,
            'outerDept'=>$outerDept,
            'outerPermitDepts'=>$outerPermitDepts,
            'outerPermitUsers'=>$outerPermitUsers,
            'orgDeptOwner'=>$orgDeptOwner,
        );
        $arr=json_encode($arr);

        $res=$this->http_curl($url,'post','json',$arr);
        if(!$res['errcode']==0){
            var_dump($res);
        }

        $this->redirect('Bumen/getDepartmentDetail',array('id'=>$id),1,'更新成功,');



    }
    //修改部门  页面渲染
    public function Bumengengxin($id){
        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/department/get?access_token=$access_token&id=$id";

        $v=$this->http_curl($url,'get','json');

        $this->assign('v',$v);
        $this->display('update');
    }

    //部门成员
    public  function Bumenchengyuan($department_id,$bumenmingcheng){

        $access_token=$this->getDingDingAccessToken();
        $url="https://oapi.dingtalk.com/user/simplelist?access_token=$access_token&department_id=$department_id";

        $res=$this->http_curl($url,'get','json');
        $re=$res['userlist'];
        $count=count($re);
        $this->assign('department_id',$department_id);
        $this->assign('bumen',$bumenmingcheng);
        $this->assign('count',$count);
        $this->assign('re',$re);
        $this->display('bumenchengyuan');



    }







}