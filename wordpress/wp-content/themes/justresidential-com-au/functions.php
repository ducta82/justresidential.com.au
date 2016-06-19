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
/*
* menu icon
*/

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
 
    $label = array(
        'name' => 'Questions', 
        'singular_name' => 'Question' 
    );
 
    $args = array(
        'labels' => $label, 
        'description' => 'Post type đăng câu hỏi', 
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail'
        ), 
        'taxonomies' => array( 'category', 'post_tag' ),
        'hierarchical' => false, 
        'public' => true, 
        'show_ui' => true, 
        'show_in_menu' => true, 
        'show_in_nav_menus' => true, 
        'show_in_admin_bar' => true,
        'menu_position' => 5, 
        'can_export' => true, 
        'has_archive' => true, 
        'exclude_from_search' => false, 
        'publicly_queryable' => true, 
        'capability_type' => 'post' ,//
        'menu_icon'=>'dashicons-format-aside'
    );
 
    register_post_type('question', $args);
 
}
add_action('init', 'question_custom_post_type');
/*
 *  Duplicate Posts and Pages
 */
/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }
 
    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );
 
    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
 
    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {
 
        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
 
        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post( $args );
 
        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
 
        /*
         * duplicate all post meta just in two SQL queries
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
 
 
        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

/*
* pagination
*/


if ( ! function_exists( 'vtd_paging_nav' ) ) :
function vtd_paging_nav($custom_query=null) {
    global $wp_query;
    $custom_query = $custom_query ? $custom_query : $wp_query;
    if ( $custom_query->max_num_pages < 2 ){
        return;}
    $url = get_category_link($custom_query->queried_object->term_id);
    $pages = $custom_query->max_num_pages;
    $current = $custom_query->query_vars['paged'] ? $custom_query->query_vars['paged'] : 1;
    $max_page_show = 5;
    $max_current = (($current+2)<$pages) ? ($current+2) : $pages;
    $min_current = ($current-2)<=0 ? 1 : ($current-2);
    
    $max_current = ($max_current<$max_page_show && $max_page_show<=$pages) ? $max_page_show : $max_current;
    $min_current = ($min_current>($pages-$max_page_show) && ($pages-$max_page_show)>=0) ? ($pages-$max_page_show+1) : $min_current;
    ob_start();
    ?>
        <ul class="paging">
        <?php if ( $current>1 ) : ?>
        <li><a class="prev page-numbers" href="<?php echo $url.'page/'.($current-1);?>" data="<?php echo ($current-1); ?>" title="Previous page">back</a></li>
        <?php endif;?>
        <?php for($i=$min_current;$i<=$max_current;$i++){
            $uri = $i==1 ? $url : $url.'page/'.$i;
            $cls='';
            if($current==$i){
                $uri = 'javascript:void(0)';
                $cls = ' active';
            }?>
            <li><a class="page-number<?php echo $cls;?>" href="<?php echo $uri;?>" data="<?php echo $i;?>" title="<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php }?>
        <?php if ( $current < $max_current && $current>0 ) : ?>
        <li><a class="page-numbers next" href="<?php echo $url.'page/'.($current+1);?>" data="<?php echo ($current+1); ?>" title="Next page">next</a></li>
        <?php endif; ?>
        </ul>
    <?php
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}
endif;

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
* get excerpt
*/
function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}

/**
* add images into menu
*/
/**
* add box meta to nav-menu screen
* box meta upload image and insert to menu with link
*/


add_action('admin_init', 'admin_init_custom');
function admin_init_custom(){
    add_meta_box('custom_menu', 'Custom menu', 'your_custom_menu_item', 'nav-menus', 'side', 'low');
    wp_enqueue_media();
}
function your_custom_menu_item (  ) {
    ?>
    <p id="menu-item-url-wrap" class="wp-clearfix">
        <label class="howto" for="custom-menu-item-url-1">URL</label>
        <input id="custom-menu-item-url-1" name="menu-item[-95][menu-item-url]" type="text" class="code menu-item-textbox" value="http://">
    </p>
    <p class="button-controls wp-clearfix">
        <div id="menu-image-icon"></div>
        <span class="add-to-menu">
            <input type="button" class="button-secondary" value="Chọn ảnh" id="btn-choose-img">
            <span class="spinner"></span>
        </span>
    </p>
    <p class="button-controls wp-clearfix">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="Thêm vào menu" name="add-taxonomy-menu-item" id="submit-choose-menu-image">
            <span class="spinner"></span>
        </span>
    </p>
    <script type="text/javascript">
        jQuery('#btn-choose-img').click(function(){
            var upload = wp.media({
                title:'Choose Image', //Title for Media Box
                multiple:false,
                library: { type: 'image' }
            }).on('select', function(){
                var select = upload.state().get('selection');
                var attach = select.toJSON();
                console.log(attach);
                jQuery('#menu-image-icon').html('<img src="'+ attach[0].url +'" style="width:20px;height:20px;">');
            }).open();
        });
        jQuery('#submit-choose-menu-image').click(function(e){
            e.preventDefault();
            jQuery.ajax({
                url: ajaxurl,
                data: {
                    action : 'add-menu-item',
                    menu : jQuery('#nav-menu-meta-object-id').val(),
                    'menu-settings-column-nonce': jQuery('#menu-settings-column-nonce').val(),
                    'menu-item[-1][menu-item-type]' : 'custom',
                    'menu-item[-1][menu-item-url]' : jQuery('#custom-menu-item-url-1').val(),
                    'menu-item[-1][menu-item-title]' : jQuery('#menu-image-icon').html()
                },
                type: 'post',
                success: function(result){
                    jQuery('#menu-to-edit').append(result);
                }
            });
            return false;
        });
    </script>
<?php }
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

/**
 * Load ajax pagination.
 */
require get_template_directory() . '/inc/ajax-pagination.php';
