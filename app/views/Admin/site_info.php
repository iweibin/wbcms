<div class="content-right">
	<div class="box first">
 		<div class="headline" style="border-bottom: 1px solid #ccc">站点信息</div>
 		<form class="form" action="<?=site_url('system/index/siteInfo/modify')?>" method="post">
 			<input type="hidden" name="id" value="<?=$siteInfo['id']?>">
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="80">站点网址</td>
	 				<td><input name="url" class="input" type="text" value="<?=$siteInfo['siteurl']?>"></td>
	 			</tr>
	 			<tr>
	 				<td width="80">站点名称</td>
	 				<td><input name="title" class="input" type="text" value="<?=$siteInfo['title']?>"></td>
	 			</tr>
	 			<tr>
	 				<td width="80">联系电话</td>
	 				<td><input name="tel" class="input" type="text" value="<?=$siteInfo['tel']?>"></td>
	 			</tr>
	 			<tr>
	 				<td width="80">联系QQ</td>
	 				<td><input name="qq" class="input" type="text" value="<?=$siteInfo['qq']?>"></td>
	 			</tr>
	 			<tr>
	 				<td width="80">邮 箱</td>
	 				<td><input name="email" class="input" type="text" value="<?=$siteInfo['email']?>"></td>
	 			</tr>
	 			<!-- <tr>
	 				<td>&nbsp;Logo</td>
	 				<td><input name="logo" class="input" type="password" value="<?=$siteInfo['logo']?>"></td>
	 			</tr> -->
	 			<!-- <tr>
	 				<td>关闭站点</td>
	 				<td>
	 					<select name="closed">
	 						<option value="1">是</option>
	 						<option value="0" selected="selected">否</option>
	 					</select>
	 				</td>
	 			</tr> -->
	 			<tr>
	 				<td></td>
	 				<td> <button type="submit">修 改</button></td>
	 			</tr>
	 		</table>
	 	</form>
 	</div>
</div>