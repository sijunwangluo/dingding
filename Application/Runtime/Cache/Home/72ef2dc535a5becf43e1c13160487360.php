<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($v["name"]); ?>部门</title>
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
    <thead>
    <tr>
        <th colspan="2"><?php echo ($v["name"]); ?>部门</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>部门id</td>
        <td><?php echo ($v["id"]); ?></td>
    </tr>
    <tr>
        <td>部门名称</td>
        <td><?php echo ($v["name"]); ?></td>
    </tr>
    <tr>
        <td>父部门id，根部门为1</td>
        <td><?php echo ($v["parentid"]); ?></td>
    </tr>
    <tr>
        <td>部门序号</td>
        <td><?php echo ($v["order"]); ?></td>
    </tr>
    <tr>
        <td>部门群 </td>
        <td><?php echo ($v["createDeptGroup"]); ?></td>
    </tr>
    <tr>
        <td>新人自动入群 </td>
        <td><?php echo ($v["autoAddUser"]); ?></td>
    </tr>
    <tr>
        <td>是否隐藏部门</td>
        <td><?php echo ($v["deptHiding"]); ?></td>
    </tr>
    <tr>
        <td>部门隐藏看哪部</td>
        <td><?php echo ($v["deptPerimits"]); ?></td>
    </tr>
    <tr>
        <td>部门隐藏，可看谁</td>
        <td><?php echo ($v["userPerimits"]); ?></td>
    </tr>
    <tr>
        <td> 自己看己</td>
        <td><?php echo ($v["outerDept"]); ?></td>
    </tr>
    <tr>
        <td>自看，可以看哪部</td>
        <td><?php echo ($v["outerPermitDepts"]); ?></td>
    </tr>
    <tr>
        <td>自看，可以看哪人</td>
        <td><?php echo ($v["outerPermitUsers"]); ?></td>
    </tr>
    <tr>
        <td>企业群群主</td>
        <td><?php echo ($v["orgDeptOwner"]); ?></td>
    </tr>
    <tr>
        <td>部门的主管列表</td>
        <td><?php echo ($v["deptManagerUseridList"]); ?></td>
    </tr>
     <tr> <td  align="center" colspan="2"><a href="/index.php/Home/bumen/index" >返回部门首页</a></td></tr>
    </tbody>
</table>
</body>
</html>