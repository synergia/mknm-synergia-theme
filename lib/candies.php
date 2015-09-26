<?php
////////////////////////////////////////////////////////////////////
// Add Title Parameters
////////////////////////////////////////////////////////////////////

if(!function_exists('synergia_wp_title')) {

    function synergia_wp_title( $title, $sep ) { // Taken from Twenty Twelve 1.0
        global $paged, $page;

        if ( is_feed() )
            return $title;

        // Add the site name.
        $title .= get_bloginfo( 'name' );

        // Add the site description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if ( $paged >= 2 || $page >= 2 )
            $title = "$title $sep " . sprintf( __( 'Page %s', 'synergia' ), max( $paged, $page ) );

        return $title;
    }
    add_filter( 'wp_title', 'synergia_wp_title', 10, 2 );

}


////////////////////////////////////////////////////////////////////
// Favicon
////////////////////////////////////////////////////////////////////
function blog_favicon() {
echo '<link rel="icon" type="image/png" href="'.get_template_directory_uri() . '/img/fav.png" />';
}
add_action('wp_head', 'blog_favicon');

////////////////////////////////////////////////////////////////////
// Custom excerpt ellipses, custom length
///////////////////////////////////////////////////////////////////
function custom_excerpt_more($more) {
return '';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function new_excerpt_length($length) {
return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

////////////////////////////////////////////////////////////////////
// Dynamic Copy Year
////////////////////////////////////////////////////////////////////
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

////////////////////////////////////////////////////////////////////
// Remove version
////////////////////////////////////////////////////////////////////
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

////////////////////////////////////////////////////////////////////
// Polskie komentarze od adpawl
////////////////////////////////////////////////////////////////////
function odmiana($in,$lp,$lm1,$lm2) {
 if ($in==1) return $lp;
 elseif (($in%10>1) && ($in%10<5) && !(($in%100>=10) && ($in%100<=21))) return $lm1;
return $lm2;
};

?>