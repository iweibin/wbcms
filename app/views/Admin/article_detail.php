	<div class="box article_detail">
 		<div class="headline">添加/编辑内容</div>
 		<form class="form" action="<?=site_url('system/home/acticle')?>/<?=$cid?>/edit" method="post">
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="80">所属栏目：</td>
	 				<td>
	 					<select name="category" style="width: 100px;">
	 					<?php foreach($menu as $v): ?>
							<?php if($v['fid'] == 0):?>
		 						<option value="<?=$v['cid']?>" <?php if($v['cid'] == $cid) echo "selected='selected'" ?>><?=$v['cname']?></option>
		 					<?php endif;?>
	 					<?php endforeach; ?>
	 					</select>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td width="80">标　题：</td>
	 				<td><input name="theme" class="input" type="text" value="<?php echo isset($article) ? $article['theme'] : ''; ?>"></td>
	 			</tr>
	 			<tr>
	 				<td>具体内容：</td>
	 				<td>
						<script id="editor" name="content" type="text/plain" style="width: 800px; height:250px;" >
							<?php echo isset($article) ? $article['content'] : ''; ?>
						</script>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td>排　序：</td>
	 				<td><input name="rank" class="input" type="text" value="<?php echo isset($article) ? $article['rank'] : ''; ?>" style="width: 80px;"> <span style="font-size:14px;">越大越靠前</span></td>
	 			</tr>
	 			<tr>
	 				<td>是否推荐：</td>
	 				<td>
						<select name="recommend">
	 						<option value="1">是</option>
	 						<option value="0" selected="selected">否</option>
	 					</select>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td>是否显示：</td>
	 				<td>
						<select name="showed">
	 						<option value="1" selected="selected">是</option>
	 						<option value="0">否</option>
	 					</select>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td> <button type="submit">提 交</button></td>
	 			</tr>
	 		</table>
 		</form>
 	</div>
 	<div></div>
</div>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
	function setContent() {
		
	}
</script>