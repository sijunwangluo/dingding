<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成员详情页</title>
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
            <th colspan="2">成员信息</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>员工唯一标识ID（不可修改）</td>
            <td><?php echo ($v["userid"]); ?></td>
        </tr>
        <tr>
            <td>排序</td>
            <td><?php echo ($v["order"]); ?></td>
        </tr>
        <!--<tr>-->
            <!--<td>钉钉ID</td>-->
            <!--<td><?php echo ($v["dingId"]); ?></td>-->
        <!--</tr>-->
        <tr>
            <td>手机号（ISV不可见）</td>
            <td><?php echo ($v["mobile"]); ?></td>
        </tr>
        <tr>
            <td>分机号（ISV不可见）</td>
            <td><?php echo ($v["tel"]); ?></td>
        </tr>
        <tr>
            <td>办公地点（ISV不可见）</td>
            <td><?php echo ($v["workPlace"]); ?></td>
        </tr>
        <tr>
            <td>备注（ISV不可见）</td>
            <td><?php echo ($v["remark"]); ?></td>
        </tr>
        <tr>
            <td>企业的管理员</td>
            <td><?php echo ($v["isAdmin"]); ?></td>
        </tr>
        <tr>
            <td>企业的老板</td>
            <td><?php echo ($v["isBoss"]); ?></td>
        </tr>
        <tr>
            <td>是否隐藏号码</td>
            <td><?php echo ($v["isHide"]); ?></td>
        </tr>
        <tr>
            <td>是否是部门的主管</td>
            <td><?php echo ($v["isLeader"]); ?></td>
        </tr>
        <tr>
            <td>成员名称</td>
            <td><?php echo ($v["name"]); ?></td>
        </tr>
        <tr>
            <td>是否激活</td>
            <td><?php echo ($v["active"]); ?></td>
        </tr>
        <!--<tr>-->
            <!--<td>部门id列表</td>-->
            <!--<td><?php echo ($v["department"]); ?></td>-->
        <!--</tr>-->
        <tr>
            <td>职位信息</td>
            <td><?php echo ($v["position"]); ?></td>
        </tr>
        <tr>
            <td>员工的邮箱</td>
            <td><?php echo ($v["email"]); ?></td>
        </tr>
        <tr>
            <td>员工的企业邮箱</td>
            <td><?php echo ($v["orgEmail"]); ?></td>
        </tr>
        <tr>
            <td>头像url</td>
            <td><?php echo ($v["avatar"]); ?></td>
        </tr>
        <tr>
            <td>员工工号</td>
            <td><?php echo ($v["jobnumber"]); ?></td>
        </tr>
        <tr>
            <td>扩展属性</td>
            <td><?php echo ($v["extattr"]); ?></td>
        </tr>
        <tr>

            <td   align="center" colspan="2"><a href="/index.php/Home/bumen/index" >返回部门首页</a></td>
        </tr>

    </tbody>
</table>
</body>
</html>