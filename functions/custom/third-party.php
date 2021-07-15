<?php
function enqueue_our_required_stylesheets()
{
	wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');
// remove cpt slug from permalinks
function remove_cpt_slug($post_link, $post, $leavename)
{
	if ($post->post_type != 'process') {
		return $post_link;
	} else {
		$post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
		return $post_link;
	}
}
add_filter('post_type_link', 'remove_cpt_slug', 10, 3);
// instruct wordpress on how to find posts from the new permalinks
function parse_request_remove_cpt_slug($query_vars)
{
	// return if admin dashboard 
	if (is_admin()) {
		return $query_vars;
	}
	// return if pretty permalink isn't enabled
	if (!get_option('permalink_structure')) {
		return $query_vars;
	}
	$cpt = 'process';
	// store post slug value to a variable
	if (isset($query_vars['pagename'])) {
		$slug = $query_vars['pagename'];
	} elseif (isset($query_vars['name'])) {
		$slug = $query_vars['name'];
	} else {
		global $wp;
		$path = $wp->request;
		// use url path as slug
		if ($path && strpos($path, '/') === false) {
			$slug = $path;
		} else {
			$slug = false;
		}
	}
	if ($slug) {
		$post_match = get_page_by_path($slug, 'OBJECT', $cpt);
		if (!is_admin() && $post_match) {
			// remove any 404 not found error element from the query_vars array because a post match already exists in cpt
			if (isset($query_vars['error']) && $query_vars['error'] == 404) {
				unset($query_vars['error']);
			}
			// remove unnecessary elements from the original query_vars array
			unset($query_vars['pagename']);
			// add necessary elements in the the query_vars array
			$query_vars['post_type'] = $cpt;
			$query_vars['name'] = $slug;
			$query_vars[$cpt] = $slug; // this constructs the "cpt=>post_slug" element
		}
	}
	return $query_vars;
}
add_filter('request', "parse_request_remove_cpt_slug", 1, 1);
/**
 * Font Awesome CDN Setup Webfont
 * 
 * This will load Font Awesome from the Font Awesome Free or Pro CDN.
 */
if (!function_exists('fa_custom_setup_cdn_webfont')) {
	function fa_custom_setup_cdn_webfont($cdn_url = '', $integrity = null)
	{
		$matches = [];
		$match_result = preg_match('|/([^/]+?)\.css$|', $cdn_url, $matches);
		$resource_handle_uniqueness = ($match_result === 1) ? $matches[1] : md5($cdn_url);
		$resource_handle = "font-awesome-cdn-webfont-$resource_handle_uniqueness";
		foreach (['wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts'] as $action) {
			add_action(
				$action,
				function () use ($cdn_url, $resource_handle) {
					wp_enqueue_style($resource_handle, $cdn_url, [], null);
				}
			);
		}
		if ($integrity) {
			add_filter(
				'style_loader_tag',
				function ($html, $handle) use ($resource_handle, $integrity) {
					if (in_array($handle, [$resource_handle], true)) {
						return preg_replace(
							'/\/>$/',
							'integrity="' . $integrity .
								'" crossorigin="anonymous" />',
							$html,
							1
						);
					} else {
						return $html;
					}
				},
				10,
				2
			);
		}
	}
}
fa_custom_setup_cdn_webfont(
	'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
	'sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p'
);
// acf options
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Global fields',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'Testimonials',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
add_filter('ai1wm_exclude_content_from_export', function ($exclude_filters) {
	$exclude_filters[] = 'themes/chasestead/node_modules';
	return $exclude_filters;
});
