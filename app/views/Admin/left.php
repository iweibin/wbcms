<div class="content content-left">
	<div class="content-left-user">
		<h1 style="">WBCMS</h1>
	</div>
	<div id="menu" class="menu">
		<!--<div class="menu-header" id="form"></div>-->
		<ul id="list">
		 	
			<?php foreach( $menu as $v ):?>
				<?php if($v['fid'] == 0): ?>
					<li class="<?php if($modelName == $v['cname']) echo "active"; ?>">
						<a href="<?=site_url('system')?>/<?=$v['url']?>/<?=$v['cid']?>"><?=$v['cname']?><span><i class="fa fa-angle-right"></i></span></a>
					</li>
				<?php endif;?>
			<?php endforeach;?>



		    <!-- <li><a href="#"><i class="fa fa-home"></i>首页 </a></li>
			<li><a href="#"><i class="fa fa-glass"></i>个人动态 </a></li>
			<li><a href="#"><i class="fa fa-file-image-o"></i>Gallery </a><span class="menu-label"> 12 </span></li>
			<li><a href="#"><i class="fa fa-cog"></i>Services </a>
				<ul class="submenu">
					<li><a href="#">Web Design </a></li>
					<li><a href="#">Hosting </a></li>
					<li><a href="#">Design </a>
						<ul class="submenu">
							<li><a href="#">Graphics </a></li>
							<li><a href="#">Vectors </a></li>
							<li><a href="#">Photoshop </a></li>
							<li><a href="#">Fonts </a></li>
						</ul>
					</li>
					<li><a href="#">Consulting </a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-th-large"></i>系统管理 </a></li>
			<li><a href="#"><i class="fa fa-th-large"></i>Portfolio </a>
				<ul class="submenu">
					<li><a href="#">Web Design </a></li>
					<li><a href="#">Graphics </a><span class="menu-label">10 </span>
					</li>
					<li><a href="#">Photoshop </a></li>
					<li><a href="#">Programming </a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-th-large"></i>About </a></li>
			<li><a href="#"><i class="fa fa-th-large"></i>Contact </a></li> -->
		   
		</ul>
		<div class="menu-footer">
			
		</div>
	</div>
</div>
