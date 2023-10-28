<?php
/*
    Our portfolio:  http://themeforest.net/user/tagDiv/portfolio
    Thanks for using our theme!
    tagDiv - 2019
*/


/**
 * Load the speed booster framework + theme specific files
 */

// load the deploy mode
require_once('td_deploy_mode.php');

// load the config
require_once('includes/td_config.php');
require_once('includes/td_config_helper.php');
add_action('td_global_after', array('td_config', 'on_td_global_after_config'), 9); //we run on 9 priority to allow plugins to updage_key our apis while using the default priority of 10


// load the wp booster
require_once('includes/wp_booster/td_wp_booster_functions.php');



/* ----------------------------------------------------------------------------
 * Woo Commerce
 */

// breadcrumb
add_filter('woocommerce_breadcrumb_defaults', 'td_woocommerce_breadcrumbs');
function td_woocommerce_breadcrumbs() {
	return array(
		'delimiter' => ' <i class="td-icon-right td-bread-sep"></i> ',
		'wrap_before' => '<div class="entry-crumbs" itemprop="breadcrumb">',
		'wrap_after' => '</div>',
		'before' => '',
		'after' => '',
		'home' => _x('Home', 'breadcrumb', 'newspaper'),
	);
}

// use own pagination
if (!function_exists('woocommerce_pagination')) {
	// pagination
	function woocommerce_pagination() {
		echo td_page_generator::get_pagination();
	}
}

// Number of product per page 4
add_filter('loop_shop_per_page', 'td_wc_loop_shop_per_page' );
function td_wc_loop_shop_per_page($cols) {
    return 4;
}

if (!function_exists('woocommerce_output_related_products')) {
	// Number of related products
	function woocommerce_output_related_products() {
		woocommerce_related_products(array(
			'posts_per_page' => 4,
			'columns' => 4,
			'orderby' => 'rand',
		)); // Display 4 products in rows of 1
	}
}




/* ----------------------------------------------------------------------------
 * bbPress
 */
// change avatar size to 40px
function td_bbp_change_avatar_size($author_avatar, $topic_id, $size) {
	$author_avatar = '';
	if ($size == 14) {
		$size = 40;
	}
	$topic_id = bbp_get_topic_id( $topic_id );
	if ( !empty( $topic_id ) ) {
		if ( !bbp_is_topic_anonymous( $topic_id ) ) {
			$author_avatar = get_avatar( bbp_get_topic_author_id( $topic_id ), $size );
		} else {
			$author_avatar = get_avatar( get_post_meta( $topic_id, '_bbp_anonymous_email', true ), $size );
		}
	}
	return $author_avatar;
}
add_filter('bbp_get_topic_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_reply_author_avatar', 'td_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_current_user_avatar', 'td_bbp_change_avatar_size', 20, 3);



//add_action('shutdown', 'test_td');

function test_td () {
    if (!is_admin()){
        td_api_base::_debug_get_used_on_page_components();
    }

}


/**
 * tdStyleCustomizer.js is required
 */
if (TD_DEBUG_LIVE_THEME_STYLE) {
    add_action('wp_footer', 'td_theme_style_footer');
		// new live theme demos
	    function td_theme_style_footer() {
			    ?>
			    <div id="td-theme-settings" class="td-live-theme-demos td-theme-settings-small">
				    <div class="td-skin-body">
					    <div class="td-skin-wrap">
						    <div class="td-skin-container td-skin-buy"><a target="_blank" href="http://themeforest.net/item/newspaper/5489609?ref=tagdiv">BUY NEWSPAPER NOW!</a></div>
						    <div class="td-skin-container td-skin-header">GET AN AWESOME START!</div>
						    <div class="td-skin-container td-skin-desc">With easy <span>ONE CLICK INSTALL</span> and fully customizable options, our demos are the best start you'll ever get!!</div>
						    <div class="td-skin-container td-skin-content">
							    <div class="td-demos-list">
								    <?php
								    $td_demo_names = array();

								    foreach (td_global::$demo_list as $demo_id => $stack_params) {
									    $td_demo_names[$stack_params['text']] = $demo_id;
									    ?>
									    <div class="td-set-theme-style"><a href="<?php echo td_global::$demo_list[$demo_id]['demo_url'] ?>" class="td-set-theme-style-link td-popup td-popup-<?php echo esc_attr( $td_demo_names[$stack_params['text']] ) ?>" data-img-url="<?php echo esc_attr( td_global::$get_template_directory_uri ) ?>/demos_popup/large/<?php echo esc_attr( $demo_id ) ?>.jpg"><span></span></a></div>
								    <?php } ?>
									<div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty1"></a></div>
<!--									<div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty2"></a></div>-->
								    <div class="clearfix"></div>
							    </div>
						    </div>
						    <div class="td-skin-scroll"><i class="td-icon-read-down"></i></div>
					    </div>
				    </div>
				    <div class="clearfix"></div>
				    <div class="td-set-hide-show"><a href="#" id="td-theme-set-hide"></a></div>
				    <div class="td-screen-demo" data-width-preview="380"></div>
			    </div>
			    <?php
	    }

}

//td_demo_state::update_state("audio", 'full');

//print_r(td_global::$all_theme_panels_list);

/**
 * Show info message for logged users when API classes are not defined (maybe some TAGDIV plugins are not installed)
 */
add_action( 'get_footer', 'td_on_get_footer' );
function td_on_get_footer() {
	if ( is_user_logged_in() && ! td_util::tdc_is_live_editor_iframe() && td_util::get_check_installed_plugins() ) {

		ob_start();
		?>
		<script>

			setTimeout(function () {

				confirm( "Did you disable any TagDiv plugins? \nWe've got some errors at loading API files. It could happen because of a disabled TagDiv plugin!");

			}, 3000);

		</script>
		<?php

		echo ob_get_clean();
	}
}



if ( is_admin() ) {
    /*  -----------------------------------------------------------------------------
		TGM_Plugin_Activation
	 */
	require_once 'includes/external/class-tgm-plugin-activation.php'; // it cannot be autoloaded

    add_action('tgmpa_register', 'td_required_plugins');
	function td_required_plugins() {

		$config = array(
			'domain' => TD_THEME_NAME,            // Text domain - likely want to be the same as your theme.
			'default_path' => '',                            // Default absolute path to pre-packaged plugins
			//'parent_menu_slug' => 'themes.php',                // DEPRECATED from v2.4.0 - Default parent menu slug
			//'parent_url_slug' => 'themes.php',                // DEPRECATED from v2.4.0 - Default parent URL slug
			'parent_slug'  => 'themes.php',
			'menu' => 'td_plugins',    // Menu slug
			'has_notices' => false,                        // Show admin notices or not
			'is_automatic' => true,                        // Automatically activate plugins after installation or not
			'message' => '',                            // Message to output right before the plugins table
			'strings' => array(
				'page_title'                      => 'Install Required Plugins',
				'menu_title'                      => 'Install Plugins',
				'installing'                      => 'Installing Plugin: %s', // %1$s = plugin name
				'oops'                            => 'Something went wrong with the plugin API.',
                'notice_can_install_required'     => _n_noop( 'The theme requires the following plugin: %1$s.', 'The theme requires the following plugins: %1$s.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'The theme recommends the following plugin: %1$s.', 'The theme recommends the following plugins: %1$s.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'newspaper' ), // %1$s = plugin name(s).
                'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'newspaper' ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'newspaper' ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Go to plugin instalation', 'Go to plugins instalation', 'newspaper' ),
				'activate_link'                   => _n_noop( 'Go to plugin activation panel', 'Go to plugins activation panel', 'newspaper' ),
				'return'                          => 'Return to tagDiv plugins panel',
				'plugin_activated'                => 'Plugin activated successfully.',
				'complete'                        => 'All plugins installed and activated successfully. %s', // %1$s = dashboard link
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa(td_global::$theme_plugins_list, $config);
	}
}