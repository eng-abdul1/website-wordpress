<?php

class td_module_14 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();

        $title_length = $this->get_shortcode_att('m14_tl');
        $excerpt_length = $this->get_shortcode_att('m14_el');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        ?>

        <div class="<?php echo $this->get_module_classes();?>">
            <div class="meta-info-container">
                <?php echo $this->get_image('td_681x0');?>
                <div class="meta-info">
                    <?php echo $this->get_title($title_length);?>
                    <?php if (td_util::get_option('tds_category_module_14') == 'yes') { echo $this->get_category(); }?>
                    <?php echo $this->get_author();?>
                    <?php echo $this->get_date($modified_date);?>
                    <?php echo $this->get_comments();?>
                </div>
            </div>

            <div class="td-excerpt">
                <?php echo $this->get_excerpt($excerpt_length);?>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}