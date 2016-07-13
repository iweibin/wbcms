<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?=$siteInfo['title']?></title>

<link href="<?=base_url('public/css/system')?>/menu.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url('public/css/system')?>/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url('public/css/system')?>/style.css" rel="stylesheet" type="text/css" />


<script src="<?=base_url('public/js')?>/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url('public/js')?>/menu.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('public/editor/ueditor.config.js')?>"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('public/editor/ueditor.all.js')?>"> </script>
<script type="text/javascript">
	$(function(){	
		$("#menu").jqueryAccordionMenu();
		//顶部导航切换
		$("#list li,.header-left a").click(function(){
			$("#list li.active,.header-left a.active").removeClass("active");
			$(this).addClass("active");
		});
		var height = $(window).height();
		var width = $(window).width()-200;
		$(".content").css('height',height + "px");	
		$(".header").css('width',width + "px");	
		//alert(new Date());
		setInterval(function(){
	        var mon, day, now, hour, min, sec;   
	        now = new Date();
	        day = now.getDate();
	        mon = now.getMonth()+1;
	        hour = now.getHours();
	        min = now.getMinutes();
	        sec = now.getSeconds();
	        if (hour < 10) {
	            hour = "0" + hour;
	        }
	        if (min < 10) {
	            min = "0" + min;
	        }
	        if (sec < 10) {
	            sec = "0" + sec;
	        }
	        $("#Timer").html( "<i class='fa fa-clock-o'></i> " + now.getFullYear() + "年"+ mon +"月"+ day+"日 "+ hour + ":" + min + ":" + sec );
	    },1000);
	})
</script>
</head>
<body>
	<div class="header">
		<div class="header-left">
			<a href="<?=site_url()?>" target="_blank"><i class="fa fa-home"></i> 前台首页</a>
			<a href="<?=site_url('system/index/siteInfo')?>" ><i class="fa fa-cog"></i> 站点设置</a>
			<?php if($level == 2 ): ?>
				<a href="<?=site_url('system/admin/manage')?>"><i class="fa fa-user"></i> 用户管理</a>
			<?php endif; ?>
			<a href="<?=site_url('system/admin/modify')?>"><i class="fa fa-info-circle"></i> 修改信息</a>
			<a href="<?=site_url('system/admin/logout')?>"><i class="fa fa-power-off"></i> 注销登陆</a>
		</div>
		<div class="header-right">
			<span id="Timer"></sapn>
		</div>
	</div>
	<div class="nav">
		<i class="fa fa-home"> </i><span> 当前位置: <?=$modelName?> <?php if( isset($actionName) ) echo " > ".$actionName;?></span>
	</div>	
