<?php

/* ==========================================================================
    Required
    - DO NOT REMOVE - required to setup the script enqueuing
  ========================================================================== */
require_once('functions/required.php');
require_once('functions/custom/third-party.php');
require_once('functions/custom/post-types.php');
require_once('functions/custom/thumbnails.php');


remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


// sp customs
function custom_dequeue()
{
  // remove crap from loading
  wp_dequeue_style('contact-form-7');

  wp_dequeue_style('wp-block-library');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('wp_enqueue_scripts', 'custom_dequeue', 9999);
add_action('wp_head', 'custom_dequeue', 9999);



/*   Page Template move to Sub Directory */
// defining the sub-directory so that it can be easily accessed from elsewhere as well.
// First, this will disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
# https://keithgreer.uk/wordpress-code-completely-disable-comments-using-functions-php

add_action('admin_init', 'df_disable_comments_post_types_support');

// Then close any comments open comments on the front-end just in case
function df_disable_comments_status()
{
  return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Finally, hide any existing comments that are on the site. 
function df_disable_comments_hide_existing_comments($comments)
{
  $comments = array();
  return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);


add_action('admin_init', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
  remove_menu_page('edit-comments.php');
  remove_menu_page('edit.php');
  remove_menu_page('themes.php');
}
