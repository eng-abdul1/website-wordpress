<?php

class td_module_mx2 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();
        $title_length = $this->get_shortcode_att('mx2_tl');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        ?>

        <div class="<?php echo esc_attr( $this->get_module_classes() ) ?> td-module-search-def">

            <?php $this->show_image('thumbnail') ?>

            <div class="item-details">
                <?php $this->show_title($title_length) ?>
                <div class="td-module-meta-info">
                    <?php if (td_util::get_option('tds_category_module_mx2') == 'yes') { $this->show_category(); }?>
                    <?php $this->show_date($modified_date) ?>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}