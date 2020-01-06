<?php
/*
Plugin Name: We Are Go Wordpress Branding
Description: Add We Are Go Wordpress Branding to your site.
Author: Mark Feltwell
*/
/* Start Adding Functions Below this Line */
 // *************************
// Custom Wordpress Branding (We Are Go)
// *************************


/* hiding the update */

function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
        echo '<style>.notice-warning, .error { display: none; }#footer-upgrade { display:none; }</style>';
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );


/* remove howdy */

add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );

if ( 0 != $user_id ) {
/* Add the "My Account" menu */
$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('Welcome, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';

$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );

}
}

/* custom widgets */

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Do you need support?', 'custom_dashboard_help');
}

function custom_dashboard_help() {
?>

<p>We are available between the hours of 8am - 5pm, Monday to Friday.</p>
<a href="mailto:support@wearego.agency" class="button button-primary">Send a support request</a>

<?php
}

/* remove links from admin bar */

// remove toolbar items
add_action( 'admin_bar_menu', 'custom_wp_toolbar_link', 999 );

function custom_wp_toolbar_link( $wp_admin_bar ) {
    if( current_user_can( 'level_5' ) ){ // Set the permission level or capability here for which user tier can see the link.

        $args = array(
            'id' => 'preview-website', // Set the ID of your custom link
            'title' => 'Preview Website', // Set the title of your link
            'href' => '/', // Define the destination of your link
            'meta' => array(
                'target' => '_self', // Change to _blank for launching in a new window
                'class' => 'preview-website', // Add a class to your link
                'title' => 'Preview your site' // Add a title to your link
            )
        );
        $wp_admin_bar->add_node($args);

    }
}
remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
function shapeSpace_remove_toolbar_node($wp_admin_bar) {

	// replace 'updraft_admin_node' with your node id
    $wp_admin_bar->remove_node('updraft_admin_node');
    $wp_admin_bar->remove_node('site-name');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
}
add_action('admin_bar_menu', 'shapeSpace_remove_toolbar_node', 999);

/* Theming the admin area */
function wpb_custom_logo() {
echo '
<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<style type="text/css">
.avatar.photo {
    border-radius: 100% !important;
    border: 0 !important;
}
#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    position: relative;
    background-color: #485635;
    color: #fff !important;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
background: #697853 !important;
}

#wpadminbar, .ab-item,#wpadminbar .ab-top-menu>li, #wpadminbar .ab-top-menu>li.hover>.ab-item, , #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item,.ab-top-menu>li>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
    font-family: Quicksand !important;
}
#adminmenu .awaiting-mod, #adminmenu .update-plugins {
    display: inline-block;
    background-color: #697853;
    color: #fff;
    font-size: 9px;
    line-height: 17px;
    font-weight: 600;
    margin: 1px 0 0 2px;
    vertical-align: top;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    z-index: 26;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background: #5c6d44;
}
#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
    color: #fff;
}
#adminmenu {
    clear: left;
    margin-top: 12px;
    padding: 0;
    list-style: none;
    margin-bottom: 0;
}
#wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {
    margin: 0;
    padding: 0;
    -webkit-box-shadow: 0 3px 5px rgba(0,0,0,.2);
    box-shadow: 0 3px 5px rgba(0,0,0,.2);
    background: #3d4236;
    display: none;
    position: absolute;
    float: none;
    color: #fff;
}
#wpadminbar .ab-submenu .ab-item, #wpadminbar .quicklinks .menupop ul li a, #wpadminbar .quicklinks .menupop ul li a strong, #wpadminbar .quicklinks .menupop.hover ul li a, #wpadminbar.nojs .quicklinks .menupop:hover ul li a {
    color: #b4b9be;
    color: #fff;
}
.button.button-primary:hover, .wp-core-ui .button:hover, .wp-core-ui .button-secondary:hover, .wp-core-ui .button:focus, .wp-core-ui .button-secondary:focus {
    background: #445033;
    border-color: transparent;
    color: #fff;
}
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(" ' . plugins_url() . '/wearego-branding-plugin/admin-logo.png ") !important;
background-position: 0 0;
background-size: cover;
color:rgba(0, 0, 0, 0);
}
#post-body #visibility:before, #post-body .misc-pub-post-status:before, #post-body .misc-pub-revisions:before, .curtime #timestamp:before, span.wp-media-buttons-icon:before {
    color: #fff;
}
span.hide-if-no-js .editinline {
    font-size: 13px;
}
.wp-core-ui .button-primary, .wp-core-ui .button, .wp-core-ui .button-secondary {
    background: #697853;
    border-color: #697853;
    -webkit-box-shadow: 0 1px 0 #006799;
    box-shadow: none;
    color: #fff;
    text-decoration: none;
    text-shadow: none;
    border-radius: 0;
    font-size: 14px;
    font-weight: 700 !important;
}
.postbox .inside h2, .wrap [class$=icon32]+h2, .wrap h1, .wrap>h2:first-child {
    font-size: 30px;
    font-weight: 400;
    margin: 0;
    padding: 9px 0 4px;
    line-height: 29px;
}
span.hide-if-no-js {
    font-size: 20px;
}
.metabox-holder .postbox>h3, .metabox-holder .stuffbox>h3, .metabox-holder h2.hndle, .metabox-holder h3.hndle {
    font-size: 20px;
    padding: 8px 12px;
    margin: 0;
    line-height: 1.4;
}
button#collapse-button {
    color: #fff !important;
    font-size: 10px;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
font-family: Quicksand, sans-serif;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
    background: #3d4236;
}
ul#adminmenu {
    background: linear-gradient(180deg, #282927, #313230, #4f4f4f, #7c7c7c);
}

div#adminmenuwrap {
    background: #494c45;
}

div#adminmenuback {
    background: #7c7c7c;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
background: #494c45;
}
#wpadminbar {
background: #ffffff;
}
#wpadminbar .ab-empty-item, #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
    color: #222222;
}
body #wpadminbar .ab-icon,body #wpadminbar .ab-item:before,body #wpadminbar>#wp-toolbar> .ab-icon {
    color: #222222 !important;
}

body.wp-admin {
font-family: Quicksand, sans-serif;
}
#wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
    background: #697853;
    color: #fff !important;
}
#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label {
    color: #fff;
}

#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before, #adminmenu li a:focus div.wp-menu-image:before,
#adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
  color: #828c74 !important;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');


// Login screen modification

function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . plugins_url() . '/wearego-branding-plugin/custom-login-styles.css" />';
    }
    add_action('login_head', 'my_custom_login');


/*
* We Are Go Login Theme
*/
function my_loginURL() {
    return 'http://wearegomarketing.com/';
}
add_filter('login_headerurl', 'my_loginURL');
function my_loginURLtext() {
    return 'We Are Go';
}
add_filter('login_headertitle', 'my_loginURLtext');
function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'my_logincustomCSSfile');
function my_loginfooter() { ?>
    <p style="text-align: center; color: #fff; margin-top: 1em;">
    If you have any questions, please email us at <a style="text-decoration: none; color: #fff;" class="emailLink" href="mailto:support@wearego.agency
">support@wearego.agency
        </a>
    </p>
<?php }
add_action('login_footer','my_loginfooter');

// Admin footer modification

function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Made with ❤ by <a href="https://www.wearegomarketing.com" target="_blank">We Are Go</a></span>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


function create_theme_style_page() {
    add_theme_page('Theme Styleguide', 'Theme Styleguide', 'administrator', basename(__FILE__),'build_styleguide_page');
  }




?>
