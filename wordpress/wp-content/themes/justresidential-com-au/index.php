<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

get_header(); ?>
<div class="our-services">
	<div class="container content">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-archive">
			<img src="<?php bloginfo( 'template_url' ); ?>/images/icon-ourservices.png" class="img-responsive" alt="Image">
			<h2 class="title-archive">our services</h2>
			<p>Pellentesque habitant morbi tristiquesenectus et netus et malesuada fames ac turpis egestas</p>
		</div>
		<div class="row">
			<?php
						$page_ids = get_all_page_ids();
						foreach($page_ids as $page)
						{
						if( have_rows('page_in_our_services',$page)){
							$rows = get_field('page_in_our_services',$page ); // get all the rows
							$first_row = $rows[0]; 
							$page_show = $first_row['show_page_in_our_services']; 
							$image_show = $first_row['image_page_show'];
							$description_page_show = $first_row['my_description_page_show'];
								if($page_show){
									?>
										<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 item-ourservices">
												<img src="<?php echo $image_show; ?>" class="img-responsive" alt="Image">
											<div class="box-content">
												<h3><?php echo get_the_title($page);?></h3>
												<p><?php echo $description_page_show;?></p>
												<a href="<?php echo get_permalink($page);?>">read more</a>
											</div>	
										</div>
									<?php
								}
							}
					}

			?>
		</div><!-- end row-->
	</div><!--end content-->
</div><!--end our-services-->
<div class="done-project">
	<div class="container content">
		<h2 class="title-done-project">we have done</h2>
		<div class="icon-done-pr">
			<span></span>
		</div>
		<p>Pellentesque habitant morbi tristiquesenectus et netus et malesuada fames ac turpis egestas</p>
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 item-done-pr">
				<?php 
					$number = get_field('project_done',17);
					if($number){
					echo '<h3>'.$number.'</h3>';
					}
					echo '<p>'.get_the_title( 17 ).'</p>';
				?>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 item-done-pr">
				<?php 
					$number = get_field('project_done',80);
					if($number){
					echo '<h3>'.$number.'</h3>';
					}
					echo '<p>'.get_the_title( 80 ).'</p>';
				?>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 item-done-pr">
				<?php 
					$number = get_field('project_done',74);
					if($number){
					echo '<h3>'.$number.'</h3>';
					}
					echo '<p>'.get_the_title( 74 ).'</p>';
				?>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 item-done-pr">
				<?php 
					$number = get_field('project_done',53);
					if($number){
					echo '<h3>'.$number.'</h3>';
					}
					echo '<p>'.get_the_title( 53 ).'</p>';
				?>
			</div>
		</div><!--end row-->
	</div><!--end content-->
</div><!--end done-project-->
<div class="features">
	<div class="container content">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-archive">
			<img src="<?php bloginfo( 'template_url' ); ?>/images/features-icon.png" class="img-responsive" alt="Image">
			<h2 class="title-archive">features</h2>
			<p>Pellentesque habitant morbi tristiquesenectus et netus et malesuada fames ac turpis egestas</p>
		</div>
		<div class="box-item-features">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 item-features">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/team-icon-1.png" class="img-responsive" alt="Image">
				<div class="content-item-features">
					<h3><a href="javascript:void(0)">join us</a></h3>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
				</div>
				<div class="hover-item-features"><div class="boder-features"></div></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 item-features">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/team-icon-2.png" class="img-responsive" alt="Image">
				<div class="content-item-features">
					<h3><a href="javascript:void(0)">promotion</a></h3>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
				</div>
				<div class="hover-item-features"><div class="boder-features"></div></div>
			</div>
		</div>	<!--end box-item-features-->
	</div><!--end content-->
</div><!--end features-->
<div class="adv">
	<?php if( have_rows('block_ads','options') ):
		$rows = get_field('block_ads','options' ); // get all the rows
		$first_row = $rows[0]; // get the first row
		$strong_text = $first_row['big_slogan']; // get the sub field value 
		$normal_text = $first_row['big_slogan_normal_text'];
		$small_text = $first_row['small_slogan'];
		$page_id = $first_row['button_link'];
		?>
		<div class="container content">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 item-adv">
			 	<h2 class="adv-text"><strong><?php echo $strong_text;?></strong><?php echo $normal_text;?></h2>
			 	<p><?php echo $small_text;?></p>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 item-adv">
				<a href="<?php echo get_permalink($page_id[0]);?>"><?php echo get_the_title($page_id[0]);?></a>
			</div>
		</div>

	<?php endif; ?>
		
</div><!--end content-->
<div class="blog">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-archive">
		<img src="<?php bloginfo( 'template_url' ); ?>/images/icon-blog.png" class="img-responsive" alt="Image">
		<h2 class="title-archive"><?php echo get_cat_name(6);?></h2>
		<p>Pellentesque habitant morbi tristiquesenectus et netus et malesuada fames ac turpis egestas</p>
	</div>
	<div class="box-blog">
	<?php 
	$args = array(
		'posts_per_page'   => 4,
		'category' => 6
		);
		$myposts = get_posts( $args );
		$i = 1;
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
			$cls = ($i+1)%2 == 0 ? 'up': 'down';
			$title = get_the_title();
		?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 item-blog">
			<?php if(($i+1)%2 ==0 ){
				?>
					<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="Image">
				<?php
			}?>
			
			<div class="info-item-blog">
				<h3><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth($title, 0, 46, '...'); ?></a></h3>
				<p><?php echo get_the_date();?></p>
				<div class="blog-arrow <?php echo $cls;?>"></div>
			</div>
			<?php if(($i)%2 == 0){
				?>
					<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="Image">
				<?php
			}?>
		</div>
	<?php $i++; endforeach; 
	?>
		
	</div><!--end box-blog-->
</div><!-- end blog-->
<div class="clearfix"></div>
<div class="about-us">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-archive">
		<img src="<?php bloginfo( 'template_url' ); ?>/images/icon-about.png" class="img-responsive" alt="Image">
		<h2 class="title-archive">testimonials</h2>
		<p>Pellentesque habitant morbi tristiquesenectus et netus et malesuada fames ac turpis egestas</p>
	</div>
	<?php if( have_rows('custom_slideshow_author','options') ):?>
	
	<div id="myCarousel-about" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  	<div class="carousel-inner">
	<?php $i=0; while( have_rows('custom_slideshow_author','options') ): the_row(); 
		$cls = $i == 0? 'active': '';
		// vars
		$image = get_sub_field('image_author');
		$content = get_sub_field('info_author');
		$name = get_sub_field('name_author');
		?>
		<div class="item <?php echo $cls; ?>">
		      	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item-carousel-about">
		    		<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt'] ?>">
		    	</div>
		    	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 item-carousel-about">
		    		<div class="carousel-caption">
				        <h3><?php echo $name; ?></h3>
				        <p><?php echo $content; ?></p>
		      		</div>
		    	</div>
		    </div>
		
	<?php $i++; endwhile; ?>
		</div>
		  <!-- Left and right controls -->
	  	<a class="left myCarousel-about-control" href="#myCarousel-about" data-slide="prev">
		    <img src="<?php bloginfo( 'template_url' ); ?>/images/icon-prev.png" class="img-responsive" alt="Image">
		    <span class="sr-only">Previous</span>
	  	</a>
	  	<a class="right myCarousel-about-control" href="#myCarousel-about" data-slide="next">
	    	<img src="<?php bloginfo( 'template_url' ); ?>/images/icon-next.png" class="img-responsive" alt="Image">
	    	<span class="sr-only">Next</span>
	  	</a>
	</div><!-- end mycarousel-->
<?php endif;?>
</div><!-- end about-us-->

<?php
//get_sidebar();
get_footer();
