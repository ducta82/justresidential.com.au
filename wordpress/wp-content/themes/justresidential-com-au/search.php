<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package justresidential.com.au
 */

get_header(); ?>

<div class="page">
	<div class="container content">
		<?php
		if ( have_posts() ) : ?>

			<header class="head-page">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'justresidential-com-au' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<div class="border-page"></div>	
			</header><!-- .page-header -->
			<section class="col-xs-12 col-sm-9 col-md-9 col-lg-9 box-posts-page">
				<div id="list-post">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
			</div>
			<?php
			echo vtd_paging_nav();

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
