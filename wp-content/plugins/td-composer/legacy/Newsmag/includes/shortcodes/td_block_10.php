<?php

class td_block_10 extends td_block {

    static function cssMedia( $res_ctx ) {

        // fonts
        $res_ctx->load_font_settings( 'f_header' );
        $res_ctx->load_font_settings( 'f_ajax' );
        $res_ctx->load_font_settings( 'f_more' );

        // module 8 fonts
        $res_ctx->load_font_settings( 'm9f_title' );
        $res_ctx->load_font_settings( 'm9f_cat' );
        $res_ctx->load_font_settings( 'm9f_meta' );

    }

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid . '_rand';

        $compiled_css = '';

        $raw_css =
            "<style>

				/* @f_header */
				.$unique_block_class .block-title a,
				.$unique_block_class .block-title span {
					@f_header
				}
				/* @f_ajax */
				.$unique_block_class .td-pulldown-filter-link {
					@f_ajax
				}
				/* @f_more */
				.$unique_block_class .td-load-more-wrap a {
					@f_more
				}
				/* @m9f_title */
				.$unique_block_class .td_module_9 .entry-title {
					@m9f_title
				}
				/* @m9f_cat */
				.$unique_block_class .td_module_9 .td-post-category {
					@m9f_cat
				}
				/* @m9f_meta */
				.$unique_block_class .td_module_9 .meta-info,
				.$unique_block_class .td_module_9 .td-module-comments a {
					@m9f_meta
				}
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();

        return $compiled_css;
    }


    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        $buffy = '';


        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';



		    //get the block js
		    $buffy .= $this->get_block_css();

		    //get the js for this block
		    $buffy .= $this->get_block_js();


            //get the block title
            $buffy .= $this->get_block_title();

            //get the sub category filter for this block
            $buffy .= $this->get_pull_down_filter();

            $buffy .= '<div id=' . $this->block_uid . ' class="td_block_inner">';
                $buffy .= $this->inner($this->td_query->posts); //inner content of the block
            $buffy .= '</div>';

            //get the ajax pagination for this block
            $buffy .= $this->get_block_pagination();
        $buffy .= '</div> <!-- ./block -->';

        return $buffy;
    }

    function inner($posts, $td_column_number = '') {

        $buffy = '';

        $td_block_layout = new td_block_layout();
        if (empty($td_column_number)) {
            $td_column_number = td_global::vc_get_column_number(); // get the column width of the block from the page builder API
        }


        if (!empty($posts)) {
            foreach ($posts as $post) {
                $td_module_9 = new td_module_9($post, $this->get_all_atts());
                $buffy .= $td_module_9->render($post);
            }
        }
        $buffy .= $td_block_layout->close_all_tags();
        return $buffy;
    }
}
