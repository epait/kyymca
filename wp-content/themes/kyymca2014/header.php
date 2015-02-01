<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width">

	<meta name="author" content="YMCA College Youth In Government">

	<meta name="description" content="">

	<meta name="keywords" content="">

	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/<?php the_field('theme_color', 'option'); ?>/yLogoIcon.png">

	<title><?php bloginfo('name') ?></title>

	<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/layerslider/css/layerslider.css">

	<link href="<?php bloginfo('template_directory'); ?>/css/jquery.jtweetsanywhere-1.3.1.css" rel="stylesheet">

	<link href="<?php bloginfo('template_directory'); ?>/css/app.css" rel="stylesheet">

	<link href="<?php bloginfo('template_directory'); ?>/css/<?php the_field('theme_color', 'option'); ?>.css" rel="stylesheet">

	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

</head>

	<div class="container-fluid">

	<div class="row-fluid">

		<div class="col-sm-12">

			<nav class="navbar navbar-default" role="navigation">

			  <div class="container-fluid">

			    <!-- Brand and toggle get grouped for better mobile display -->

			    <div class="navbar-header">

			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

			        <span class="sr-only">Toggle navigation</span>

			        <span class="icon-bar"></span>

			        <span class="icon-bar"></span>

			        <span class="icon-bar"></span>

			      </button>

			      <form class="input-group header-search-bar hidden-xs" role="search" action="<?php bloginfo('home'); ?>/">

				    <input type="text" id="header-search-input" class="form-control" placeholder="Search..." value="<?php echo wp_specialchars($s, 1); ?>" name="s" />

				    <span class="input-group-btn">

				      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>

				    </span>

				  </form>

			      <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/img/<?php the_field('theme_color', 'option'); ?>/yLogo.png"></a>

				  <div id="logo">

				   <a href="<?php echo home_url( '/' ); ?>"><?php the_field('header_top_row', 'option'); ?><br><span id="secondRow"><?php the_field('header_bottom_row', 'option'); ?></span>

				   <span class="pull-right hidden-xs header-right">

				    <span id="rights"><?php the_field('header_tagline', 'option'); ?></span>

				    <span id="divider">|</span>

				    <span id="est">Est. <?php the_field('header_establishment_year', 'option'); ?><!-- Year Established --></span>

				   </span></a>

				  </div>

			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->

			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			    	<span class="hidden-xs">

				        <?php

				         /** Loading WordPress Custom Menu  **/

				         wp_nav_menu( array(

				            'theme_location'  => 'header-menu',

				            'container_class' => 'nav-collapse',

				            'menu_class'      => 'nav navbar-nav',

				            'walker' 		  => new CSS_Menu_Maker_Walker(),

				            'fallback_cb'     => '',

				        ) ); ?>

				    </span>

				    <span class="visible-xs">

				    	<form class="input-group mobile-search-bar" role="search" action="<?php bloginfo('home'); ?>/">

						  <input type="text" class="form-control" placeholder="Search..." value="<?php echo wp_specialchars($s, 1); ?>" name="s" />

						  <span class="input-group-btn">

						    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>

						  </span>

						</form>

				        <?php

				         /** Loading WordPress Custom Menu  **/

				         wp_nav_menu( array(

				            'theme_location'  => 'header-menu',

				            'container_class' => 'nav-collapse',

				            'menu_class'      => 'nav navbar-nav',

				            'depth'           => 1,

				            'fallback_cb'     => '',

				        ) ); ?>

				    </span>

			    </div><!-- /.navbar-collapse -->

			  </div><!-- /.container-fluid -->

			</nav>

		</div>

	</div>

	<div class="wrapper">

