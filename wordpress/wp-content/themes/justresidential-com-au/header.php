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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/nivo-slider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

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
	<?php $i=1; if( have_rows('custom_slide_show','options') ):?>
	<div class="slider-wrapper">
		<div id="slider" class="nivoSlider">
	<?php $i=1; while( have_rows('custom_slide_show','options') ): the_row(); 		// vars
		$image = get_sub_field('image_slideshow');
		?>
		    	<img src="<?php echo $image['url']; ?>" data-thumb="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" title="#htmlcaption<?php echo $i;?>">
				
	<?php $i++;endwhile; ?>
	</div><!-- end mycarousel-->
	<?php $i=1; while( have_rows('custom_slide_show','options') ): the_row(); 	
		$content = get_sub_field('description_page');
		$link = get_sub_field('url_on_slideshow');
		$text_link = get_sub_field('text_link_page');
		$title_page = get_sub_field('title_page');
		?>
		    	<div id="htmlcaption<?php echo $i;?>" class="carousel-caption nivo-html-caption">
			        <h3><?php echo $title_page; ?></h3>
			        <p><?php echo $content; ?></p>
			        <p class="price"><a href="<?php echo $link; ?>"><?php echo $text_link; ?></a></p>
		      	</div>
	<?php $i++;endwhile; ?>
	<?php endif; ?>
	</div>
<?php else:?>
	<?php 
	if(is_page()){ 
			$imgpage = get_field("add_images_page") ? get_field("add_images_page") : get_bloginfo('template_url').'/images/careers-header-img.png';
		?>	
			<div class="img-header" style="background:url('<?php echo $imgpage;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
						echo '<h2 class="title-img-header">'.get_the_title().'</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_category()){
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$imgcat = get_field( "add_image_category",$cur_cat_id) ? get_field( "add_image_category",$cur_cat_id) : get_bloginfo('template_url').'/images/careers-header-img.png';
		?>	
			<div class="img-header" style="background:url('<?php echo $imgcat;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<h2 class="title-img-header"><?php single_cat_title();?></h2>
			</div>
		<?php
	}
	if(is_single()){
		$categories = get_the_category();
			if ( ! empty( $categories ) ) {
		$imgcat = get_field( "add_image_category" , $categories->term_id) ? get_field( "add_image_category" , $categories->term_id) : get_bloginfo('template_url').'/images/careers-header-img.png';
		?>	
			<div class="img-header" style="background:url('<?php echo $imgcat;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
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
		$url = get_bloginfo('template_url').'/images/careers-header-img.png';
		?>
			<div class="img-header" style="background:url('<?php echo $url;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
						echo '<h2 class="title-img-header">Search</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_404()){
		$url = get_bloginfo('template_url').'/images/careers-header-img.png';
		?>
			<div class="img-header" style="background:url('<?php echo $url;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
						echo '<h2 class="title-img-header">404</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_date()){
		$url = get_bloginfo('template_url').'/images/careers-header-img.png';
		?>
			<div class="img-header" style="background:url('<?php echo $url;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
						echo '<h2 class="title-img-header">ARCHIVES</h2>';
				?>
				
			</div>
		<?php
	}
	if(is_tag()){
		$url = get_bloginfo('template_url').'/images/careers-header-img.png';
		?>
			<div class="img-header" style="background:url('<?php echo $url;?>') center center no-repeat; background-size:cover;min-height:365px;">
				<?php
						echo '<h2 class="title-img-header">ARCHIVES</h2>';
				?>
				
			</div>
		<?php
	}
endif;		
?></div><!-- end header-->