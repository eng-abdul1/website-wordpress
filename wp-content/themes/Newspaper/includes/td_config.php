<?php
/*
 * This is the config file for the theme.
 */

define("TD_THEME_NAME", "Newspaper");
define("TD_THEME_VERSION", "9.7.1");
define("TD_THEME_DEMO_URL", "https://demo.tagdiv.com/" . strtolower(TD_THEME_NAME));
define("TD_THEME_DEMO_DOC_URL", 'http://forum.tagdiv.com/demos_introduction/');  //the url to the demo documentation
define("TD_PLUGINS_URL", 'https://cloud.tagdiv.com/td_plugins/');  //plugins url
define("TD_FEATURED_CAT", "Featured"); //featured cat name
define("TD_FEATURED_CAT_SLUG", "featured"); //featured cat slug
define("TD_THEME_OPTIONS_NAME", "td_011"); //where to store our options

define("TD_AURORA_VERSION", "__td_aurora_deploy_version__");

define("TD_THEME_WP_BOOSTER", "3.0"); // prevents multiple instances of the framework

//if no deploy mode is selected, we use the final deploy built
if (!defined('TD_DEPLOY_MODE')) {
    define("TD_DEPLOY_MODE", 'deploy');
}






switch (TD_DEPLOY_MODE) {
    default:
        //deploy version - this is the version that we ship!
        define("TD_DEBUG_LIVE_THEME_STYLE", false);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", false);
        break;

    case 'dev':
        //dev version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", true); //use less on dev
        break;

    case 'demo':
        //demo version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
        define("TD_DEBUG_IOS_REDIRECT", true); // remove themeforest iframe from ios devices on demo only!
        define("TD_DEBUG_USE_LESS", false);
        break;
}



/**
 * speed booster v 3.0 hooks - prepare the framework for the theme
 * is also used by td_deploy - that's why it's a static class
 * Class td_wp_booster_hooks
 */
class td_config {


    /**
     * @throws ErrorException
     */
    static function on_td_global_after_config() {



        /**
         * js files list
         */
        td_global::$js_files = array(


	        'tdAnalytics' =>             '/includes/wp_booster/js_dev/tdAnalytics.js',
	        'tdExternal' =>             '/includes/wp_booster/js_dev/tdExternal.js',
            'tdDetect' =>               '/includes/wp_booster/js_dev/tdDetect.js',

	        'tdViewport' =>             '/includes/wp_booster/js_dev/tdViewport.js',

            'tdMenu' =>                 '/includes/wp_booster/js_dev/tdMenu.js',
            //'tdLocalCache' =>         '/includes/wp_booster/js_dev/tdLocalCache.js',
            'tdUtil' =>                 '/includes/wp_booster/js_dev/tdUtil.js',
            'tdAffix' =>                '/includes/wp_booster/js_dev/tdAffix.js',
            //'td_scroll_animation' =>  '/includes/wp_booster/js_dev/td_scroll_animation.js',
            'td_site' =>                '/includes/wp_booster/js_dev/td_site.js',

            'tdLoadingBox' =>           '/includes/wp_booster/js_dev/tdLoadingBox.js',
            'tdAjaxSearch' =>           '/includes/wp_booster/js_dev/tdAjaxSearch.js',
            'tdPostImages' =>           '/includes/wp_booster/js_dev/tdPostImages.js',
            'tdBlocks' =>               '/includes/wp_booster/js_dev/tdBlocks.js',
            'tdLogin' =>                '/includes/wp_booster/js_dev/tdLogin.js',
            'tdLoginMobile' =>          '/includes/wp_booster/js_dev/tdLoginMobile.js',
            'tdStyleCustomizer' =>      '/includes/wp_booster/js_dev/tdStyleCustomizer.js',
            'tdTrendingNow' =>          '/includes/wp_booster/js_dev/tdTrendingNow.js',
            'td_history' =>             '/includes/wp_booster/js_dev/td_history.js',
            'tdSmartSidebar' =>         '/includes/wp_booster/js_dev/tdSmartSidebar.js',
            'tdInfiniteLoader' =>       '/includes/wp_booster/js_dev/tdInfiniteLoader.js',
	        'vimeo_froogaloop' =>       '/includes/wp_booster/js_dev/vimeo_froogaloop.js',

	        'tdCustomEvents' =>         '/includes/js_files/tdCustomEvents.js',
	        'tdEvents' =>               '/includes/wp_booster/js_dev/tdEvents.js',

	        'tdHeader' =>               '/includes/wp_booster/js_dev/tdHeader.js',

	        'tdAjaxCount' =>            '/includes/wp_booster/js_dev/tdAjaxCount.js',
            'tdVideoPlaylist' =>        '/includes/wp_booster/js_dev/tdVideoPlaylist.js',
	        'td_slide' =>               '/includes/wp_booster/js_dev/td_slide.js',
            'tdPullDown' =>             '/includes/wp_booster/js_dev/tdPullDown.js',

            //'td_main' =>              '/includes/js_files/td_main.js',
            'td_fps' =>                 '/includes/js_files/td_fps.js',
	        'tdAnimationScroll' =>      '/includes/wp_booster/js_dev/tdAnimationScroll.js',
	        'tdHomepageFull' =>         '/includes/wp_booster/js_dev/tdHomepageFull.js',
	        'tdBackstr' =>              '/includes/wp_booster/js_dev/tdBackstr.js',

            //'td_scroll_effects.js' => '/includes/js_files/td_scroll_effects.js',

	        'tdAnimationStack' =>       '/includes/wp_booster/js_dev/tdAnimationStack.js',
	        'td_main' =>                '/includes/js_files/td_main.js',

            'td_loop_ajax' =>           '/includes/wp_booster/js_dev/tdLoopAjax.js',

	        'tdWeather' =>              '/includes/wp_booster/js_dev/tdWeather.js',
            'tdLastInit' =>             '/includes/wp_booster/js_dev/tdLastInit.js',
            'tdAnimationSprite' =>      '/includes/wp_booster/js_dev/tdAnimationSprite.js',
            'tdDatei18n' =>             '/includes/wp_booster/js_dev/tdDatei18n.js',
            'tdSocialSharing'=>         '/includes/wp_booster/js_dev/tdSocialSharing.js'

        );


	    /**
	     * tdViewport intervals in crescendo order
	     */
	    td_global::$td_viewport_intervals = array(
		    array(
			    "limitBottom" => 767,
			    "sidebarWidth" => 228,
		    ),
		    array(
			    "limitBottom" => 1018,
			    "sidebarWidth" => 300,
		    ),
		    array(
			    "limitBottom" => 1140,
			    "sidebarWidth" => 324,
		    ),
	    );


	    /**
	     * - td animation stack effects used in the 'loading animation image' theme panel section
	     * - the first element is a special case, it representing the default type 'type0' @see animation-stack.less
	     * - the 'val' parameter is the type effect
	     * - the 'specific_selectors' parameter is the css selector used to look for new elements inside of some specific sections [ex. at ajax req]
	     * - the 'general_selectors' parameter is the css selector used to look for elements on extended sections [ex. entire page]
	     * - Important! the 'general_selectors' is not used by the default 'type0'
	     */
	    td_global::$td_animation_stack_effects = array(
		    array(
			    'text' => 'Fade [full]',
			    'val' => '', // empty, as a default value
			    'specific_selectors' => '.entry-thumb, img',
			    'general_selectors' => '.td-animation-stack img, .td-animation-stack .entry-thumb, .post img',
		    ),

            array(
                'text' => 'Fade & Scale',
                'val' => 'type1',
                'specific_selectors' => '.entry-thumb, img[class*="wp-image-"], a.td-sml-link-to-image > img',
                'general_selectors' => '.td-animation-stack .entry-thumb, .post .entry-thumb, .post img[class*="wp-image-"], .post a.td-sml-link-to-image > img',
            ),


            array(
                'text' => 'Up fade',
                'val' => 'type2',
                'specific_selectors' => '.entry-thumb, img[class*="wp-image-"], a.td-sml-link-to-image > img',
                'general_selectors' => '.td-animation-stack .entry-thumb, .post .entry-thumb, .post img[class*="wp-image-"], a.td-sml-link-to-image > img',
            ),


        );



        /**
         * the headers
         */
        td_api_header_style::add('1',
            array(
                'text' => 'Default',
                'file' => td_global::$get_template_directory . '/parts/header/header-style-1.php',
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/menu/icon-menu-1.png'
            )
        );



        /**
         * single template list
         */
        td_api_single_template::add('single_template',
            array(
                'file' => td_global::$get_template_directory . '/single.php',
                'text' => 'Single template',
                'img' => td_global::$get_template_directory_uri . '/images/panel/single_templates/single_template_0.png',
                'show_featured_image_on_all_pages' => false,
                'bg_disable_background' => false,          // disable the featured image
                'bg_box_layout_config' => 'auto',                // auto | td-boxed-layout | td-full-layout
                'bg_use_featured_image_as_background' => false,   // uses the featured image as a background
                'exclude_ad_content_top' => false,
            )
        );



        /**
         * category templates
         */
        td_api_category_template::add('td_category_template_1',
            array (
                'file' => td_global::$get_template_directory . '/includes/category_templates/td_category_template_1.php',
                'img' => td_global::$get_template_directory_uri . '/images/panel/category_templates/icon-category-1.png',
                'text' => 'Style 1',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );
        /**
         * category top posts styles
         */
        td_api_category_top_posts_style::add('td_category_top_posts_style_1',
            array (
                'file' => td_global::$get_template_directory . '/includes/category_top_posts_styles/td_category_top_posts_style_1.php',
                'posts_shown_in_the_loop' => 0,
                'img' => td_global::$get_template_directory_uri . '/images/panel/category_templates/icon-category-top-1.png',
                'text' => 'Grid 1',
                'td_block_name' => 'td_block_big_grid_1',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );



        /**
         * the td_api_footer
         */
        td_api_footer_template::add('td_footer_template_1',
            array(
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/footer_templates/icon-footer-1.png',
                'file' => td_global::$get_template_directory . '/parts/footer/td_footer_template_1.php',
                'text' => 'Default'
            )
        );



        /**
         * the td_api_sub_footer
         */
        td_api_sub_footer_template::add('td_sub_footer_template_1',
            array(
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/sub_footer_templates/icon-sub-footer-1.png',
                'file' => td_global::$get_template_directory . '/parts/footer/td_sub_footer_template_1.php',
                'text' => 'Style 1'

            )
        );



        /**
         * block templates
         */
        td_api_block_template::add('td_block_template_1',
            array (
                'text' => 'Block Header 1 - Default',
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/block_templates/icon-block-header-1.png',
                'file' => td_global::$get_template_directory . '/includes/block_templates/td_block_template_1.php',
                'params' => array(
                    // title settings
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => 'Title background color:',
                        "param_name" => "header_color",
                        "value" => '',
                        "description" => 'Optional - Choose a custom background color for this header',
                        'td_type' => 'block_template',
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => 'Title text color:',
                        "param_name" => "header_text_color",
                        "value" => '',
                        "description" => 'Optional - Choose a custom title text color for this header',
                        'td_type' => 'block_template',
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => 'Accent hover color:',
                        "param_name" => "accent_text_color",
                        "value" => '',
                        "description" => 'Optional - Choose a custom accent hover color for this block',
                        'td_type' => 'block_template',
                    )
                )//end generic array
            )
        );



        /**
         * modules list
         */
        td_api_module::add('td_module_1',
            array(
                'file' => td_global::$get_template_directory . '/includes/modules/td_module_1.php',
                'text' => 'Module 1',
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/modules/td_module_1.png',
                'used_on_blocks' => array('td_block_3'),
                'excerpt_title' => 12,
                'excerpt_content' => '',
                'enabled_on_more_articles_box' => true,
                'enabled_on_loops' => true,
                'uses_columns' => true,
                'category_label' => true,
                'class' => 'td_module_wrap td-animation-stack',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );
        td_api_module::add('td_module_15',
            array(
                'file' => td_global::$get_template_directory . '/includes/modules/td_module_15.php',
                'text' => 'Module 15',
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/modules/td_module_15.png',
                'used_on_blocks' => '',
                'excerpt_title' => '',
                'excerpt_content' => '',
                'enabled_on_more_articles_box' => false,
                'enabled_on_loops' => true,
                'uses_columns' => false,                      // if the module uses columns on the page template + loop
                'category_label' => true,
                'class' => 'td-animation-stack',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );
        td_api_module::add('td_module_16',
            array(
                'file' => td_global::$get_template_directory . '/includes/modules/td_module_16.php',
                'text' => 'Module 16',
                'img' => td_global::$get_template_directory_uri . '/assets/images/panel/modules/td_module_16.png',
                'used_on_blocks' =>  array('td_block_21','Search Page'),
                'excerpt_title' => 15,
                'excerpt_content' => 25,
                'enabled_on_more_articles_box' => false,
                'enabled_on_loops' => true,
                'uses_columns' => false,                      // if the module uses columns on the page template + loop
                'category_label' => true,
                'class' => 'td_module_wrap td-animation-stack',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );
        td_api_module::add('td_module_mx2',
            array(
                'file' => td_global::$get_template_directory . '/includes/modules/td_module_mx2.php',
                'text' => 'Module MX2',
                'img' => '',
                'used_on_blocks' => array('td_block_18', 'td_block_19', 'Search live'),
                'excerpt_title' => 25,
                'excerpt_content' => '',
                'enabled_on_more_articles_box' => false,
                'enabled_on_loops' => false,
                'uses_columns' => false,                      // if the module uses columns on the page template + loop
                'category_label' => true,
                'class' => 'td_module_wrap td-animation-stack',
                'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
            )
        );



	    /**
         * the tiny mce styles
         */

	    // paddings
        td_api_tinymce_formats::add('td_tinymce_item_1',
            array(
                'title' => 'Text padding'
            ));
            td_api_tinymce_formats::add('td_tinymce_item_1_1',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => 'text ⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-0',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_2',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢ text',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-4',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_3',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢ text ⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-1',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_4',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢ text ⇠⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-3',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_5',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢⇢ text ⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-6',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_6',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢⇢ text ⇠⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-2',
                    'wrapper' => true,
                ));
            td_api_tinymce_formats::add('td_tinymce_item_1_7',
                array(
                    'parent_id' => 'td_tinymce_item_1',
                    'title' => '⇢⇢⇢ text ⇠⇠⇠',
                    'block' => 'div',
                    'classes' => 'td-paragraph-padding-5',
                    'wrapper' => true,
                ));

        // arrow list
        td_api_tinymce_formats::add('td_tinymce_item_3',
            array(
                'title' => 'Arrow list',
                'selector' => 'ul',
                'classes' => 'td-arrow-list'
            ));

        // blockquote
        td_api_tinymce_formats::add('td_blockquote',
            array(
                'title' => 'Quotes'
        ));
	        td_api_tinymce_formats::add('td_blockquote_1',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Quote left',
	                'block' => 'blockquote',
	                'classes' => 'td_quote td_quote_left',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_2',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Quote right',
	                'block' => 'blockquote',
	                'classes' => 'td_quote td_quote_right',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_3',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Quote box center',
	                'block' => 'blockquote',
	                'classes' => 'td_quote_box td_box_center',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_4',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Quote box left',
	                'block' => 'blockquote',
	                'classes' => 'td_quote_box td_box_left',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_5',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Quote box right',
	                'block' => 'blockquote',
	                'classes' => 'td_quote_box td_box_right',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_6',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Pull quote center',
	                'block' => 'blockquote',
	                'classes' => 'td_pull_quote td_pull_center',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_7',
	            array(
	                'parent_id' => 'td_blockquote',
	                'title' => 'Pull quote left',
	                'block' => 'blockquote',
	                'classes' => 'td_pull_quote td_pull_left',
	                'wrapper' => true,
	            ));
	        td_api_tinymce_formats::add('td_blockquote_8',
            array(
                'parent_id' => 'td_blockquote',
                'title' => 'Pull quote right',
                'block' => 'blockquote',
                'classes' => 'td_pull_quote td_pull_right',
                'wrapper' => true,
            ));

        // two columns text
        td_api_tinymce_formats::add('td_text_columns',
            array(
                'title' => 'Text columns'
            ));
            td_api_tinymce_formats::add('td_text_columns_0',
                array(
                    'parent_id' => 'td_text_columns',
                    'title' => 'two columns',
                    'block' => 'div',
                    'classes' => 'td_text_columns_two_cols',
                    'wrapper' => true,
                ));

        // dropcap
        td_api_tinymce_formats::add('td_dropcap',
            array(
                'title' => 'Dropcaps'
            ));
            td_api_tinymce_formats::add('td_dropcap_0',
                array(
                    'parent_id' => 'td_dropcap',
                    'title' => 'Box',
                    'classes' => 'dropcap',
                    'inline' => 'span'
                ));
            td_api_tinymce_formats::add('td_dropcap_1',
                array(
                    'parent_id' => 'td_dropcap',
                    'title' => 'Circle',
                    'classes' => 'dropcap dropcap1',
                    'inline' => 'span'
                ));
            td_api_tinymce_formats::add('td_dropcap_2',
                array(
                    'parent_id' => 'td_dropcap',
                    'title' => 'Regular',
                    'classes' => 'dropcap dropcap2',
                    'inline' => 'span'
                ));
            td_api_tinymce_formats::add('td_dropcap_3',
                array(
                    'parent_id' => 'td_dropcap',
                    'title' => 'Bold',
                    'classes' => 'dropcap dropcap3',
                    'inline' => 'span'
                ));

        // Custom buttons in post Formats
        td_api_tinymce_formats::add('td_btn',
            array(
                'title' => 'Button'
            ));
	        //Default button
	        td_api_tinymce_formats::add('td_default_btn',
	            array(
	                'parent_id' => 'td_btn',
	                'title' => 'Default',
	                'classes' => ' td_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_default_btn_sm',
	            array(
	                'parent_id' => 'td_default_btn',
	                'title' => 'Default - Small',
	                'classes' => 'td_btn  td_btn_sm td_default_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_default_btn_md',
	            array(
	                'parent_id' => 'td_default_btn',
	                'title' => 'Default - Normal',
	                'classes' => 'td_btn td_btn_md td_default_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_default_btn_lg',
	            array(
	                'parent_id' => 'td_default_btn',
	                'title' => 'Default - Large',
	                'classes' => 'td_btn td_btn_lg td_default_btn',
	                'inline' => 'span'
	            ));
	        //Round button
	        td_api_tinymce_formats::add('td_round_btn',
	            array(
	                'parent_id' => 'td_btn',
	                'title' => 'Round',
	                'classes' => 'td_round_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_round_btn_sm',
	            array(
	                'parent_id' => 'td_round_btn',
	                'title' => 'Round - Small',
	                'classes' => 'td_btn td_btn_sm td_round_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_round_btn_md',
	            array(
	                'parent_id' => 'td_round_btn',
	                'title' => 'Round - Normal',
	                'classes' => 'td_btn td_btn_md td_round_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_round_btn_lg',
	            array(
	                'parent_id' => 'td_round_btn',
	                'title' => 'Round - Large',
	                'classes' => 'td_btn td_btn_lg td_round_btn',
	                'inline' => 'span'
	            ));
	        //Outlined button
	        td_api_tinymce_formats::add('td_outlined_btn',
	            array(
	                'parent_id' => 'td_btn',
	                'title' => 'Outlined',
	                'classes' => 'td_outlined_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_outlined_btn_sm',
	            array(
	                'parent_id' => 'td_outlined_btn',
	                'title' => 'Outlined - Small',
	                'classes' => 'td_btn td_btn_sm td_outlined_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_outlined_btn_md',
	            array(
	                'parent_id' => 'td_outlined_btn',
	                'title' => 'Outlined - Normal',
	                'classes' => 'td_btn td_btn_md td_outlined_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_outlined_btn_lg',
	            array(
	                'parent_id' => 'td_outlined_btn',
	                'title' => 'Outlined - Large',
	                'classes' => 'td_btn td_btn_lg td_outlined_btn',
	                'inline' => 'span'
	            ));
	        //Shadow button
	        td_api_tinymce_formats::add('td_shadow_btn',
	            array(
	                'parent_id' => 'td_btn',
	                'title' => 'Shadow',
	                'classes' => 'td_shadow_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_shadow_btn_sm',
	            array(
	                'parent_id' => 'td_shadow_btn',
	                'title' => 'Shadow - Small',
	                'classes' => 'td_btn td_btn_sm td_shadow_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_shadow_btn_md',
	            array(
	                'parent_id' => 'td_shadow_btn',
	                'title' => 'Shadow - Normal',
	                'classes' => 'td_btn td_btn_md td_shadow_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_shadow_btn_lg',
	            array(
	                'parent_id' => 'td_shadow_btn',
	                'title' => 'Shadow - Large',
	                'classes' => 'td_btn td_btn_lg td_shadow_btn',
	                'inline' => 'span'
	            ));
	        //3D button
	        td_api_tinymce_formats::add('td_3D_btn',
	            array(
	                'parent_id' => 'td_btn',
	                'title' => '3D',
	                'classes' => 'td_3D_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_3D_btn_sm',
	            array(
	                'parent_id' => 'td_3D_btn',
	                'title' => '3D - Small',
	                'classes' => 'td_btn td_btn_sm td_3D_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_3D_btn_md',
	            array(
	                'parent_id' => 'td_3D_btn',
	                'title' => '3D - Normal',
	                'classes' => 'td_btn td_btn_md td_3D_btn',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_3D_btn_lg',
            array(
                'parent_id' => 'td_3D_btn',
                'title' => '3D - Large',
                'classes' => 'td_btn td_btn_lg td_3D_btn',
                'inline' => 'span'
            ));

        // highlighter
        td_api_tinymce_formats::add('td_text_highlight',
            array(
                'title' => 'Text highlighting'
            ));
            td_api_tinymce_formats::add('td_text_highlight_0',
                array(
                    'parent_id' => 'td_text_highlight',
                    'title' => 'Black censured',
                    'classes' => 'td_text_highlight_0',
                    'inline' => 'span'
                ));
            td_api_tinymce_formats::add('td_text_highlight_red',
                array(
                    'parent_id' => 'td_text_highlight',
                    'title' => 'Red marker',
                    'classes' => 'td_text_highlight_marker_red td_text_highlight_marker',
                    'inline' => 'span'
                ));
            td_api_tinymce_formats::add('td_text_highlight_blue',
                array(
                    'parent_id' => 'td_text_highlight',
                    'title' => 'Blue marker',
                    'classes' => 'td_text_highlight_marker_blue td_text_highlight_marker',
                    'inline' => 'span'
                ));
	        td_api_tinymce_formats::add('td_text_highlight_green',
	            array(
	                'parent_id' => 'td_text_highlight',
	                'title' => 'Green marker',
	                'classes' => 'td_text_highlight_marker_green td_text_highlight_marker',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_text_highlight_yellow',
	            array(
	                'parent_id' => 'td_text_highlight',
	                'title' => 'Yellow marker',
	                'classes' => 'td_text_highlight_marker_yellow td_text_highlight_marker',
	                'inline' => 'span'
	            ));
	        td_api_tinymce_formats::add('td_text_highlight_pink',
            array(
                'parent_id' => 'td_text_highlight',
                'title' => 'Pink marker',
                'classes' => 'td_text_highlight_marker_pink td_text_highlight_marker',
                'inline' => 'span'
            ));

        // clear elements
        td_api_tinymce_formats::add('td_clear_elements',
            array(
                'title' => 'Clear element',
                'selector' => 'a,p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img,code,blockquote',
                'styles' => array(
                    'clear' => 'both'
                )
            ));


        /**
         * set the custom css fields for the panel @see td_panel_custom_css.php
         * and also for the wp_footer hook @see td_bottom_code()
         */
        td_global::$theme_panel_custom_css_fields_list = array(
            'tds_responsive_css_desktop' => array(
                'text' => 'DESKTOP',
                'description' => '1141px +',
                'media_query' => '@media (min-width: 1141px)',
                'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/panel/resp-desktop.png'
            ),
            'tds_responsive_css_ipad_landscape' => array(
                'text' => 'IPAD LANDSCAPE',
                'description' => '1019px - 1140px',
                'media_query' => '@media (min-width: 1019px) and (max-width: 1140px)',
                'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/panel/resp-ipado.png'
            ),
            'tds_responsive_css_ipad_portrait' => array(
                'text' => 'IPAD PORTRAIT',
                'description' => '768px - 1018px',
                'media_query' => '@media (min-width: 768px) and (max-width: 1018px)',
                'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/panel/resp-ipadv.png'
            ),
            'tds_responsive_css_phone' => array(
                'text' => 'PHONES',
                'description' => '0 - 767px',
                'media_query' => '@media (max-width: 767px)',
                'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/panel/resp-phone.png'
            )
        );


		// !!!! Change it to use just one option for viewport settings!
	    td_global::$viewport_settings = array(
            'all' => td_global::$theme_panel_custom_css_fields_list['tds_responsive_css_desktop'],
            'landscape' => td_global::$theme_panel_custom_css_fields_list['tds_responsive_css_ipad_landscape'],
	        'portrait' => td_global::$theme_panel_custom_css_fields_list['tds_responsive_css_ipad_portrait'],
            'phone' => td_global::$theme_panel_custom_css_fields_list['tds_responsive_css_phone'],
        );


        /**
         * the default fonts used by the theme. For a list of fonts ids @see td_fonts::$font_names_google_list
         */
        td_global::$default_google_fonts_list = array (
            '438' => array(
                '300italic',
                '400',
                '400italic',
                '600',
                '600italic',
                '700'
            ),
            '521' => array(
                '300',
                '400',
                '400italic',
                '500',
                '500italic',
                '700',
                '900',
            ),
        );


	    /**
	     * the demos are stored in /includes/demos
	     * demos_filename (without .txt) => demos_name
	     * @var array
	     */
	    td_global::$demo_list = array (
		    'default' => array(
			    'text' => 'Default Demo',
			    'folder' => td_global::$get_template_directory . '/includes/demos/default/',
			    'img' => td_global::$get_template_directory_uri . '/includes/demos/default/screenshot.png',
			    'demo_url' => 'https://demo.tagdiv.com/newspaper/',
			    'td_css_generator_demo' => false,
			    'uses_custom_style_css' => false                // load a custom demo_style.less - must also be added to td_less_style.css.php
		    ),
            'black' => array(
                'text' => 'Black Version',
                'folder' => td_global::$get_template_directory . '/includes/demos/black/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/black/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_black/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_food' => array(
                'text' => 'Food Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_food/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_food/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_food/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                     // required plugins for the demo to work properly
                    'tagDiv Composer',
	                'tagDiv Cloud Library',
                ),
            ),
            'racing' => array(
                'text' => 'Racing Mag',
                'folder' => td_global::$get_template_directory . '/includes/demos/racing/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/racing/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_racing/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                     // required plugins for the demo to work properly
                    'tagDiv Composer',
	                'tagDiv Cloud Library',
                ),
            ),
            'nomad' => array(
                'text' => 'Nomad',
                'folder' => td_global::$get_template_directory . '/includes/demos/nomad/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/nomad/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_nomad/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                    'tagDiv Newsletter',
                ),
            ),
            'decor' => array(
                'text' => 'Home Decor',
                'folder' => td_global::$get_template_directory . '/includes/demos/decor/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/decor/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_decor/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                     // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'blog_lifestyle' => array(
                'text' => 'Lifestyle Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_lifestyle/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_lifestyle/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_lifestyle/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                     // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'living_mag' => array(
                'text' => 'LivingMag',
                'folder' => td_global::$get_template_directory . '/includes/demos/living_mag/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/living_mag/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_living_mag/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                    'tagDiv Newsletter',
                ),
            ),
            'fast' => array(
                'text' => 'Fast News',
                'folder' => td_global::$get_template_directory . '/includes/demos/fast/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/fast/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_fast/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'crypto' => array(
                'text' => 'Crypto News',
                'folder' => td_global::$get_template_directory . '/includes/demos/crypto/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/crypto/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_crypto/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'gossip' => array(
                'text' => 'Gossip',
                'folder' => td_global::$get_template_directory . '/includes/demos/gossip/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/gossip/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_gossip/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'craft_ideas' => array(
                'text' => 'Craft Ideas',
                'folder' => td_global::$get_template_directory . '/includes/demos/craft_ideas/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/craft_ideas/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_craft_ideas/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'classy' => array(
                'text' => 'Classy Magazine',
                'folder' => td_global::$get_template_directory . '/includes/demos/classy/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/classy/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_classy/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library'
                ),
            ),
            'journal' => array(
                'text' => 'Journal',
                'folder' => td_global::$get_template_directory . '/includes/demos/journal/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/journal/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_journal/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library'
                ),
            ),
            'dentist' => array(
                'text' => 'Dental Studio',
                'folder' => td_global::$get_template_directory . '/includes/demos/dentist/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/dentist/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_dentist/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'gaming' => array(
                'text' => 'Gaming',
                'folder' => td_global::$get_template_directory . '/includes/demos/gaming/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/gaming/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_gaming/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'entertainment' => array(
                'text' => 'Entertainment',
                'folder' => td_global::$get_template_directory . '/includes/demos/entertainment/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/entertainment/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_entertainment/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                    'tagDiv Cloud Library',
                ),
            ),
            'blog_coffee' => array(
                'text' => 'Coffee Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_coffee/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_coffee/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_coffee/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer' => 'td-composer/td-composer.php',
                ),
            ),
            'nature' => array(
                'text' => 'Nature Love',
                'folder' => td_global::$get_template_directory . '/includes/demos/nature/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/nature/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_nature/',
                'td_css_generator_demo' => false,               // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'wine' => array(
                'text' => 'Wine Aroma',
                'folder' => td_global::$get_template_directory . '/includes/demos/wine/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/wine/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_wine/',
                'td_css_generator_demo' => false,               // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'city_news' => array(
                'text' => 'City News',
                'folder' => td_global::$get_template_directory . '/includes/demos/city_news/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/city_news/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_city_news/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'smart_app' => array(
                'text' => 'Smart APP',
                'folder' => td_global::$get_template_directory . '/includes/demos/smart_app/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/smart_app/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_smart_app/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'lifestyle' => array(
                'text' => 'Lifestyle Magazine',
                'folder' => td_global::$get_template_directory . '/includes/demos/lifestyle/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/lifestyle/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_lifestyle/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'gadgets' => array(
                'text' => 'Gadgets',
                'folder' => td_global::$get_template_directory . '/includes/demos/gadgets/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/gadgets/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_gadgets/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'wildlife' => array(
                'text' => 'Raw & Wild',
                'folder' => td_global::$get_template_directory . '/includes/demos/wildlife/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/wildlife/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_wildlife/',
                'td_css_generator_demo' => false,               // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'business' => array(
                'text' => 'Business',
                'folder' => td_global::$get_template_directory . '/includes/demos/business/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/business/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_business/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'construction' => array(
                'text' => 'Construction',
                'folder' => td_global::$get_template_directory . '/includes/demos/construction/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/construction/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_construction/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'recipes' => array(
                'text' => 'Recipes',
                'folder' => td_global::$get_template_directory . '/includes/demos/recipes/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/recipes/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_recipes/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'week' => array(
                'text' => 'News Week',
                'folder' => td_global::$get_template_directory . '/includes/demos/week/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/week/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_week/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'ink' => array(
                'text' => 'Ink Parlor',
                'folder' => td_global::$get_template_directory . '/includes/demos/ink/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/ink/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_ink/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'what' => array(
                'text' => 'Say What?',
                'folder' => td_global::$get_template_directory . '/includes/demos/what/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/what/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_what/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'book_club' => array(
                'text' => 'Book Club',
                'folder' => td_global::$get_template_directory . '/includes/demos/book_club/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/book_club/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_book_club/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'demo_installed_text' => '<a href="http://forum.tagdiv.com/import-revolution-sliders-on-demos/" target="_blank">Import revolution slider</a>'
            ),
            'law_firm' => array(
                'text' => 'Law Firm',
                'folder' => td_global::$get_template_directory . '/includes/demos/law_firm/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/law_firm/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_law_firm/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'tech' => array(
                'text' => 'Tech News',
                'folder' => td_global::$get_template_directory . '/includes/demos/tech/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/tech/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_tech/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'spa' => array(
                'text' => 'Spa Heaven',
                'folder' => td_global::$get_template_directory . '/includes/demos/spa/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/spa/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_spa/',
                'td_css_generator_demo' => false,               // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'travel' => array(
                'text' => 'Travel Guides',
                'folder' => td_global::$get_template_directory . '/includes/demos/travel/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/travel/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_travel/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'retro' => array(
                'text' => 'Retro',
                'folder' => td_global::$get_template_directory . '/includes/demos/retro/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/retro/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_retro/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_architecture' => array(
                'text' => 'Architecture',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_architecture/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_architecture/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_architecture/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_fitness' => array(
                'text' => 'Blog Fitness',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_fitness/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_fitness/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_fitness/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'magazine' => array(
                'text' => 'News Magazine',
                'folder' => td_global::$get_template_directory . '/includes/demos/magazine/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/magazine/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_magazine/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'voice' => array(
                'text' => 'Voice Report',
                'folder' => td_global::$get_template_directory .  '/includes/demos/voice/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/voice/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_voice/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'technology' => array(
                'text' => 'Technology',
                'folder' => td_global::$get_template_directory . '/includes/demos/technology/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/technology/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_technology/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'art_creek' => array(
                'text' => 'Art Creek',
                'folder' => td_global::$get_template_directory . '/includes/demos/art_creek/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/art_creek/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_art_creek/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'sound_radar' => array(
                'text' => 'Sound Radar',
                'folder' => td_global::$get_template_directory . '/includes/demos/sound_radar/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/sound_radar/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_sound_radar/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_travel' => array(
                'text' => 'Travel Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_travel/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_travel/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_travel/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'demo_installed_text' => '<a href="http://forum.tagdiv.com/import-revolution-sliders-on-demos/" target="_blank">Import revolution slider</a>'
            ),
            'church' => array(
                'text' => 'Church',
                'folder' => td_global::$get_template_directory . '/includes/demos/church/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/church/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_church/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_beauty' => array(
                'text' => 'Beauty Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_beauty/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_beauty/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_beauty/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'restro' => array(
                'text' => 'Restro',
                'folder' => td_global::$get_template_directory . '/includes/demos/restro/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/restro/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_restro/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'showcase' => array(
                'text' => 'Showcase',
                'folder' => td_global::$get_template_directory . '/includes/demos/showcase/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/showcase/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_showcase/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'required_plugins' => array(                    // required plugins for the demo to work properly
                    'tagDiv Composer',
                ),
            ),
            'old_fashioned' => array(
                'text' => 'Old Fashioned',
                'folder' => td_global::$get_template_directory . '/includes/demos/old_fashioned/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/old_fashioned/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_old_fashioned/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'photography' => array(
                'text' => 'Photography',
                'folder' => td_global::$get_template_directory . '/includes/demos/photography/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/photography/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_photography/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_baby' => array(
                'text' => 'Baby Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_baby/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_baby/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_baby/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'cafe' => array(
                'text' => 'News Cafe',
                'folder' => td_global::$get_template_directory . '/includes/demos/cafe/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/cafe/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_cafe/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'sport' => array(
                'text' => 'Sport News',
                'folder' => td_global::$get_template_directory . '/includes/demos/sport/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/sport/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_sport/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'local_news' => array(
                'text' => 'Local News',
                'folder' => td_global::$get_template_directory . '/includes/demos/local_news/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/local_news/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_local_news/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_cars' => array(
                'text' => 'Cars Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_cars/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_cars/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_cars/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'demo_installed_text' => '<a href="http://forum.tagdiv.com/import-revolution-sliders-on-demos/" target="_blank">Import revolution slider</a>'
            ),
            'medicine' => array(
                'text' => 'Global Medicine',
                'folder' => td_global::$get_template_directory . '/includes/demos/medicine/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/medicine/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_medicine/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'blog_health' => array(
                'text' => 'Health Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog_health/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog_health/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_blog_health/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'wedding' => array(
                'text' => 'Wedding News',
                'folder' => td_global::$get_template_directory . '/includes/demos/wedding/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/wedding/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_wedding/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'demo_installed_text' => '<a href="http://forum.tagdiv.com/import-revolution-sliders-on-demos/" target="_blank">Import revolution slider</a>'
            ),
            'animals' => array(
                'text' => 'Animal News',
                'folder' => td_global::$get_template_directory . '/includes/demos/animals/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/animals/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_animals/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'politics' => array(
                'text' => 'Politics',
                'folder' => td_global::$get_template_directory . '/includes/demos/politics/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/politics/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_politics/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true,                // load a custom demo_style.less - must also be added to td_less_style.css.php
                'demo_installed_text' => '<a href="http://forum.tagdiv.com/import-revolution-sliders-on-demos/" target="_blank">Import revolution slider</a>'
            ),
            'blog' => array(
                'text' => 'Classic Blog',
                'folder' => td_global::$get_template_directory . '/includes/demos/blog/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/blog/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_classic_blog/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'college' => array(
                'text' => 'College News',
                'folder' => td_global::$get_template_directory . '/includes/demos/college/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/college/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_college/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
		   		  'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
            'cars' => array(
                'text' => 'Car Enthusiast',
                'folder' => td_global::$get_template_directory . '/includes/demos/cars/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/cars/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_cars/',
                'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
	            'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
		    'health' => array(
			    'text' => 'Health & Fitness',
			    'folder' => td_global::$get_template_directory . '/includes/demos/health/',
			    'img' => td_global::$get_template_directory_uri . '/includes/demos/health/screenshot.png',
			    'demo_url' => 'https://demo.tagdiv.com/newspaper_health/',
			    'td_css_generator_demo' => true,                // must have a td_css_generator_demo.php in demo's folder
			    'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
		    ),
		    'video' => array(
			    'text' => 'Video News',
			    'folder' => td_global::$get_template_directory . '/includes/demos/video/',
			    'img' => td_global::$get_template_directory_uri . '/includes/demos/video/screenshot.png',
			    'demo_url' => 'https://demo.tagdiv.com/newspaper_video/',
			    'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
			    'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
    	    ),
            'fashion' => array(
                'text' => 'Fashion',
                'folder' => td_global::$get_template_directory . '/includes/demos/fashion/',
                'img' => td_global::$get_template_directory_uri . '/includes/demos/fashion/screenshot.png',
                'demo_url' => 'https://demo.tagdiv.com/newspaper_fashion/',
                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
                'uses_custom_style_css' => true                // load a custom demo_style.less - must also be added to td_less_style.css.php
            ),
//            'life_news' => array(
//                'text' => 'Life News PRO',
//                'folder' => td_global::$get_template_directory . '/includes/demos/life_news/',
//                'img' => td_global::$get_template_directory_uri . '/includes/demos/life_news/screenshot.png',
//                'demo_url' => 'https://demo.tagdiv.com/newspaper_life_news/',
//                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
//                'uses_custom_style_css' => false,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
//                'required_plugins' => array(                     // required plugins for the demo to work properly
//                    'tagDiv Composer',
//                    'tagDiv Cloud Library',
//                ),
//            ),
//            'video_pro' => array(
//                'text' => 'Video News Pro',
//                'folder' => td_global::$get_template_directory . '/includes/demos/video_pro/',
//                'img' => td_global::$get_template_directory_uri . '/includes/demos/video_pro/screenshot.png',
//                'demo_url' => 'https://demo.tagdiv.com/newspaper_video_pro/',
//                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
//                'uses_custom_style_css' => false,                // load a custom demo_style.less - must also be added to td_less_style.css.php
//                'required_plugins' => array(                    // required plugins for the demo to work properly
//                    'tagDiv Composer',
//                    'tagDiv Cloud Library',
//                ),
//            ),
//            'influencer' => array(
//                'text' => 'Influencer',
//                'folder' => td_global::$get_template_directory . '/includes/demos/influencer/',
//                'img' => td_global::$get_template_directory_uri . '/includes/demos/influencer/screenshot.png',
//                'demo_url' => 'https://demo.tagdiv.com/newspaper_influencer/',
//                'td_css_generator_demo' => false,                // must have a td_css_generator_demo.php in demo's folder
//                'uses_custom_style_css' => true,                 // load a custom demo_style.less - must also be added to td_less_style.css.php
//                'required_plugins' => array(                     // required plugins for the demo to work properly
//                    'tagDiv Composer',
//                    'tagDiv Cloud Library',
//                ),
//            ),
	    );

	    /**
	     * plugins
	     */
	    td_global::$theme_plugins_for_info_list = array (
		    array (
			    'name' => 'Revolution Slider',
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/rev-slider.png',
			    'text' => 'Build amazing slide presentations for your website with ease<br><a href="http://forum.tagdiv.com/how-to-install-revolution-slider-v5/" target="_blank">How to install v5</a>',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'slug' => 'revslider'
		    ),
		    array(

			    'name' => 'WPBakery Page Builder',
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/visual-composer.png',
			    'text' => 'Customize your pages and posts with this popular page builder<br><a href="https://forum.tagdiv.com/how-to-use-visual-composer/" target="_blank">Read more</a>',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'slug' => 'td-mobile-plugin'
		    )
	    );

	    td_global::$theme_plugins_list = array(
		    array(
			    'name' => 'tagDiv Composer', // The plugin name
			    'slug' => 'td-composer', // The plugin slug (typically the folder name)
			    'source' => td_global::$get_template_directory_uri . '/includes/plugins/td-composer.zip?uid=' . uniqid(), // The plugin source
			    'required' => true, // If false, the plugin is only 'recommended' instead of required
			    'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			    'external_url' => '', // If set, overrides default API URL and points to an external URL
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/td-composer.png',
			    'text' => 'Create your entire site on frontend with the Best drag&drop Page Builder<br><a href="https://tagdiv.com/tagdiv-composer-page-builder-basics/" target="_blank">Read more</a>',
			    'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
			    'td_activate' => false, // custom field used to activate the plugin
			    'td_install' => false, // custom field used to install the plugin
			    'td_class' => 'tdc_config', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
		    ),
		    array(
			    'name' => 'tagDiv Cloud Library', // The plugin name
			    'slug' => 'td-cloud-library', // The plugin slug (typically the folder name)
			    'source' => td_global::$get_template_directory_uri . '/includes/plugins/td-cloud-library.zip?uid=' . uniqid(), // The plugin source
			    'required' => true, // If false, the plugin is only 'recommended' instead of required
			    'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			    'external_url' => '', // If set, overrides default API URL and points to an external URL
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/cloud-templates.jpg',
			    'text' => 'Cut your design time in half with this huge collection of pre-made templates',
			    'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
			    'td_activate' => false, // custom field used to activate the plugin
			    'td_install' => false, // custom field used to install the plugin
			    'td_class' => 'tdb_version_check', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
		    ),
		    array(
			    'name' => 'tagDiv Social Counter', // The plugin name
			    'slug' => 'td-social-counter', // The plugin slug (typically the folder name)
			    'source' => td_global::$get_template_directory_uri . '/includes/plugins/td-social-counter.zip?uid=' . uniqid(), // The plugin source
			    'required' => true, // If false, the plugin is only 'recommended' instead of required
			    'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			    'external_url' => '', // If set, overrides default API URL and points to an external URL
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/social.png',
			    'text' => 'Display your activity on social networks with style using this cool feature<br><a href="http://forum.tagdiv.com/tagdiv-social-counter-tutorial/" target="_blank">Read more</a>',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'td_activate' => false, // custom field used to activate the plugin
			    'td_install' => false, // custom field used to install the plugin
			    'td_class' => 'td_social_counter_plugin', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
		    ),
		    array(
			    'name' => 'tagDiv Newsletter', // The plugin name
			    'slug' => 'td-newsletter', // The plugin slug (typically the folder name)
			    'source' => td_global::$get_template_directory_uri . '/includes/plugins/td-newsletter.zip?uid=' . uniqid(), // The plugin source
			    'required' => false, // If false, the plugin is only 'recommended' instead of required
			    'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			    'external_url' => '', // If set, overrides default API URL and points to an external URL
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/tagdiv-newsletter.png',
			    'text' => 'tagDiv\'s Newsletter plugin, beautifully designed with over 8 styles',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'td_activate' => false, // custom field used to activate the plugin
			    'td_install' => false, // custom field used to install the plugin
			    'td_class' => 'td_newsletter_version_check', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
		    ),
		    array(
			    'name' => 'tagDiv Mobile Theme', // The plugin name
			    'slug' => 'td-mobile-plugin', // The plugin slug (typically the folder name)
			    'source' => td_global::$get_template_directory_uri . '/includes/plugins/td-mobile-plugin.zip?uid=' . uniqid(), // The plugin source
			    'required' => false, // If false, the plugin is only 'recommended' instead of required
			    'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			    'external_url' => '', // If set, overrides default API URL and points to an external URL
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/mobile.png',
			    'text' => 'Make your website lighter and faster on all mobile devices<br><a href="http://forum.tagdiv.com/the-mobile-theme/" target="_blank">Read more</a>',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'td_activate' => false, // custom field used to activate the plugin
			    'td_install' => false, // custom field used to install the plugin
			    'td_class' => 'td_mobile_theme', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
		    ),
		    array(
			    'name' => 'Official AMP for WP', // The plugin name
			    'slug' => 'amp', // The plugin slug (typically the folder name)
			    'required' => false, // If false, the plugin is only 'recommended' instead of required
			    'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			    'img' => td_global::$get_template_directory_uri . '/includes/wp_booster/wp-admin/images/plugins/tagdiv-amp.png',
			    'text' => 'Mobile Theme requires the AMP plugin to give your site the best results<br><a href="https://tagdiv.com/amp-newspaper-theme/" target="_blank">Read more</a>',
			    'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
			    'td_class' => 'AMP_Autoloader', // class used to recognize the plugin is activated
			    'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
		    )
	    );


        /*
         * it doesn't require the tagDiv Composer plugin
         */
        td_api_features::set('require_vc', false);
        //td_api_features::set('require_td_composer', true);

        // disable activation/demos/panel/updates check if just theme without composer..
        if ( ! defined('TD_COMPOSER' ) ) {

	        add_action( 'admin_enqueue_scripts', function() {
				$custom_css = "
					#adminmenu a[href*=\"td_cake_panel\"],
	                #adminmenu a[href*=\"td_theme_demos\"],
	                #adminmenu a[href*=\"td_theme_panel\"],
	                .nav-tab-wrapper a[href*=\"td_cake_panel\"],
	                .nav-tab-wrapper a[href*=\"td_theme_demos\"],
	                .nav-tab-wrapper a[href*=\"td_theme_panel\"] {
	                    display: none
	                }";
                wp_add_inline_style( 'td-wp-admin-td-panel-2', $custom_css );
	        }, 11);
        }

        if ( is_admin() ) {

            /**
             * generate the theme panel
             */
            td_global::$all_theme_panels_list =  array (
                'theme_panel' => array (
                    'title' => TD_THEME_NAME . ' - Theme panel',
                    'subtitle' => 'version: ' . TD_THEME_VERSION,
                    'panels' => array (
                        'td-panel-header' => array(
                            'text' => 'HEADER',
                            'ico_class' => 'td-ico-header',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_header.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-footer' => array(
                            'text' => 'FOOTER',
                            'ico_class' => 'td-ico-footer',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_footer.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-ads' => array(
                            'text' => 'ADS',
                            'ico_class' => 'td-ico-ads',
                            'file' => td_global::$get_template_directory . '/includes/panel/views/td_panel_ads.php',
                            'type' => 'in_theme'
                        ),

                        /*  ----------------------------------------------------------------------------
                            layout settings
                         */
                        'td-panel-separator-1' => array(   // LAYOUT SETTINGS Separator
                            'text' => 'LAYOUT SETTINGS',
                            'type' => 'separator'
                        ),
                        'td-panel-template-settings' => array(
                            'text' => 'TEMPLATE SETTINGS',
                            'ico_class' => 'td-ico-template',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_template_settings.php',
                            'type' => 'in_theme'
                        ),

                        'td-panel-categories' => array(
                            'text' => 'CATEGORIES',
                            'ico_class' => 'td-ico-categories',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_categories.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-post-settings' => array(
                            'text' => 'POST SETTINGS',
                            'ico_class' => 'td-ico-post',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_post_settings.php',
                            'type' => 'in_theme'
                        ),


                        /*  ----------------------------------------------------------------------------
                            misc
                         */
                        'td-panel-separator-2' => array( // MISC Separator
                            'text' => 'MISC',
                            'type' => 'separator'
                        ),
                        'td-panel-block-style' => array(
                            'text' => 'BLOCK SETTINGS',
                            'ico_class' => 'td-ico-block',
                            'file' => td_global::$get_template_directory . '/includes/panel/views/td_panel_block_settings.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-background' => array(
                            'text' => 'BACKGROUND',
                            'ico_class' => 'td-ico-background',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_background.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-excerpts' => array(
                            'text' => 'EXCERPTS',
                            'ico_class' => 'td-ico-excerpts',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_excerpts.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-translates' => array(
                            'text' => 'TRANSLATIONS',
                            'ico_class' => 'td-ico-translation',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_translations.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-theme-colors' => array(
                            'text' => 'THEME COLORS',
                            'ico_class' => 'td-ico-color',
                            'file' => td_global::$get_template_directory . '/includes/panel/views/td_panel_theme_colors.php',
                            'type' => 'in_theme'
                        ),

                        'td-panel-theme-fonts' => array(
                            'text' => 'THEME FONTS',
                            'ico_class' => 'td-ico-typography',
                            'file' => td_global::$get_template_directory . '/includes/panel/views/td_panel_theme_fonts.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-custom-code' => array(
                            'text' => 'CUSTOM CODE',
                            'ico_class' => 'td-ico-code',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_custom_code.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-analytics' => array(
                            'text' => 'ANALYTICS/JS CODES',
                            'ico_class' => 'td-ico-analytics',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_analytics.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-social-networks' => array(
                            'text' => 'SOCIAL NETWORKS',
                            'ico_class' => 'td-ico-social',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_social_networks.php',
                            'type' => 'in_theme'
                        ),
                        'td-panel-cpt-taxonomy' => array(
                            'text' => 'CPT &amp; TAXONOMY',
                            'ico_class' => 'td-ico-cpt',
                            'file' => td_global::$get_template_directory . '/includes/wp_booster/wp-admin/panel/views/td_panel_cpt_taxonomy.php',
                            'type' => 'in_theme'
                        ),
                        'td-link-1' => array( // MISC Separator
                            'text' => 'Import / export',
                            'url' => '?page=td_theme_panel&td_page=td_view_import_export_settings',
                            'type' => 'link'
                        )
                    )
                )
            );

	        /*
	         * the list with custom texts of the theme. admin texts
	         */
	        td_api_text::set('text_featured_video', '
	                <div class="td-wpa-info">Paste a video link from Youtube, Vimeo, Dailymotion, Facebook or Twitter it will be embedded in the post and the thumb used as the featured image of this post. <br/>You need to choose <strong>Video Format</strong> from above to use Featured Video.</div>
	                <div class="td-wpa-info"><strong>Notice:</strong> Use only with those post templates:
	                    <ul>
	                        <li>Post style default</li>
	                        <li>Post style 1</li>
	                        <li>Post style 2</li>
	                        <li>Post style 9</li>
	                        <li>Post style 10</li>
	                        <li>Post style 11</li>
	                    </ul>
	                    <ul>
	                        <li>Find more about this <a href="http://forum.tagdiv.com/featured-image-or-video/" target="_blank">feature</a></li>
	                    </ul>
	                </div>'
	        );

	        td_api_text::set('text_header_logo',
		        'Text logo for header Style 9, Style 10 and Style 11:'
	        );

	        td_api_text::set('text_header_logo_description',
		        'The text logo is used only by Style 9, Style 10 and Style 11 - full menu + text logo. The other header styles use only images for logos'
	        );

	        td_api_text::set('text_header_logo_mobile',
		        'Style 4, Style 5, Style 6, Style 7, Style 8 or Style 12'
	        );

	        td_api_text::set('text_header_logo_mobile_image',
		        '140 x 48px'
	        );

	        td_api_text::set('text_header_logo_mobile_image_retina',
		        '280 x 96px'
	        );

	        td_api_text::set('text_smart_sidebar_widget_support', '
                <p>From here you can enable and disable the smart sidebar on all the templates. The smart sidebar is an affix (sticky) sidebar that has auto resize and it scrolls with the content. The smart sidebar reverts back to a normal sidebar on iOS (iPad) and on mobile devices. The following widgets are not supported in the smart sidebar:</p>
                <ul>
                    <li>[tagDiv] Trending now</li>
                </ul>
            ');

            td_api_text::set('welcome_fast_start', 'The theme will try to install <strong>tagDiv Composer</strong> and <strong>tagDiv Social Counter</strong> plugins automatically. But you can also manually manage the plugins from our <a href="admin.php?page=td_theme_plugins">plugins panel</a>');

            td_api_text::set('welcome_support_forum', '
            <h2>Support forum</h2>
            <p>We offer outstanding support through our forum. To get support first you need to register (create an account) and open a thread in the ' . TD_THEME_NAME . ' Section.</p>
            <a class="button button-primary" href="http://forum.tagdiv.com/" target="_blank">Open forum</a>'
            );

            td_api_text::set('welcome_docs', '
            <h2>Docs and learning</h2>
            <p>Our online documentation will give you important information about the theme. This is a exceptional resource to start discovering the theme’s true potential.</p>
            <a class="button button-primary" href="https://tagdiv.com/category/documentation/" target="_blank">Open documentation</a>'
            );

            td_api_text::set('welcome_video_tutorials', '
            <h2>Video tutorials</h2>
            <p>We believe that the easiest way to learn is watching a video tutorial. We have a growing library of narrated video tutorials to help you do just that.</p>
            <a class="button button-primary" href="https://www.youtube.com/user/tagdiv" target="_blank">View tutorials</a>'
            );


            /**
             * the tiny mce image style list
             */
            td_global::$tiny_mce_image_style_list = array(
                'td_zoom_in_image_effect' => array(
                    'text' => 'Center Full Width',
                    'class' => 'td-center'
                )
            );

        }




        add_action('after_setup_theme', function() {
		   global $td_translation_map;

			$td_translation_map = array(
			    //top bar
			    'Tel:' => __('Tel:', 'newspaper'),
			    'Email:' => __('Email:', 'newspaper'),

			    //header search
			    'View all results' => __('View all results', 'newspaper'),
			    'No results' => __('No results', 'newspaper'),

			    'Home' => __('Home', 'newspaper'),

			    //mobile menu
			    'CLOSE' => __('CLOSE', 'newspaper'),

			    //title tag
			    'Page' => __('Page', 'newspaper'),


			    //blocks
			    'All' => __('All', 'newspaper'),
			    'By' => __('By', 'newspaper'),
			    'Load more' => __('Load more', 'newspaper'),
			    'Modified date:' => __('Modified date:', 'newspaper'),

			    //breadcrumbs
			    'View all posts in' => __('View all posts in', 'newspaper'),
			    'Tags' => __('Tags', 'newspaper'),

			    //article / page
			    'Previous article' => __('Previous article', 'newspaper'),
			    'Next article' => __('Next article', 'newspaper'),
			    'Authors' => __('Authors', 'newspaper'),
			    'Author' => __('Author', 'newspaper'),
			    'RELATED ARTICLES' => __('RELATED ARTICLES', 'newspaper'),   //on newspaper 4 it was: SIMILAR ARTICLES
			    'MORE FROM AUTHOR' => __('MORE FROM AUTHOR', 'newspaper'),
			    'VIA' => __('VIA', 'newspaper'),   //on newspaper4 it was lowercase
			    'SOURCE' => __('SOURCE', 'newspaper'), //on newspaper4 it was lowercase
			    'TAGS' => __('TAGS', 'newspaper'),
			    'Share' => __('Share', 'newspaper'),
			    'SHARE' => __('SHARE', 'newspaper'),
			    'Continue' => __('Continue', 'newspaper'),
			    'Read more' => __('Read more', 'newspaper'),
			    'views' => __('views', 'newspaper'),


			    //comments
			    'Name:' => __('Name:', 'newspaper'),
			    'Email:' => __('Email:', 'newspaper'),
			    'Website:' => __('Website:', 'newspaper'),
			    'Comment:' => __('Comment:', 'newspaper'),
			    'LEAVE A REPLY' => __('LEAVE A REPLY', 'newspaper'),  //on newspaper4 it was lowercase
			    'Post Comment' => __('Post Comment', 'newspaper'),
			    'Cancel reply' => __('Cancel reply', 'newspaper'),
			    'Reply' => __('Reply', 'newspaper'),
			    'Log in to leave a comment' => __('Log in to leave a comment', 'newspaper'),
			    'NO COMMENTS' => __('NO COMMENTS', 'newspaper'),
			    '1 COMMENT' => __('1 COMMENT', 'newspaper'),
			    'COMMENTS' => __('COMMENTS', 'newspaper'),
			    'Your comment is awaiting moderation' => __('Your comment is awaiting moderation', 'newspaper'),
			    'Please enter your name here' => __('Please enter your name here', 'newspaper'),
			    'Please enter your email address here' => __('Please enter your email address here', 'newspaper'),
			    'You have entered an incorrect email address!' => __('You have entered an incorrect email address!', 'newspaper'),
			    'Please enter your comment!' => __('Please enter your comment!', 'newspaper'),
			    'Logged in as'                        => __('Logged in as', 'newspaper'),
			    'Log out?'                            => __('Log out?', 'newspaper'),
			    'Logged in as %s. Edit your profile.' => __('Logged in as %s. Edit your profile.', 'newspaper'),
			    'Edit' => __('Edit', 'newspaper'),


			    //review
			    'REVIEW OVERVIEW' => __('REVIEW OVERVIEW', 'newspaper'),  //on newspaper4 it was lowercase
			    'SUMMARY' => __('SUMMARY', 'newspaper'),  //on newspaper4 it was lowercase
			    'OVERALL SCORE' => __('OVERALL SCORE', 'newspaper'),

			    //404
			    'Ooops... Error 404' => __('Ooops... Error 404', 'newspaper'),
			    "Sorry, but the page you are looking for doesn_t exist." => __("Sorry, but the page you are looking for doesn't exist.", 'newspaper'),
			    'You can go to the' => __('You can go to the', 'newspaper'),
			    'HOMEPAGE' => __('HOMEPAGE', 'newspaper'),


			    'OUR LATEST POSTS' => __('OUR LATEST POSTS', 'newspaper'),

			    //author page title atribute
			    'Posts by' => __('Posts by', 'newspaper'),
			    'POSTS' => __('POSTS', 'newspaper'),


			    'Posts tagged with' => __('Posts tagged with', 'newspaper'),
			    'Tag' => __('Tag', 'newspaper'),

			    //archives
			    'Daily Archives:' => __('Daily Archives:', 'newspaper'),
			    'Monthly Archives:' => __('Monthly Archives:', 'newspaper'),
			    'Yearly Archives:' => __('Yearly Archives:', 'newspaper'),
			    'Archives' => __('Archives', 'newspaper'),


			    //homepage
			    'LATEST ARTICLES' => __('LATEST ARTICLES', 'newspaper'),

			    //search page
			    'search results' => __('search results', 'newspaper'),
			    'Search' => __('Search', 'newspaper'),
			    "If you_re not happy with the results, please do another search" => __("If you're not happy with the results, please do another search", 'newspaper'),

			    //footer widget
			    'Contact us' => __('Contact us', 'newspaper'),

			    //footer instagram
			    'Follow us on Instagram' => __('Follow us on Instagram', 'newspaper'),

			    //pagination
			    'Page %CURRENT_PAGE% of %TOTAL_PAGES%' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%', 'newspaper'),
			    'Next' => __('Next', 'newspaper'),
			    'Prev' => __('Prev', 'newspaper'),
			    'Back' => __('Back', 'newspaper'),


			    'No results for your search' => __('No results for your search', 'newspaper'),
			    'No posts to display' => __('No posts to display', 'newspaper'),

			    //modal window
			    'LOG IN'  => __('LOG IN', 'newspaper'),
			    'Sign in / Join'  => __('Sign in / Join', 'newspaper'),
			    'Sign in' => __('Sign in', 'newspaper'),
			    'Sign up' => __('Sign up', 'newspaper'),
			    'Join' => __('Join', 'newspaper'),
			    'Log In'  => __('Log In', 'newspaper'),
			    'Login'  => __('Login', 'newspaper'),
			    'REGISTER'  => __('REGISTER', 'newspaper'),
			    'Welcome!' => __('Welcome!', 'newspaper'),
			    'Log into your account' => __('Log into your account', 'newspaper'),
			    'Password recovery' => __('Password recovery', 'newspaper'),
			    'Send My Pass'  => __('Send My Pass', 'newspaper'),
			    'Send My Password'  => __('Send My Password', 'newspaper'),
			    'Forgot your password?'  => __('Forgot your password?', 'newspaper'),
			    'Forgot your password? Get help'  => __('Forgot your password? Get help', 'newspaper'),
			    'Create an account'  => __('Create an account', 'newspaper'),
			    'Please wait...'  => __('Please wait...', 'newspaper'),
			    'User or password incorrect!'  => __('User or password incorrect!', 'newspaper'),
			    'Email or username incorrect!'  => __('Email or username incorrect!', 'newspaper'),
			    'Email incorrect!'  => __('Email incorrect!', 'newspaper'),
			    'User or email already exists!'  => __('User or email already exists!', 'newspaper'),
			    'Please check your email (inbox or spam folder), the password was sent there.'  => __('Please check your email (inbox or spam folder), the password was sent there.', 'newspaper'),
			    'Email address not found!'  => __('Email address not found!', 'newspaper'),
			    'Your password is reset, check your email.'  => __('Your password is reset, check your email.', 'newspaper'),
			    'Welcome! Log into your account' => __('Welcome! Log into your account', 'newspaper'),
			    'Welcome! Register for an account' => __('Welcome! Register for an account', 'newspaper'),
			    'Register for an account' => __('Register for an account', 'newspaper'),
			    'Recover your password' => __('Recover your password', 'newspaper'),
			    'your username' => __('your username', 'newspaper'),
			    'your password' => __('your password', 'newspaper'),
			    'your email' => __('your email', 'newspaper'),
			    'A password will be e-mailed to you.' => __('A password will be e-mailed to you.', 'newspaper'),
			    'Logout' => __('Logout', 'newspaper'),

			    //social counters
			    'Like' => __('Like', 'newspaper'),
			    'Likes' => __('Likes', 'newspaper'),
			    'Fans' => __('Fans', 'newspaper'),
			    'Follow' => __('Follow', 'newspaper'),
			    'Followers' => __('Followers', 'newspaper'),
			    'Subscribe' => __('Subscribe', 'newspaper'),
			    'Subscribers' => __('Subscribers', 'newspaper'),

			    //more article box
			    'MORE STORIES' => __('MORE STORIES', 'newspaper'),

			    //filter drop down options on category page
			    'Latest' => __('Latest', 'newspaper'),
			    'Featured posts' => __('Featured posts', 'newspaper'),
			    'Most popular' => __('Most popular', 'newspaper'),
			    '7 days popular' => __('7 days popular', 'newspaper'),
			    'By review score' => __('By review score', 'newspaper'),
			    'Random' => __('Random', 'newspaper'),

			    'Trending Now' => __('Trending Now', 'newspaper'),

			    //used in Popular Category widget (td_block_popular_categories.php file)
			    'POPULAR CATEGORY' => __('POPULAR CATEGORY', 'newspaper'),
			    'POPULAR POSTS' => __('POPULAR POSTS', 'newspaper'),
			    'EDITOR PICKS' => __('EDITOR PICKS', 'newspaper'),
			    'ABOUT US' => __('ABOUT US', 'newspaper'),
			    'About me' => __('About me', 'newspaper'),
			    'FOLLOW US' => __('FOLLOW US', 'newspaper'),
			    'EVEN MORE NEWS' => __('EVEN MORE NEWS', 'newspaper'),


			    //magnific popup
			    'Previous (Left arrow key)' => __('Previous (Left arrow key)', 'newspaper'),
			    'Next (Right arrow key)' => __('Next (Right arrow key)', 'newspaper'),
			    '%curr% of %total%' => __('%curr% of %total%', 'newspaper'),
			    'The content from %url% could not be loaded.' => __('The content from %url% could not be loaded.', 'newspaper'),
			    'The image #%curr% could not be loaded.' => __('The image #%curr% could not be loaded.', 'newspaper'),

			    //blog
			    'Blog' => __('Blog', 'newspaper'),
			    'Share on Facebook' => __('Share on Facebook', 'newspaper'),
			    'Tweet on Twitter' => __('Tweet on Twitter', 'newspaper'),

			    'Featured' => __('Featured', 'newspaper'),
			    'All time popular' => __('All time popular', 'newspaper'),

			    'More' => __('More', 'newspaper'),
			    'Register' => __('Register', 'newspaper'),

			    'of' => __('of', 'newspaper'),

			    //exchange currencies
			    'Euro Member Countries' => __('Euro Member Countries', 'newspaper'),
			    'Australian Dollar' => __('Australian Dollar', 'newspaper'),
			    'Bulgarian Lev' => __('Bulgarian Lev', 'newspaper'),
			    'Brazilian Real' => __('Brazilian Real', 'newspaper'),
			    'Canadian Dollar' => __('Canadian Dollar', 'newspaper'),
			    'Swiss Franc' => __('Swiss Franc', 'newspaper'),
			    'Chinese Yuan Renminbi' => __('Chinese Yuan Renminbi', 'newspaper'),
			    'Czech Republic Koruna' => __('Czech Republic Koruna', 'newspaper'),
			    'Danish Krone' => __('Danish Krone', 'newspaper'),
			    'British Pound' => __('British Pound', 'newspaper'),
			    'Hong Kong Dollar' => __('Hong Kong Dollar', 'newspaper'),
			    'Croatian Kuna' => __('Croatian Kuna', 'newspaper'),
			    'Hungarian Forint' => __('Hungarian Forint', 'newspaper'),
			    'Indonesian Rupiah' => __('Indonesian Rupiah', 'newspaper'),
			    'Israeli Shekel' => __('Israeli Shekel', 'newspaper'),
			    'Indian Rupee' => __('Indian Rupee', 'newspaper'),
			    'Japanese Yen' => __('Japanese Yen', 'newspaper'),
			    'Korean (South) Won' => __('Korean (South) Won', 'newspaper'),
			    'Mexican Peso' => __('Mexican Peso', 'newspaper'),
			    'Malaysian Ringgit' => __('Malaysian Ringgit', 'newspaper'),
			    'Norwegian Krone' => __('Norwegian Krone', 'newspaper'),
			    'New Zealand Dollar' => __('New Zealand Dollar', 'newspaper'),
			    'Philippine Peso' => __('Philippine Peso', 'newspaper'),
			    'Polish Zloty' => __('Polish Zloty', 'newspaper'),
			    'Romanian (New) Leu' => __('Romanian (New) Leu', 'newspaper'),
			    'Russian Ruble' => __('Russian Ruble', 'newspaper'),
			    'Swedish Krona' => __('Swedish Krona', 'newspaper'),
			    'Singapore Dollar' => __('Singapore Dollar', 'newspaper'),
			    'Thai Baht' => __('Thai Baht', 'newspaper'),
			    'Turkish Lira' => __('Turkish Lira', 'newspaper'),
			    'United States Dollar' => __('United States Dollar', 'newspaper'),
			    'South African Rand' => __('South African Rand', 'newspaper'),


			    'Save my name, email, and website in this browser for the next time I comment.' => __('Save my name, email, and website in this browser for the next time I comment.', 'newspaper'),
			    'Privacy Policy' => 'Privacy Policy',

			);
		}, 11);

    }

    /**
     * This array is used to add the custom_title and custom_url of the block, it also loads the atts from the current global td_block_template
     * on visual composer we remove the block_template_id att in the UI @see td_vc_edit_form_fields_after_render
     * @return array
     */
    static function get_map_block_general_array() {
        $map_block_general_array = array();

        $map_block_general_array[] = array(
            "param_name" => "separator",
            "type"       => "text_separator",
            'heading'    => 'Header settings',
            "value"      => "",
            "class"      => "",
        );
        $map_block_general_array[] = array(
            "param_name" => "custom_title",
            "type" => "textfield",
            "value" => "",
            "heading" => 'Custom title:',
            "description" => "Optional - a title for this block, if you leave it blank the block will not have a title",
            "holder" => "div",
            "class" => "tdc-textfield-extrabig",
        );
        $map_block_general_array[] = array(
            "param_name" => "custom_url",
            "type" => "textfield",
            "value" => "",
            "heading" => 'Title url:',
            "description" => "Optional - a custom url when the block title is clicked",
            "holder" => "div",
            "class" => "tdc-textfield-extrabig",
        );
        $map_block_general_array[] = array(
            "param_name" => "separator",
            "type"       => "horizontal_separator",
            "value"      => "",
            "class"      => "tdc-separator-small",
        );
        $map_block_general_array[] = array(
            "param_name" => "block_template_id",
            "type" => "dropdown",
            "value" => td_util::get_block_template_ids(),
            "heading" => 'Header template:',
            "description" => "Header template used by the current block",
            "holder" => "div",
            "class" => "tdc-dropdown-big"
        );

        return $map_block_general_array;
    }

}
