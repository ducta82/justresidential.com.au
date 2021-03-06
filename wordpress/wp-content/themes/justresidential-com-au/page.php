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
		<div class="g-recaptcha" data-sitekey="6LfYviITAAAAADKBHbzdW9c7J1ZdkfhhaNl0RsFA"></div>
	</div>
</div>
<?php
	$ID = get_the_id();
	$saved = get_post_meta( $ID, 'page_box_template', true);
	if($saved == 'tenantcheck'){
		$text = get_field( "text_on_button_send_email");
		$email = get_field( "add_email_address");
		$url = get_field( "url_page_link_button");
		if($url){
			?>
				<div class="adv-page">
				<div class="container content">
					<div class="box-content-page">
						<h3 class="slogan-adv">Check before you rent! <strong>ONLY $19.95</strong> per candidate</h3>
						<a href="<?php echo $url;?>"><?php echo $text;?></a>
					</div>
				</div>
			</div>
			<?php
		}else{
			if($email){
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
				echo '<a class="btn-join" href="mailto:'.get_field( "add_email_address").'">'.$text_show.'</a>';
			}
		}
	} 
//get_sidebar();
get_footer();
