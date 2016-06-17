<?php
/**
 * justresidential.com.au functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package justresidential.com.au
 */

if ( ! function_exists( 'justresidential_com_au_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function justresidential_com_au_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on justresidential.com.au, use a find and replace
	 * to change 'justresidential-com-au' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'justresidential-com-au', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'justresidential-com-au' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'justresidential-com-au' )
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * add post type
	 */
	add_theme_support( 'post-formats',
    array(
       'image',
       'video',
       'gallery',
       'quote',
       'link'
    )
 	);
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'justresidential_com_au_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'justresidential_com_au_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function justresidential_com_au_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'justresidential_com_au_content_width', 640 );
}
add_action( 'after_setup_theme', 'justresidential_com_au_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function justresidential_com_au_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'justresidential-com-au' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'justresidential-com-au' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'justresidential_com_au_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function justresidential_com_au_scripts() {
	wp_enqueue_style( 'justresidential-com-au-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'justresidential-com-au-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'justresidential-com-au-jquery-1.12.4', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true );

	wp_enqueue_script( 'justresidential-com-au-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true );

	wp_enqueue_script( 'justresidential-com-au-custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );

	//wp_enqueue_script( 'justresidential-com-au-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'justresidential_com_au_scripts' );

/**
 * Add a parent CSS class for nav menu items.
 *
 * @param array  $items The menu items, sorted by each menu item's menu order.
 * @return array (maybe) modified parent CSS class.
 */
function wpdocs_add_menu_parent_class( $items ) {
    $parents = array();
 
    // Collect menu items with parents.
    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }
 
    // Add class.
    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'dropdown';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'wpdocs_add_menu_parent_class' );
/**
 * Change sub-menu CSS class .
 */
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}
/**
 * Change excerpt post.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'justresidential-com-au' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Theme comment
 */
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?> style="">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    	<div class="avatar-user">
        	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    	</div>
    	<div class="cmt-text">
	        <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	    	<?php comment_text(); ?>
	    	<div class="reply">
		        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		    </div>
    	</div>
	    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
	        <?php
	        /* translators: 1: date, 2: time */
	        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
	        ?>
	    </div>
	 </div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','justresidential-com-au' ); ?></em>
          <br />
    <?php endif; ?>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }
/**
* Custom comment fields 
*/
function custom_comment_form_fields($fields){
	unset($fields['url']);
    $fields['author'] = '<div class="comment-form-author">' . '<input id="author" placeholder="Your Name" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><span class="error">This field is required</span></div>';
    $fields['email'] = '<div class="comment-form-email">' . '<input id="email" placeholder="Your email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' /><span class="error">A valid email address is required</span></div>';
    return $fields;
}
add_filter('comment_form_default_fields','custom_comment_form_fields');    

/**
* Custom metabox
*/
/* 
Define the custom box */
add_action( 'add_meta_boxes', 'page_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'page_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function page_add_custom_box() {
    add_meta_box( 
        'page-custom-box',
        'Page Template',
        'page_inner_custom_box',
        'page',
        'side',
        'high'
    );
}

/* Prints the box content */
function page_inner_custom_box($page)
{
    // Use nonce for verification
    wp_nonce_field( 'save_field_nonce', 'info_noncename' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $page->ID, 'page_box_template', true);
    if( !$saved )
        $saved = 'default';

    $fields = array(
        'faq'       => __('FAQ', 'wpse'),
        'tenantcheck'     => __('Tenant Check', 'wpse'),
        'contact'     => __('Contact', 'wpse'),
        'promotion'     => __('Promotion(This page had gmap)', 'wpse'),
        'default'   => __('Default', 'wpse'),
    );

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="page_box_template" value="%1$s" id="page_box_template[%1$s]" %3$s />'.
            '<label for="page_box_template[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
}
/* When the post is saved, saves our custom data */
function page_save_postdata( $page_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['info_noncename'], 'save_field_nonce' ) )
          return;

      if ( isset($_POST['page_box_template']) && $_POST['page_box_template'] != "" ){
            update_post_meta( $page_id, 'page_box_template', $_POST['page_box_template'] );
      } 
}
/**
*	Get content page 
*/
if(!function_exists('get_content_page')){
	function get_content_page($id){
		$saved = get_post_meta( $id, 'page_box_template', true);
		switch ($saved) {
			case 'faq':
				
				$page_array = array('child_of' => $ID, 'post_type '=>'page');
				$allpage = get_pages( $page_array );
				foreach ($allpage as $page) {
					echo '<a class="btn-join"href="'.get_permalink($page->ID).'">'.$page->post_title.'</a>';
				}
				break;
			case'tenantcheck':
				?>
					<div class="adv-page">
						<h3 class="slogan-adv">Check before you rent! <strong>ONLY $19.95</strong> per candidate</h3>
						<a href="#">click here to begin</a>
					</div>
				<?php
			break;
			default:
				# code...
				break;
		}
	}
}
/*
* custom post type
*/
function question_custom_post_type()
{
 
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Questions', //Tên post type dạng số nhiều
        'singular_name' => 'Question' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type đăng câu hỏi', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, false thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => '', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('question', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'question_custom_post_type');
/*
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
