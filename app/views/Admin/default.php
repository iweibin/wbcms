<div class="content-right">
	<div class="box first">
 		<div class="headline">使用情况</div>
 		<table class="table" border="0" cellspacing="0" cellpadding="0">
 			<tr>
 				<td width="120">信息项名称</td>
 				<td>内容</td>
 			</tr>
 			<tr>
 				<td>用户数量</td>
 				<td><?=$amount_admin?></td>
 			</tr>
 			<tr>
 				<td>文章数量</td>
 				<td> 已发布：<span style="color: red;"><?=$amount_released?></span> / 总数：<?=$amount_article?></td>
 			</tr>
 			<!-- <tr>
 				<td>内存使用</td>
 				<td>1G / 100G</td>
 			</tr> -->
 		</table>
 	</div>
 	<div class="box second">
 		<div class="headline">系统信息</div>
 		<table class="table" border="0" cellspacing="0" cellpadding="0">
 			<tr>
 				<td width="120">信息项名称</td>
 				<td>内容</td>
 			</tr>
 			<tr>
 				<td>wbCMS 程序版本</td>
 				<td>wbCMS 1.0</td>
 			</tr>
 			<tr>
 				<td>服务器系统</td>
 				<td><?php echo PHP_OS; ?></td>
 			</tr>
 			<tr>
 				<td>运行环境</td>
 				<td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
 			</tr>
 			<tr>
 				<td>当前所设时区</td>
 				<td><?php echo date_default_timezone_get(); ?></td>
 			</tr>
 		</table>
 	</div>
</div>
