<?php
class td_module_mx4 extends td_module {
    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();

        $title_length = $this->get_shortcode_att('mx4_tl');
        ?>

        <div class="<?php echo $this->get_module_classes();?>">
            <div class="td-module-image">
                <?php echo $this->get_image('td_300x194'); ?>
                <?php if (td_util::get_option('tds_category_module_mx4') == 'yes') { echo $this->get_category(); }?>
            </div>

            <?php echo $this->get_title($title_length); ?>

            <div class="meta-info">
                <?php //echo $this->get_author();?>
                <?php //echo $this->get_date();?>
                <?php //echo $this->get_comments();?>
            </div>

            <?php echo $this->get_quotes_on_blocks(); ?>

        </div>

        <?php
        return ob_get_clean();
    }
}