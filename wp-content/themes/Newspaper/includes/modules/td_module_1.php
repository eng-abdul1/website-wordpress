<?php

class td_module_1 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();
        $title_length = $this->get_shortcode_att('m1_tl');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        ?>

        <div class="<?php echo esc_attr( $this->get_module_classes() ) ?>">
            <div class="td-module-image">
                <?php $this->show_image('medium_large') ?>
                <?php if (td_util::get_option('tds_category_module_1') == 'yes') { $this->show_category(); }?>
            </div>
            <?php $this->show_title($title_length) ?>

            <div class="td-module-meta-info">
                <?php $this->show_author() ?>
                <?php $this->show_date($modified_date) ?>
                <?php $this->show_comments() ?>
            </div>

            <?php $this->show_quotes_on_blocks() ?>

        </div>

        <?php return ob_get_clean();
    }
}