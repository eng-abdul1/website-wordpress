<?php

class td_block_text_with_title extends td_block {

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
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_font_settings( 'f_header' );

    }

    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query

        $buffy = '';
        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

            $buffy .= $this->get_block_title();
            $buffy .= '<div class="td_mod_wrap td-pb-padding-side td-fix-index">';
                //only run the filter if we have visual composer
                if (function_exists('wpb_js_remove_wpautop')) {
                    $buffy .= wpb_js_remove_wpautop($content);
                } else {
                    $buffy .= $content;   //no visual composer
                }
            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}