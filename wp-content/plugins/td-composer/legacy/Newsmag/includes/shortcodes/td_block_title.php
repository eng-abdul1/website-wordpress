<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 11.05.2017
 * Time: 10:04
 */

class td_block_title extends td_block {

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
				/* @align_center */
				.$unique_block_class {
					text-align: center;
				}
				/* @align_right */
				.$unique_block_class {
					text-align: right;
				}
				.$unique_block_class .block-title {
				    margin: 0 20px 20px 0;
				}
				@media (max-width: 1023px) and (min-width: 768px) {
				    .$unique_block_class .block-title {
                        margin: 0 17px 17px 0;
                    }
				}
				@media (max-width: 767px) {
				    .$unique_block_class .block-title {
                        margin: 0 10px 17px 0;
                    }
				}
				/* @align_left */
				.$unique_block_class .block-title {
					text-align: left;
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_header' );

        $content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
        if ( $content_align == 'content-horiz-center' ) {
            $res_ctx->load_settings_raw( 'align_center', 1 );
        } else if ( $content_align == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'align_right', 1 );
        } else if ( $content_align == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'align_left', 1 );
        }
    }

	/**
	 * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
	 */
	function __construct() {
		parent::disable_loop_block_features();
	}


    function render($atts, $content = null) {

	    if ( empty( $atts[ 'custom_title' ] ) ) {
			$atts['custom_title'] = 'Block title';
		}

        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query


		$buffy = '';
        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

            $buffy .= $this->get_block_title();
            $buffy .= '<div class="td_mod_wrap td-pb-padding-side">';

	    $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}