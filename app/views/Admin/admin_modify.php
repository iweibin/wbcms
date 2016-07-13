<div class="content-right">
	<div class="box first">
 		<div class="headline" style="border-bottom: 1px solid #ccc">修改信息</div>
 		<form class="form" action="<?=site_url('system/admin/modify/do')?>" method="post">
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="80">登陆账号</td>
	 				<td><input name="account" class="input" type="text" readonly="readonly" value="<?=$userInfo['account']?>"></td>
	 			</tr>
	 			<tr>
	 				<td width="80">用户名</td>
	 				<td><input name="userName" class="input" type="text" value="<?=$userInfo['userName']?>"></td>
	 			</tr>
	 			<tr>
	 				<td>新密码</td>
	 				<td><input name="pwd" class="input" type="password" value="" placeholder="**************不修改请留空**************"></td>
	 			</tr>
	 			<tr>
	 				<td>邮箱地址</td>
	 				<td><input name="email" class="input" type="email" value="<?=$userInfo['email']?>"></td>
	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td> <button name="sub" type="submit">修 改</button></td>
	 			</tr>
	 		</table>
	 	</form>
 	</div>
</div>