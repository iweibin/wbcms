<div class="main">
	<div class="content">
		<h2><?=$article_detail['theme']?></h2>
		<h5>发布时间：<?=$article_detail['date']?></h5>
		<p><?=$article_detail['content']?></p>
	</div>
	<div class="column-right">
    	 <div class="headline">推荐列表</div>
    	 <div class="list">
			<ul>
				<?php if(!empty($recommend_articles)):?>
					<?php foreach($recommend_articles as $v):?>
						<?php if($v['recommend']):?>
							<li><a alt="dsdddddddddddddd" href="<?=site_url('user/home/showDetail')?>/<?=$v['category']?>/<?=$v['id']?>"><?=mb_substr($v['theme'],0,9,'utf8')?></a><span><?=$v['date']?></span></li>
						<?php endif;?>
					<?php endforeach;?>
				<?php else:?>
						<li>暂无推荐的文章</li>
				<?php endif;?>
			</ul>
    	 </div>
    </div>
</div>