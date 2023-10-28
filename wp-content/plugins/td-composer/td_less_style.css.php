<?php
/**
 * quick LESS compiler for development. Works only on windows for now, uses node + less.js
 * You can turn of this compile from @see td_deploy_mode.php - set TDC_USE_LESS to false
 * V2.0
 */

//
require_once 'includes/external/td_node_less/td_less_compiler.php';

/**
* The list of less files that need to be compiled. You can use your own compiler to compile the less files
 */
$td_less_files = array (

	// less file used in the iframe when the live editor is on
	'iframe_main' => array (
		'source' => 'assets/less_iframe/iframe_main.less',
		'destination' => 'assets/css/iframe_main.css'
	),

	// less file used on the wrapper of the iframe while editing the page. It is not loaded in wp-admin
	'wrap_main' => array (
		'source' => 'assets/less_wrap/wrap_main.less',
		'destination' => 'assets/css/wrap_main.css'
	),

	// less file for wp-admin
	'tdc_wp_admin_main' => array (
		'source' => 'assets/less_wp_admin/wp_admin_main.less',
		'destination' => 'assets/css/tdc_wp_admin_main.css'
	),



	// !!!!
	// less files for css-live plugin

	// css-live - less file for backend / td-composer plugin
	'td_live_css_composer' => array (
		'source' => 'css-live/assets/less/td_live_css_composer.less',
		'destination' => 'css-live/assets/css/td_live_css_composer.css'
	),

	// css-live - less file for front-end (when we edit the front page of the site from the top button)
	'td_live_css_frontend' => array (
		'source' => 'css-live/assets/less/td_live_css_frontend.less',
		'destination' => 'css-live/assets/css/td_live_css_frontend.css'
	),



	// legacy newspaper

	// main front css
	'style.css_td_legacy_newspaper_v1' => array (
		'source' => 'legacy/Newspaper/assets/less/td_legacy_main.less',
		'destination' => 'legacy/Newspaper/assets/css/td_legacy_main.css'
	),
	// main admin css
	'admin-style.css_td_legacy_newspaper_v1' => array (
		'source' => 'legacy/Newspaper/assets/less/td_legacy_admin.less',
		'destination' => 'legacy/Newspaper/assets/css/td_legacy_admin.css'
	),

	// main mobile theme css
	'style.css_mobile' => array (
		'source' => 'mobile/includes/less_files/main.less',
		'destination' => 'mobile/style.css'
	),


	// legacy newsmag

    // main front css
	'style.css_td_legacy_newsmag_v1' => array (
		'source' => 'legacy/Newsmag/assets/less/td_legacy_main.less',
		'destination' => 'legacy/Newsmag/assets/css/td_legacy_main.css'
	),
	// main admin css
	'admin-style.css_td_legacy_newsmag_v1' => array (
		'source' => 'legacy/Newsmag/assets/less/td_legacy_admin.less',
		'destination' => 'legacy/Newsmag/assets/css/td_legacy_admin.css'
	),


);




// from td_less_style.css.php
if (isset($_GET['part'])) {
	if (!empty($td_less_files[$_GET['part']])) {
		td_less_compiler::compile_and_import(
			$td_less_files[$_GET['part']]['source'],
			$td_less_files[$_GET['part']]['destination']
		);
	} else {
		echo "ERROR!!!!! NO ?=part registered in td_less_style.css.php with name: " . $_GET['part'];
	}
}



