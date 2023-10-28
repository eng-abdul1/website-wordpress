<?php

// - Important!
// - For overwriting comments' functionality in child-theme, copy the file 'comments.php' from the
// following theme path (../themes/THEME_NAME/includes/wp_booster/comments.php) to the child-theme root path,
// and NOT this comments.php file you are reading from.

// on cloud single templates for tdb_single_comments shortcodes get the 'tdb-comments' template
if ( td_global::is_tdb_registered() && defined('TDB_TEMPLATE_BUILDER_DIR') && td_util::tdc_is_installed() &&
		(
			(
				tdb_state_content::has_wp_query() &&
				tdb_state_template::get_template_type() === 'single'
			) || (
				tdc_state::is_live_editor_iframe() ||
				tdc_state::is_live_editor_ajax()
			)
		)
) {
	require_once( TDB_TEMPLATE_BUILDER_DIR . '/parts/tdb-comments.php' );
} else {
	require_once('includes/wp_booster/comments.php');
}
