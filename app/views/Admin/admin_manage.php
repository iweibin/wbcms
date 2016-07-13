<div class="content-right">
	<div class="body" style="padding-bottom: 20px;">
		<div class="box first">
	 		<div class="headline" style="border-bottom: 1px solid #ccc">添加管理员</div>
	 		<form class="form" action="<?=site_url('system/admin/new_admin')?>" method="post">
		 		<table class="table" border="0" cellspacing="0" cellpadding="0">
		 			<tr>
		 				<td width="80">登陆账号</td>
		 				<td><input name="account" class="input" type="text"></td>
		 			</tr>
		 			<tr>
		 				<td width="80">用户名</td>
		 				<td><input name="userName" class="input" type="text"></td>
		 			</tr>
		 			<tr>
		 				<td>密　码</td>
		 				<td><input name="pwd" class="input" type="password"></td>
		 			</tr>
		 			<tr>
		 				<td>邮箱地址</td>
		 				<td><input name="email" class="input" type="email"></td>
		 			</tr>
		 			<tr>
		 				<td></td>
		 				<td> <button name="sub" type="submit">添 加</button></td>
		 			</tr>
		 		</table>
		 	</form>
	 	</div>
		<div class="box second">
	 		<div class="headline">所有用户</div>
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="120">用户名</td>
	 				<td width="120">注册邮箱</td>
	 				<td width="150">注册时间</td>
	 				<td width="120">用户权限</td>
	 				<td>操作</td>
	 			</tr>
	 		<?php $arr = array('无权限','普通管理员','超级管理员'); ?>
	 		<?php foreach( $user as $v ): ?>
	 			<tr>
	 				<td><?=$v['userName']?></td>
	 				<td><?=$v['email']?></td>
	 				<td><?=$v['regdate']?></td>
	 				<td><?=$arr[$v['level']]?></td>
	 				<td>
						<?php if($v['level'] != 0):?>
	 						<a href="<?=site_url('system/admin/cancelAdmin')."/".$v['uid']?>">[取消管理员]</a>
	 					<?php else: ?>
	 						<a href="<?=site_url('system/admin/setAdmin')."/".$v['uid']?>">[设为管理员]</a> 
						<?php endif;?>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=site_url('system/admin/delAdmin')."/".$v['uid']?>">[删除]</a>
	 				</td>
	 			</tr>
	 		<?php endforeach; ?>
	 		</table>
	 	</div>
	</div>
</div>