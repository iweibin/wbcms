<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>WB文库</title>
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="<?=base_url('public/css/user/layoutit.css')?>" /> 
        <link rel="stylesheet" href="<?=base_url('public/css/user/style.css')?>" /> 
        <link rel="stylesheet" href="<?=base_url('public/css/user/bootstrap-combined.min.css')?>" />
        <script type="text/javascript" src="<?=base_url('public/js/jquery.js')?>"></script> 
        <script type="text/javascript" src="<?=base_url('public/js/bootstrap.min.js')?>"></script> 
        <!-- Enabling HTML5 support for Internet Explorer -->
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>     
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                     <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="javascript:void(0)" class="brand">欢迎来到WB文库</a>
                    <div class="nav-collapse navbar-responsive-collapse collapse">
                        <ul class="nav">

                            <?php foreach($categories as $v) :?>
                                <li <?php if($v['cid'] == $cid) echo "class='active'"; ?>> <a href="<?=site_url('user')?>/<?=$v['url']?>/<?=$v['cid']?>"><?=$v['cname']?></a> </li>
                            <?php endforeach;?> 
                            <!-- <li class="dropdown">
                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="#">下拉导航1</a> </li>
                                    <li> <a href="#">下拉导航2</a> </li>
                                    <li> <a href="#">其他</a> </li>
                                    <li class="divider"></li>
                                    <li class="nav-header"> 标签 </li>
                                    <li> <a href="#">链接1</a> </li>
                                    <li> <a href="#">链接2</a> </li> 
                                </ul>
                            </li> -->
                        </ul>
                        <ul class="nav pull-right">
                           <!--  <li> <a href="#">右边链接</a> </li> -->
                            <li class="divider-vertical"> </li>
                            <li class="dropdown">
                                 <a data-toggle="dropdown" class="dropdown-toggle" href="javacript:void(0)">更多<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="<?=site_url('system')?>" target="_blank">管理面板</a> </li>
                                   <!--  <li class="divider"> </li> -->
                                   <!--  <li> <a href="#">链接3</a> </li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>