<!DOCTYPE html>
<html lang="en">
<head>
    <?php $tpl_uri =  get_template_directory_uri(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <?php wp_head(); ?>
    <title><?php wp_title('&laquo;', true, 'right'); bloginfo('name'); ?></title>
</head>
<body>

    <div id="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
		    <img src="http://rccoder.qiniudn.com/CCPC_logo_3.jpg" style="height:70px; padding-right: 50px; margin-top: 30px; float: left; filter:progid:DXImageTransform.Microsoft.Matrix( SizingMethod='auto expand',FilterType=bilinear,Dx=0.8,Dy=0, M11=0.5,M12=0.4,M21=0.1,M22=0.1);-webkit-transform:rotate(45deg);-moz-transform: rotate(-45deg);" id="ccpc-logo" />
                    <h1 style="line-height: 110px; font-size: 3.3em">黑龙江省大学生程序设计竞赛</h1>
		<div>
                    <img src="<?php echo $tpl_uri ?>/static/img/hit.png" style="float:right; margin-top: -85px" />
		</div>
                </div>
            </div>
        </div>
    </div>

<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<?php
$defaults = array(
    'theme_location'  => 'primary',
    'container'       => false,
    'menu_class'      => 'menu nav navbar-nav',
    'menu_id'         => 'navigation',
    'walker'          => new PosterMenuWalker(),
    'fallback_cb'     => 'PosterMenuWalker::fallback',
);

wp_nav_menu( $defaults );
?>
    </div><!-- .navbar-collapse -->
  </div><!-- /.container -->
</nav>