<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="<?php bloginfo('template_url'); ?>/static/font/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/static/font/ionicons.min.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/static/css/app.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/static/css/typo.css">

    <title><?php wp_title( '|', true, 'right' ); ?></title>
</head>
<body>

    <div id="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <img src="<?php bloginfo('template_url'); ?>/static/img/icpc.png"/>
                    <img src="<?php bloginfo('template_url'); ?>/static/img/hit.png" style="float:right;" />
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
         <?php if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                 array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'nav navbar-nav',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'walker' => new Bootstrap_Walker 
                    )); 
                    } else {
                    echo '<ul class="nav navbar-nav">';
                    wp_list_pages('sort_column=menu_order&title_li=');
                    echo '</ul>';
                } ?>
    </div><!-- .navbar-collapse -->
  </div><!-- /.container -->
</nav>

<div id="main">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
                <?php 
                    $current_page = (get_query_var('paged') ? get_query_var('paged') : 1);
                    wp_reset_query();
                    if((is_home() || is_front_page()) && $current_page == 1):
                ?>
                <div class="box">
                    <div id="album" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="album" class="active" data-slide-to="0"></li>
                            <li data-target="album" class="active" data-slide-to="1"></li>
                            <li data-target="album" class="active" data-slide-to="2"></li>
                        </ol><!-- .carousel-indicators -->

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php bloginfo('template_url'); ?>/static/photos/1.jpg" alt="" />
                                <div class="carousel-caption"><p>风吹草低见牛羊</p></div>
                            </div>
                            <div class="item">
                                <img src="<?php bloginfo('template_url'); ?>/static/photos/1.jpg" alt="" />
                                <div class="carousel-caption"><p>风吹草低见牛羊</p></div>
                            </div>
                            <div class="item">
                                <img src="<?php bloginfo('template_url'); ?>/static/photos/1.jpg" alt="" />
                                <div class="carousel-caption"><p>风吹草低见牛羊</p></div>
                            </div>
                        </div><!-- .carousel-inner -->

                        <a class="left carousel-control" href="#album" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#album" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div><!-- #album.carousel -->

                    <div class="box-content grey lower">
                        <h2 class="featured">CCPC 之东北地区大学生程序设计竞赛</h2>
                    </div>
                </div>
               <?php endif; ?>
               <?php if(is_home()) { ?>
                 <div class="box">
                    <div class="box-heading"><h2>最新消息</h2></div>
                    <div class="box-content">
                        <ul class="entries">
                            <?php include_once 'post_list.php'; ?>
                        </ul>
                    </div>
                </div><!-- .box -->
                <?php } ?>
                <?php 
                    if(!((is_home() || is_front_page()) && $current_page == 1))
                        specs_pages(3);
                ?>
                <?php 
                    if((is_home() || is_front_page()) && $current_page == 1):
                ?>
                <div class="box">
                    <div class="box-content">
                        <article class="typo">
                        <h1>ACM国际大学生程序设计竞赛</h1>
                        <p>ACM国际大学生程序设计竞赛（ACM International Collegiate Programming Contest, 简称ACM-ICPC或ICPC）是由国际计算机界具有悠久历史的权威性组织(美国)计算机协会（Association for Computing Machinery,
                        简称ACM）主办的一项旨在展示大学生创新能力、团队精神和在压力下编写程序、分析和解决问题能力的年度竞赛。ACM国际大学生程序设计竞赛始于1970年，成形于1977年，并于 1996年由上海大学引入中国大陆，目前已发展成为最具影响力的大学生计算机竞赛。</p>

                        <p>ACM 国际大学生程序设计竞赛由各大洲区域赛(Regional Contests)和全球总决赛(World Finals)两个阶段组成。各大洲区域赛第一名自动获得参加全球总决赛的资格。各大洲区域赛一般安排在每年的9-12月举行, 全球总决赛安排在第二年的上半年举行。每所大学可以有多支队伍参加区域赛，但只能有一支队伍参加全球总决赛。</p>

                        <p>亚洲地区的高校可组队参加在亚洲的所有赛区的区域赛, 但每位参赛选手在一个年度内至多只能参加两个赛区的区域赛。2014年度亚洲区共设立了十八个赛站, 每个赛站的第一名将自动晋级全球总决赛。第39届ACM-ICPC全球总决赛将于2015年5月16日至21日在摩洛哥举行, 将有120多所参赛学校获得参加全球总决赛资格。</p>
                        </article>
                    </div>
                </div><!-- .box -->
                <?php endif; ?>
            
