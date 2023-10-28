<?php

/**
 * this module is similar to single
 * Class td_module_15
 */

class td_module_15 extends td_module_single_base {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();
        $title_length = $this->get_shortcode_att('m15_tl');
        ?>

        <div class="<?php echo esc_attr( $this->get_module_classes(array_merge(get_post_class())) ) ?> clearfix">
            <div class="item-details">
                <?php $this->show_title($title_length) ?>

                <div class="td-module-meta-info">
	                <?php if (td_util::get_option('tds_category_module_15') == 'yes') { $this->show_category(); }?>
                    <?php $this->show_author() ?>
                    <?php $this->show_date() ?>
                    <?php $this->show_comments() ?>
                </div>

                <?php $this->show_image('medium_large') ?>

	            <div class="td-post-text-content td-post-content">
		            <?php $this->show_content() ?>
	            </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}

?>