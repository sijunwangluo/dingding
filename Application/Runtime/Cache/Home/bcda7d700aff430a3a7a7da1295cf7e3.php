<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>部门成员</title>
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
    <tr>
        <th colspan="3"><b><?php echo ($bumen); ?></b>
        部门有<font color="red"> <b><?php echo ($count); ?></b></font>人</th>
    </tr>
    <tr>
        <td>成员userid</td>
        <td>成员名称</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
        <td><a href="/index.php/Home/chengyuan/detail?userid=<?php echo ($v["userid"]); ?>"><?php echo ($v["userid"]); ?></a></td>
        <td><a href="/index.php/Home/chengyuan/detail?userid=<?php echo ($v["userid"]); ?>"><?php echo ($v["name"]); ?></a></td>
        <td><a href="/index.php/Home/chengyuan/delete?userid=<?php echo ($v["userid"]); ?>&department_id=<?php echo ($department_id); ?>&bumenmingcheng=<?php echo ($bumen); ?>">删除</a> 修改</td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td  align="center" colspan="3"><a href="/index.php/Home/chengyuan/Createchengyuan" >添加成员</a></td>


    </tr>
    <tr>
        <td  align="center" colspan="3"><a href="/index.php/Home/bumen/index" >返回部门首页</a></td>


    </tr>
</table>

</body>
</html>