	<div class="box article_list">
	 		<div class="headline">文章管理</div>
	 		<table class="table" border="0" cellspacing="0" cellpadding="0">
	 			<tr>
	 				<td width="40">编号</td>
	 				<td width="40">ID</td>
	 				<td width="300">标题</td>
	 				<td width="30">排序</td>
	 				<td width="30">推荐</td>
	 				<td width="30">显示</td>
	 				<td width="200">操作</td>
	 				<td></td>
	 			</tr>
	 			<?php $index = 1;?>
	 			<?php foreach($articles as $v): ?>
		 			<tr>
		 				<td><?=$index?></td>
		 				<td><?=$v['id']?></td>
		 				<td><?=$v['theme']?></td>
		 				<td><?=$v['rank']?></td>
		 				<td><img src="<?=base_url('public/images');?><?php echo $v['recommend']?'/yes.gif':'/no.gif';?>" alt=""></td>
		 				<td><img src="<?=base_url('public/images')?><?php echo $v['showed']?'/yes.gif':'/no.gif';?>" alt=""></td>
		 				<td>
		 					<a href="<?=site_url('system/home/acticle')?>/<?=$cid?>/modify/<?=$v['id']?>">[修改]</a>&nbsp;&nbsp;&nbsp;
		 					<a href="<?=site_url('system/home/acticle')?>/<?=$cid?>/del/<?=$v['id']?>">[删除]</a>&nbsp;&nbsp;&nbsp;
							<?php if($v['released']):?>
		 						<a href="<?=site_url('system/home/acticle')?>/<?=$cid?>/release/<?=$v['id']?>">[取消发布]</a>
							<?php else: ?>
		 						<a href="<?=site_url('system/home/acticle')?>/<?=$cid?>/release/<?=$v['id']?>">[发布]</a>
							<?php endif;?>
		 				</td>
		 				<td></td>
		 			</tr>
		 		<?php $index++; ?>
		 		<?php endforeach;?>
	 		</table>
	 	</div>
</div>