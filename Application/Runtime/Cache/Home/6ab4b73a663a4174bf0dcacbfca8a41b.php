<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />
	<title>凤凰筑家备注操作</title>
	<meta charset="utf-8" >
	<style type="text/css">
		*{margin:0;
			padding:0;}
		body{
			-webkit-touch-callout: none; -webkit-text-size-adjust: none;
			color:#FFFFFF;font-size:20px;font-weight:bold;}
		a{text-decoration:none; color:#FFFFFF}

		.top1{background-color:#ed1c24;height:70px;width:100%;text-aligh:center;line-height:70px;}
		.top11{background-color:green;height:70px;width:100%;text-aligh:center;line-height:70px;}
		.top2{background-color:#669999;height:40px;width:100%;}


		.top2 span{text-align:center;color:#ed1c24;font-size:20px;line-height:40px;}
		.content{width:80%;margin:auto;height:1000px;}
		.content-top{background:#ed1c24;height:50px;border-radius:20px;}
		.content span{line-height:50px;}
		.content button{ height:50px;border-style:solid;border-radius:15px;border-width:2px;border-color:#FFF;font-size:20px;line-height:50px;background:#ed1c24;color:#FFFFFF;
		}
		table{border-radius:20px;border:solid 2px #ed1c24;width:100%;height:480px;}
		tr{border:solid 2px #FF0000;}
		.tblf{color:#FF0000;width:30%;text-align:center;font-size:14px;line-height:50px;}
		.tbrg{color:#666666;width:70%;text-aligh:center;font-size:14px;line-height:50px;}
		input{width:100%;height:50px;}
		textarea{width:100%;row:10;}
	</style>

</head>
<body>

<div class="top">

	<div class="top1">
		<center>凤凰筑家预约客户信息</center>

	</div>
	<div class="top11">

		<center><a href="/index.php/Home/Yuyue/index">接待区</a></center>
	</div>
	<div class="top2">
		<center><span><a href="/index.php/Home/Yuyue/dealwithed">备注客户</a></span>&nbsp;&nbsp;<span><a href="/index.php/Home/Yuyue/trash">垃圾客户</a></span></center>
	</div>
	<div class="content">
		<?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?><div class="content-top">
			<span>预约客户ID:<b><?php echo ($message["id"]); ?></b></span>&nbsp;

		</div>
		<div class="content-ok">
			<FORM  METHOD="POST" ACTION="/index.php/Home/Yuyue/beizhu">

				<table bordercolor="#00FFFF">
					<tr><td class="tblf">姓名</td><td class="tbrg"><input type="hidden" name="id" value="<?php echo ($message["id"]); ?>">
						<INPUT  placeholder="联系客户后，可以对信息进行更正" TYPE="text" NAME="user" value="<?php echo ($message["user"]); ?>"/></td></tr>
					<tr><td><hr></td><td><hr></td></tr>
					<tr><td class="tblf">手机</td><td class="tbrg"><INPUT  placeholder="联系客户后，可以对信息进行更正" TYPE="text" NAME="title" value="<?php echo ($message["title"]); ?>"/></td></tr>
					<tr><td><hr></td><td><hr></td></tr>
					<tr><td class="tblf">小区</td><td class="tbrg"><INPUT  placeholder="联系客户后，可以对信息进行更正" TYPE="text" NAME="content" value="<?php echo ($message["content"]); ?>"/></td></tr>
					<tr><td><hr></td><td><hr></td></tr>
					<tr><td class="tblf">备注</td><td class="tbrg"><textarea name="beizhu" placeholder="联系客户后，可以对信息进行更正" ><?php echo ($message["beizhu"]); ?></textarea></td></tr>
					<tr><td><hr></td><td><hr></td></tr>

					<tr><td> <INPUT    class="baocun"  onclick="javascript:return baocun()" TYPE="submit" name="submit" value="保存"/> </td></tr>
				</table>


			</FORM>


		</div>


	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<SCRIPT LANGUAGE=javascript>
	function baocun() {
		var msg = " 确定无误吗？\n\n 请务必对操作负责！";
		if (confirm(msg)==true){
			return true;
		}else{
			return false;
		}
	}
</SCRIPT>
</body>
</html>