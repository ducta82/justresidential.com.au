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
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-social">
					<h2><strong>just</strong>residential</h2>
					<ul class="social-icon">
						<li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<div class="clearfix"></div>
					<p class="copyright">© Copyright Just Residential Property Agents 2016</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 footer-info">
					<div class="phone-number">
						<div class="phone">
							<p>0404 998744</p>
							<p>0452 548 744<p>
						</div>	
					</div>
					<p class="email">manager@jrpa.com.au</p>
					<p class="address">P.O. Box 375 Everton Park Qld 4053</p>
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
