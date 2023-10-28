<?php if (td_util::get_option('tds_top_bar') != 'hide_top_bar') { ?>

    <div class="td-top-bar-container top-bar-style-3">
        <?php require_once('top-menu.php'); ?>
        <?php require_once('top-widget.php'); ?>
    </div>

<?php }
    require_once('td-login-modal.php');
?>