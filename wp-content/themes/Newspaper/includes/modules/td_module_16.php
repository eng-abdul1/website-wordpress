<?php

/**
 * this module is similar to single
 * Class td_module_16
 */

class td_module_16 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();
        $title_length = $this->get_shortcode_att('m16_tl');
        $excerpt_length = $this->get_shortcode_att('m16_el');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        ?>

        <div class="<?php echo esc_attr( $this->get_module_classes() ) ?>">
            <?php $this->show_image('thumbnail') ?>

            <div class="item-details">
                <?php $this->show_title($title_length) ?>

                <div class="td-module-meta-info">
                    <?php if (td_util::get_option('tds_category_module_16') == 'yes') { $this->show_category(); }?>
                    <?php $this->show_author() ?>
                    <?php $this->show_date($modified_date) ?>
                    <?php $this->show_comments() ?>
                </div>

                <div class="td-excerpt">
                    <?php $this->show_excerpt($excerpt_length) ?>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }

}