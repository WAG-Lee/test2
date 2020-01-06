<?php

// Menus ______________________________________________________________________________________________________________________________________________________

function template_theme_setup() {
  add_theme_support('menus');

  register_nav_menu('primary', 'Primary Menu');

}
add_action('init', 'template_theme_setup');



// Featured Images ______________________________________________________________________________________________________________________________________________________

add_theme_support( 'post-thumbnails' );



// Options Page ______________________________________________________________________________________________________________________________________________________

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}



// Custom Post Type ______________________________________________________________________________________________________________________________________________________

add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it topics for your posts
function create_topics_hierarchical_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

 $custom = array(
   'name' => _x( 'Custom Categories', 'taxonomy general name' ),
   'singular_name' => _x( 'Custom Category', 'taxonomy singular name' ),
   'search_items' =>  __( 'Search Custom Categories' ),
   'all_items' => __( 'All Custom Categories' ),
   'parent_item' => __( 'Parent Category' ),
   'parent_item_colon' => __( 'Parent Category:' ),
   'edit_item' => __( 'Edit Custom Category' ),
   'update_item' => __( 'Update Custom Category' ),
   'add_new_item' => __( 'Add New Custom Category' ),
   'new_item_name' => __( 'New Custom Category Name' ),
   'menu_name' => __( 'Categories' ),
 );

 register_taxonomy('custom-categories',array('custom'), array(
   'hierarchical' => true,
   'labels' => $custom,
   'show_ui' => true,
   'show_admin_column' => true,
   'query_var' => true,
   'rewrite' => array( 'slug' => 'custom-categories' ),
 ));

}

function create_posttype() {

  register_post_type( 'Custom',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Custom' ),
              'singular_name' => __( 'Custom' ),
              'add_new' => __('Add Custom'),
              'add_new_item' => __( 'Add a New Custom' ),
              'edit_item' => __( 'Edit Custom' ),
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'custom'),
          'menu_icon'  => 'dashicons-admin-customizer',
          'supports' => array('title', 'thumbnail', 'tags'),
          'taxonomies' => array('post_tag'),
      )
  );

  register_post_type( 'Testimonials',
  // CPT Options
      array(
          'labels' => array(
              'name' => __( 'Testimonials' ),
              'singular_name' => __( 'Testimonial' ),
              'add_new_item' => __( 'Add a New Testimonial' ),
              'edit_item' => __( 'Edit Testimonial' ),
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'testimonials'),
          'menu_icon'  => 'dashicons-format-quote',
          'supports'   => array('title'),
      )
  );

}
   // Hooking up our function to theme setup
   add_action( 'init', 'create_posttype' );



// Custom post type title placeholder _________________________________________________________________________________________________________________________________________

add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
 function my_title_place_holder($title , $post){
   if( $post->post_type == 'testimonials' ){
       $my_title = "Enter Name Here";
       return $my_title;
   }
   if( $post->post_type == 'team' ){
       $my_title = "Enter Member Name Here";
       return $my_title;
   }
   return $title;
 }



 // Add columns to testimonials post list ___________________________________________________________________________________________________________________________________

 function add_acf_columns( $columns ) {
   return array_merge ( $columns, array (
     'quote_text' => __ ( 'Testimonial' ),
   ) );
 }
 add_filter ( 'manage_testimonials_posts_columns', 'add_acf_columns' );



// Limit word count ______________________________________________________________________________________________________________________________________________________

 function tExcerpt($data, $limit) {
    $arr = explode(" ", $data);
    $new_arr = array_slice($arr, 0, $limit);
    return implode(" ", $new_arr);
}

 function testimonials_custom_column( $column, $post_id ) {
   switch ( $column ) {
     case 'quote_text':
       $quote =  get_post_meta ( $post_id, 'quote_text', true );
        if (str_word_count($quote) > 30) {
          echo tExcerpt($quote, 30). '...';
        } else {
          echo $quote;
        }
       break;
   }
 }
 add_action ( 'manage_testimonials_posts_custom_column', 'testimonials_custom_column', 10, 2 );



// Remove comments from admin ______________________________________________________________________________________________________________________________________________________

add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
 remove_menu_page( 'edit-comments.php' );
}



 // Add automatic image sizes ______________________________________________________________________________________________________________________________________________________

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'extra_large', 1250, false ); //(scaled)
}


 ?>
