<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>内容发布管理系统</title>

	<link href="<?=base_url('public/css/system')?>/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('public/css/system')?>/style.css" rel="stylesheet" type="text/css" />

	<script src="<?=base_url('public/js')?>/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="box login">
 		<div class="headline" style="border-bottom: 1px solid #ccc">管理员登陆</div>
 		<form class="form" action="<?=site_url('system/admin/login')?>" method="post">
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="80">用户名</td>
	 				<td><input name="account" class="input" type="text"></td>
	 			</tr>
	 			<tr>
	 				<td>密　码</td>
	 				<td><input name="pwd" class="input" type="password"></td>
	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td> <button name="sub" type="submit">登 陆</button></td>
	 			</tr>
<!-- 	 			<tr>
	 				<td colspan="2">© 版权所有 2016 - 2100, Wibinn.L</td>
	 			</tr>	 -->		
	 		</table>
	 	</form>
	 	<div class="box-footer">
	 		<span>©CopyRight 2016 - 2100 By Wibinn.L</span>
	 	</div>
 	</div>
</body>
</html>