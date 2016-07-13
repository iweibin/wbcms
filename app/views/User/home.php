<div class="main">
    <div class="column-left">
        <div class="headline">文章列表</div>
        <div class="list">
			<ul>
				<?php if(!empty($articles)):?>
					<?php foreach($articles as $v ):?>
						<li><a href="<?=site_url('user/home/showDetail')?>/<?=$v['category']?>/<?=$v['id']?>"><?=mb_substr($v['theme'],0,40,'utf8')?></a><span><?=$v['date']?></span></li>
					<?php endforeach;?>
				<?php else:?>
						<li>暂无发布的文章</li>
				<?php endif;?>
			</ul>
        </div>
    </div>
    <div class="column-right">
    	 <div class="headline">推荐列表</div>
    	 <div class="list">
			<ul>
				<?php if(!empty($recommend_articles)):?>
					<?php foreach($recommend_articles as $v):?>
						<?php if($v['recommend']):?>
							<li><a href="<?=site_url('user/home/showDetail')?>/<?=$v['category']?>/<?=$v['id']?>"><?=mb_substr($v['theme'],0,9,'utf8')?></a><span><?=$v['date']?></span></li>
						<?php endif;?>
					<?php endforeach;?>
				<?php else:?>
						<li>暂无推荐的文章</li>
				<?php endif;?>
			</ul>
    	 </div>
    </div>
</div>