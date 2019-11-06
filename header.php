<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>ワルツ珈琲店｜大阪・八尾の自家焙煎コーヒー・ハーブティーの店</title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<script src="<?php bloginfo('template_directory'); ?>/library/js/libs/fitie.js"></script>
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Noto+Serif+JP&display=swap" rel="stylesheet">
		
		<script>
			(function(d) {
				var config = {
				kitId: 'kso5ajn',
				scriptTimeout: 3000,
				async: true
				},
				h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
			})(document);
    	</script>
		
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body id="body" <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div class="header-container">

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="shop-logo">
						<p><?php bloginfo( 'description' ); ?></p>
						<h1 itemscope itemtype="http://schema.org/Organization"><?php bloginfo( 'name' ); ?></h1>
					</a>

					<nav class="header-nav" id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'main-menu',
								'container'       => false,
								'menu_class'      => '',
								'items_wrap'      => '<ul>%3$s</ul>',
								'walker'          => new Custom_Walker_Nav_Menu
							));
						?>
					</nav>

					<div class="menu-trigger-wrapper">
						<div class="menu-trigger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<p>Menu</p>
					</div>

				</div>

			</header>

			<div class="scroll-to-top">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/up-arrow.png" alt="up-arrow">
			</div>
