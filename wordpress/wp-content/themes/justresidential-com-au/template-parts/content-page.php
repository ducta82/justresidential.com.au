<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box-content-page">
	<header class="entry-header">
		<?php echo get_field( "title-page" ); ?>
		</header><!-- .entry-header -->
		<div class="border-page"></div>
	<?php
		if(has_post_thumbnail()){
			echo '<div class="entry-content content-page">';
			}
		else{
			echo '<div class="entry-content">';
		}	
	?>	
		<div class="wap-content-page">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justresidential-com-au' ),
				'after'  => '</div>',
			) );
		?>
		</div>
		<a class="btn-join"href="javascript:void(0)">join the team</a>
	</div><!-- .entry-content -->
	<?php
	if(has_post_thumbnail()){
		echo '<div class="thumbnail-page">';
		the_post_thumbnail();
		echo'</div>';
	} 
	if ( get_edit_post_link() ) : ?>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'justresidential-com-au' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
