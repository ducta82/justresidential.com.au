<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package justresidential.com.au
 */

get_header(); ?>
</div><!-- end header-->
	<div class="blog-page">
		<div class="container content">
			<div class="head-page">
				<h2>Pellentesque habitant morbi tristique</h2>
				<div class="border-page"></div>	
			</div>
			<section class="col-xs-12 col-sm-9 col-md-9 col-lg-9 box-posts-page">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</section>

<?php
get_sidebar();
?>
		</div><!--end container content-->
	</div><!--end blog-page-->
<?php
get_footer();
