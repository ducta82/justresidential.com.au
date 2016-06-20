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
	<?php
		$rows = get_field('custom_slide_show','options');
	?>
	<?php if( have_rows('custom_slide_show','options') ):?>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
		  <!-- Indicators -->
	  	<ol class="carousel-indicators">
	  	<?php  $i = 0; while( have_rows('custom_slide_show','options') ): the_row();
	  	$cls = $i == 0? 'active': '';
	  	?>
			
		    <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php echo $cls; ?>"></li>

	  <?php  $i++; endwhile; ?>
	  	</ol>
	  	<div class="carousel-inner">
	<?php $i=0; while( have_rows('custom_slide_show','options') ): the_row(); 
		$cls = $i == 0? 'active': '';
		// vars
		$image = get_sub_field('image_slideshow');
		$content = get_sub_field('description_page');
		$link = get_sub_field('url_on_slideshow');
		$text_link = get_sub_field('text_link_page');
		$title_page = get_sub_field('title_page');
		?>
		<div class="item <?php echo $cls; ?>">
		    	<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt'] ?>">
			    <div class="carousel-caption">
			        <h3><?php echo $title_page; ?></h3>
			        <p><?php echo $content; ?></p>
			        <p class="price"><a href="<?php echo $link; ?>"><?php echo $text_link; ?></a></p>
		      	</div>
		    </div>
		
	<?php $i++; endwhile; ?>

		</div>

	<?php endif; ?>

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
		$imgcat = get_field( "add_image_category",$cur_cat_id);
		?>	
			<div class="img-header">
				<?php

					if($imgcat){
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
	if(is_search()){
		?>
			<div class="img-header">
				<?php
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
						echo '<h2 class="title-img-header">Search</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_404()){
		?>
			<div class="img-header">
				<?php
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
						echo '<h2 class="title-img-header">404</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_date()){
		?>
			<div class="img-header">
				<?php
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
						echo '<h2 class="title-img-header">ARCHIVES</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_tag()){
		?>
			<div class="img-header">
				<?php
						echo '<img src="'.get_bloginfo('template_url').'/images/careers-header-img.png" class="img-responsive" alt="Image">';
						echo '<h2 class="title-img-header">ARCHIVES</h2>';
				?>
				
			</div>
		<?php
	}
?></div><!-- end header-->
<?php endif;?>	