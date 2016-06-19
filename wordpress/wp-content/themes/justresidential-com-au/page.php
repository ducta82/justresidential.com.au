<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

get_header(); ?>
<div class="page">
	<div class="container content">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</div>
</div>
<?php
	$ID = get_the_id();
	$saved = get_post_meta( $ID, 'page_box_template', true);
	if($saved == 'tenantcheck'){

		if(get_field( "add_email_address")){
			$text = get_field( "text_on_button_send_email");
			$email = get_field( "add_email_address");
			$text_show = get_field( "text_on_button_send_email") == '' ? $email : $text;
			?>
			<div class="adv-page">
				<div class="container content">
					<div class="box-content-page">
						<h3 class="slogan-adv">Check before you rent! <strong>ONLY $19.95</strong> per candidate</h3>
						<a href="mailto:<?php echo get_field( "add_email_address");?>"><?php echo $text_show;?></a>
					</div>
				</div>
			</div>
			<?php 
			}
			if($allpage[0]){
				echo '<a class="btn-join" href="'.get_permalink($allpage[0]->ID).' ">'.$allpage[0]->post_title.'</a>';
			}} 
//get_sidebar();
get_footer();
