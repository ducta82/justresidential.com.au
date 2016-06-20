<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justresidential.com.au
 */

$ID = get_the_id();
$saved = get_post_meta( $ID, 'page_box_template', true);
/*$my_wp_query = new WP_Query();
$all_wp_pages = $my_wp_query->query(array('post_type' => 'page','orderby'=>'menu_order'));
$allpage = get_page_children($ID,$all_wp_pages);*/
switch ($saved) {
	case 'faq':
		
		$page_array = array('child_of' => $ID, 'post_type '=>'page');
		$allpage = get_pages( $page_array );
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-content-page">
					<header class="entry-header">
						<?php echo get_field( "title-page" ); ?>
					</header><!-- .entry-header -->
					<div class="border-page"></div>
		<?php
		$args = array( 'post_type' => 'question', 'posts_per_page' => 10 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

				echo 	'<div class="entry-content content-page-faq">
						<div class="wap-content-page faq-content item-post">
							<header>';
								?><h3 class="tittle-post"><?php the_title(); ?></h3><?php
							echo'</header>';
							?>
							<div class="content-post">
								<?php the_content();?>
							</div>
						</div>
					</div>
		<?php endwhile ?>
				</div><!-- box-content-page -->
			</article><!-- #post-## -->
		<?php
		break;
	case'tenantcheck':
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
				</div><!-- box-content-page -->
				<?php
				if(has_post_thumbnail()){
					echo '<div class="thumbnail-page">';
					the_post_thumbnail();
					echo'</div>';
				} ?>
				</article><!-- #post-## -->
		<?php
	break;
	case'promotion':
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-content-page">
					<header class="entry-header">
						<?php echo get_field( "title-page" ); ?>
					</header><!-- .entry-header -->
					<div class="border-page"></div>
					<div class="entry-content content-page">
						<div class="wap-content-page">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justresidential-com-au' ),
								'after'  => '</div>',
							) );
						?>
						</div>
						<?php
						$text = get_field( "text_on_button_send_email");
						$email = get_field( "add_email_address");
						$url = get_field( "url_page_link_button");
						if($url){
								echo '<a class="btn-join" href="'.$url.' ">'.$text.'</a>';
							}
						else{
							if($email){
								$text_show = get_field( "text_on_button_send_email") == '' ? $email : $text;
								echo '<a class="btn-join" href="mailto:'.get_field( "add_email_address").'">'.$text_show.'</a>';
							}
						}
						?>
					</div><!-- box-content-page -->
					<div class="thumbnail-page" >
						<div id="map_canvas" style="height: 303px;"></div>	
						<?php $map = get_field('add_gmap_in_page'); ?>

						<script type="text/javascript"> 

						  function initialize() {
						        var myLatlng = new google.maps.LatLng(<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>);
						        var myOptions = {
						          zoom: 13,
						          center: myLatlng,
						          mapTypeId: google.maps.MapTypeId.ROADMAP
						        }
						        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
						      }

						      function loadScript() {
						        var script = document.createElement("script");
						        script.type = "text/javascript";
						        script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
						        document.body.appendChild(script);
						      }

						      window.onload = loadScript;
						    </script>
					</div>
				</article><!-- #post-## -->
		<?php
	break;
	case'contact':
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-content-page">
					<header class="entry-header">
						<?php echo get_field( "title-page" ); ?>
					</header><!-- .entry-header -->
					<div class="border-page"></div>
					<div class="entry-content">
						<div class="info-contact">
							<div class="block-contact">
								<span>front desk</span>
								<p class="phone">(07) 3162 1622</p>
								<p class="email">frontdesk@jrpa.com.au</p>
								<span>Sale</span>
								<p class="phone">0404 998 744 000</p>
								<p class="email">sales@jrpa.com.au</p>
								<span>Property Management</span>
								<p class="phone">0452 548 744</p>
								<p class="email">rentals@jrpa.com.au</p>
								<span>Post</span>
								<p class="address">M:P.O. Box 375 Everton Park, Qld 4053</p>
							</div>
						</div>
						<div class="form-contact">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justresidential-com-au' ),
								'after'  => '</div>',
							) );
						?>
						</div>
				</div><!-- box-content-page -->
				</article><!-- #post-## -->
		<?php
	break;
	default:
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
					<?php
						$text = get_field( "text_on_button_send_email");
						$email = get_field( "add_email_address");
						$url = get_field( "url_page_link_button");
					if($url){
							echo '<a class="btn-join" href="'.$url.' ">'.$text.'</a>';
						}
					else{
						if($email){
							$text_show = get_field( "text_on_button_send_email") == '' ? $email : $text;
							echo '<a class="btn-join" href="mailto:'.get_field( "add_email_address").'">'.$text_show.'</a>';
						}
					}
					?>
					
				</div><!-- box-content-page -->
				<?php
				if(has_post_thumbnail()){
					echo '<div class="thumbnail-page">';
					the_post_thumbnail();
					echo'</div>';
				} ?>
			</article><!-- #post-## -->
			<?php
		break;
}

