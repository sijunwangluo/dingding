<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发送会话</title>
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
<form action="/index.php/Home/Huihua/send" method="post">
<table>
    <thead>
        <tr>
            <th colspan="2">发送会话</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>发给成员</td>
            <td><input type="text" name="touser"></td>
        </tr>
        <tr>
            <td>发给部门</td>
            <td><input type="text" name="toparty"></td>
        </tr>
        <tr>
            <td>应用agentid</td>
            <td><select name="agentid">
                <option value="10899864">签到</option>
                <option value="10899867">钉钉体验站</option>
                <option value="10899866">免费电话</option>
                <option value="10899863">管理日历</option>
                <option value="13152085">电话会议</option>


            </select></td>
        </tr>
        <tr>
            <td>消息类型</td>
            <td>
                <select name="msgtype">
                <option value="text">文本</option>
                <option value="image">图片</option>
                <option value="voice">语音</option>
                <option value="file">文件</option>
                <option value="link">链接</option>
                <option value="OA">OA</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>消息内容</td>
            <td>
                <input type="text" name="content">
            </td>
        </tr>
        <tr>
            <td  align="center" colspan="2"><input type="submit" value="发送"></td>

        </tr>
        <tr>
            <td  align="center" colspan="2"><a href="/index.php/Home/bumen/index" >返回部门首页</a></td>

        </tr>
    </tbody>
</table>
</form>
</body>
</html>