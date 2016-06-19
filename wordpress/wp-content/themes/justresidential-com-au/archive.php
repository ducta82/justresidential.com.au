<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

get_header(); ?>

<div class="page">
	<div class="container content">
		<div class="head-page">
			<?php the_archive_description( '<h2>', '</h2>' ); ?>
			<div class="border-page"></div>	
		</div>
		<section class="col-xs-12 col-sm-9 col-md-9 col-lg-9 box-posts-page">
			<div id="list-post">
		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;?>
			</div>
			<div id="box-paging">
				<?php echo vtd_paging_nav(); ?>
			</div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</section>

<?php
get_sidebar();
?>
		</div><!--end container content-->
	</div><!--end blog-page-->
<?php
get_footer();
