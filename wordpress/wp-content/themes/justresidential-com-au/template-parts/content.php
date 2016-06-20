<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

if ( is_single() ) {?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<header>
		<?php the_title( '<h3 class="tittle-post">', '</h3>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php justresidential_com_au_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
	</header>
	<div class="content-post">
		<?php the_content( 'Read more ...', $strip_teaser );?>
	</div>
	</article>	
	<footer class="entry-footer">
	<?php justresidential_com_au_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php
} 
else {
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'item-post' ); ?>>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 post-thumbnail">
			<?php
				if ( has_post_thumbnail() ) { the_post_thumbnail(); } else{echo'<img src="#" class="img-responsive" alt="Image">';} 
			?>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 box-content-post">
			<header>
				<?php the_title( '<h3 class="tittle-post"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			</header>
			<div class="content-post">
				<?php 
				$y_des = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
				if ($y_des){
					echo $y_des;
				}
				else
				{
				$my_excerpt = get_the_excerpt();
					if ( '' != $my_excerpt ) {
						echo mb_strimwidth($my_excerpt, 0, 277, '...').'<a class="read-more" href="'. esc_url( get_permalink() ) .'">Read more</a>';
					}
					else{
					echo '<a href="'.esc_url( get_permalink() ).'">'.__("Read more...","justresidential-com-au").'</a>';
					}
				}?>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php justresidential_com_au_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</div>
	</article>	
	<?php
}
?>

