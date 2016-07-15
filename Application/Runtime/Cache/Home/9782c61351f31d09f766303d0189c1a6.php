<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <title>部门列表</title>
<style type="text/css">
    body{
        background: oldlace;
        
    }
    table{
        width: 1000px;
        margin: 0 auto;
        border-collapse: collapse;


    }
    td{
        border: 1px solid #333;
        padding: 10px;
        margin: 10px;
    }
    a:hover,a:visited{
        
        text-decoration: none;
        color: red;
    }
    a{
        text-decoration: none;
        color: darkslategrey;
    }

</style>

</head>
    <body>
    <table>
        <tr><th colspan="7">部门列表</th></tr>
        <tr>
            <td>部门id</td>
            <td>部门名称</td>
            <td>上级部门</td>
            <td>部门群</td>
            <td>自动加群</td>
            <td>成员信息</td>
            <td>操作</td>
        </tr>

        <?php if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
            <td><a href="/index.php/Home/bumen/getDepartmentDetail?id=<?php echo ($data["id"]); ?>"><?php echo ($data["id"]); ?></a></td>
            <td><?php echo ($data["name"]); ?></td>
            <td><?php echo ($data["parentid"]); ?></td>
            <td><?php echo ($data["createDeptGroup"]); ?></td>
            <td><?php echo ($data["autoAddUser"]); ?></td>
                <td><a href="/index.php/Home/bumen/Bumenchengyuan?department_id=<?php echo ($data["id"]); ?>&bumenmingcheng=<?php echo ($data["name"]); ?>">成员信息</a></td>
                <td><a href="/index.php/Home/bumen/DeleteDepartment?id=<?php echo ($data["id"]); ?>" >删除</a>
                    <a  href="/index.php/Home/bumen/Bumengengxin?id=<?php echo ($data["id"]); ?>" >修改 </a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td  align="center" colspan="7"><a href="/index.php/Home/huihua/sendtpl" >发消息</a></td>


        </tr>
        <tr>
            <td  align="center" colspan="7"><a href="/index.php/Home/bumen/Createbumen" >增加部门</a></td>


        </tr>
        <tr>
            <td  align="center" colspan="7"><a href="/index.php/Home/bumen/index" >返回部门首页</a></td>


        </tr>
        <tr>
            <td  align="center" colspan="7"><a href="/index.php/Home/Yuyue/index" >预约监听</a></td>


        </tr>
    </table>




    </body>
</html>