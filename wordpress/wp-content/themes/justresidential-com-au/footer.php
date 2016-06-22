<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justresidential.com.au
 */

?>

<div class="clearfix"></div>
	<div class="footer">
		<div class="container content">
			<div class="row">
				<?php
					 if( have_rows('social_footer','options') || have_rows('footer_contact','options')):
						$rows = get_field('social_footer','options' ); // get all the rows
						$first_row = $rows[0]; // get the first row
						$facebook_url = $first_row['facebook_url'] ? $first_row['facebook_url'] : 'javascript:void(0)' ; 
						$twitter_url = $first_row['twitter_url'] ? $first_row['twitter_url'] : 'javascript:void(0)' ; 
						$linkedin_url = $first_row['linkedin_url'] ? $first_row['linkedin_url'] : 'javascript:void(0)' ; 
						$google_plus_url = $first_row['google_plus_url'] ? $first_row['google_plus_url'] : 'javascript:void(0)' ;

						$rows2 = get_field('footer_contact','options' ); // get all the rows
						$first_row2 = $rows2[0]; // get the first row
						$phone_number = $first_row2['phone_number'] ? $first_row2['phone_number'] : '<p>0404 998744</p><p>0452 548 744<p>' ; 
						$footer_email = $first_row2['footer_email'] ? $first_row2['footer_email'] : 'manager@jrpa.com.au' ; 
						$footer_address = $first_row2['footer_address'] ? $first_row2['footer_address'] : 'P.O. Box 375 Everton Park Qld 4053' ; 
						$copy_right = $first_row2['copy_right'] ? $first_row2['copy_right'] : '© Copyright Just Residential Property Agents 2016' ; 
						endif;?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-social">
					<h2><strong>just</strong>residential</h2>
					<ul class="social-icon">
						<li><a href="<?php echo $facebook_url;?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $twitter_url;?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo $linkedin_url;?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="<?php echo $google_plus_url;?>"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<div class="clearfix"></div>
					<p class="copyright"><?php echo $copy_right;?></p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-info">
					<div class="phone-number">
						<div class="phone">
							<?php echo $phone_number;?>
						</div>	
					</div>
					<p class="email"><?php echo $footer_email;?></p>
					<p class="address"><?php echo $footer_address;?></p>
					<?php    /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'theme_location' => 'footer_menu',
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => 'nav-footer',
							'menu_id' => '',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'depth' => 1,
						);
					
						wp_nav_menu( $args );?>
				</div>
			</div>
		</div>
	</div>
</div><!-- end wapper-->
<?php wp_footer(); ?>

</body>
</html>
