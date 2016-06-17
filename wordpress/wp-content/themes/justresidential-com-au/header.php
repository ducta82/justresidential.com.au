<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justresidential.com.au
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>
		<?php 
			wp_title('|', true,'right');
			bloginfo('name');
		?>
	</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/reponsive.css" />
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wapper">
	<div class="header">
		<div class="container content">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<img src="<?php bloginfo( 'template_url' ); ?>/images/icon-menu.png" class="img-responsive" alt="Image">
						</button>
						<h1 class="site-name"><a href="/"><strong>just</strong>residential</a></h1>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<?php    /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'theme_location' => 'primary',
							'container' => 'div',
							'container_class' => 'navbar-collapse primary-nav',
							'menu_class' => 'nav navbar-nav navbar-right',
							'menu_id' => 'primary-menu',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'walker' => new My_Walker_Nav_Menu()
						);
					
						wp_nav_menu( $args );?>
				</div>
			</nav><!--end nav menu-->
		</div><!--end content-->
<?php if(is_home()):?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
	  	<ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		    <li data-target="#myCarousel" data-slide-to="3"></li>
	  	</ol>

	  <!-- Wrapper for slides -->
	  	<div class="carousel-inner">
		    <div class="item active">
		    	<img src="<?php bloginfo( 'template_url' ); ?>/images/banner-home.png" class="img-responsive" alt="Image">
			    <div class="carousel-caption">
			        <h3>tenant check</h3>
			        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
			        <p class="price"><a href="javascript:void(0)">only $19.95</a></p>
		      	</div>
		    </div>

		    <div class="item">
		    	<img src="<?php bloginfo( 'template_url' ); ?>/images/banner-home.png" class="img-responsive" alt="Image">
		      	<div class="carousel-caption">
		        	<h3>tenant check</h3>
			        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
			        <p class="price"><a href="javascript:void(0)">only $21.95</a></p>
		      	</div>
		    </div>

		    <div class="item">
		    	<img src="<?php bloginfo( 'template_url' ); ?>/images/banner-home.png" class="img-responsive" alt="Image">
		      	<div class="carousel-caption">
		        	<h3>tenant check</h3>
			        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
			        <p class="price"><a href="javascript:void(0)">only $23.95</a></p>
		      	</div>
		    </div>

		    <div class="item">
		    	<img src="<?php bloginfo( 'template_url' ); ?>/images/banner-home.png" class="img-responsive" alt="Image">
		      	<div class="carousel-caption">
		        	<h3>tenant check</h3>
			        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
			        <p class="price"><a href="javascript:void(0)">only $25.95</a></p>
		      	</div>
		    </div>
	  	</div>

		  <!-- Left and right controls -->
	  	<a class="left" href="#myCarousel" data-slide="prev">
		    <i class="fa fa-angle-left"></i>
		    <span class="sr-only">Previous</span>
	  	</a>
	  	<a class="right" href="#myCarousel" data-slide="next">
	    <i class="fa fa-angle-right"></i>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div><!-- end mycarousel-->
<?php else:?>
	<?php 
	if(is_page()){ 
		?>	
			<div class="img-header">
				<?php

					if(get_field( "add_images_page" )){
						echo '<img src="'.get_field( "add_images_page" ).'" class="img-responsive" alt="Image">';
					}else{
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
					}
						echo '<h2 class="title-img-header">'.get_the_title().'</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_category()){
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$imgcat = get_field( "add_image_category" , $cur_cat_id);
		?>	
			<div class="img-header">
				<?php

					if(get_field( "add_image_category" )){
						echo '<img src="'.$imgcat.'" class="img-responsive" alt="Image">';
					}else{
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
					}
					?>
					<h2 class="title-img-header"><?php single_cat_title();?></h2>
			</div>
		<?php
	}
	if(is_single()){
		$categories = get_the_category();
			if ( ! empty( $categories ) ) {
		$imgcat = get_field( "add_image_category" , $categories->term_id);
		?>	
			<div class="img-header">
				<?php
					if(get_field( "add_images_page" )){
						echo '<img src="'.$imgcat.'" class="img-responsive" alt="Image">';
					}else{
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
					}
					if(is_page()){
						echo '<h2 class="title-img-header">'.get_the_title().'</h2>';       
					}
					else{
						?>
						<h2 class="title-img-header"><?php echo $categories[0]->name; ?></h2>
						<?php
					}
				?>
				
			</div>
		<?php	
		}
	}

?></div><!-- end header-->
<?php endif;?>	