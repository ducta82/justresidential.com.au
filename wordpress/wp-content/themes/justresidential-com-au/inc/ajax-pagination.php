<?php
 add_action( 'wp_enqueue_scripts', 'ajax_pagination_scripts' );
 function ajax_pagination_scripts() {
        wp_enqueue_script( 'ajax-pagination-script', get_template_directory_uri() . '/js/ajax-pagination.js', array(), '1.0', true );
        global $wp_query;
		wp_localize_script( 'ajax-pagination-script', 'ajax_object', array(
		        'ajax_url' => admin_url( 'admin-ajax.php' ),
		        'cat' => json_encode( $wp_query->queried_object_id )
		));
 }

add_action( 'wp_ajax_nopriv_ajax_pagination_data', 'set_ajax_pagination_data' );
add_action( 'wp_ajax_ajax_pagination_data', 'set_ajax_pagination_data' );
function set_ajax_pagination_data() {
    $cat = isset($_POST['cat']) ? stripslashes($_POST['cat']) : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $search = isset($_POST['s']) ? $_POST['s'] : '';
    $arg = array(
    	'post_type' => 'post',
    	'posts_per_page'=> get_option('posts_per_page',2),
    	'post_status' => 'publish',
    	'paged' => $page
    	);
    if($search != ''){
    	$output = array('success'=>true, 'html'=>'','url'=> $search . '&page/'.$page );
    	$arg['s'] = $search;
    }
    else{
    	$output = array('success'=>true, 'html'=>'','url'=> get_category_link($cat) . 'page/'.$page );
    	$arg['cat'] = $cat; 
    }
    $posts = new WP_Query($arg);
    $output['data'] = $posts;
    if( ! $posts->have_posts() ) { 
        $output['html'] = load_template_part( 'template-parts/content', 'none' );
    } else {
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            $output['html'] 	= $output['html'] . load_template_part( 'template-parts/content', get_post_format() );
        }
    }
    $output['paging'] = vtd_paging_nav($posts);
 	echo json_encode($output);
    die();      
 
}
if(!function_exists('load_template_part')){
	function load_template_part($template_name, $part_name=null){
		ob_start();
	    get_template_part($template_name, $part_name);
	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
}