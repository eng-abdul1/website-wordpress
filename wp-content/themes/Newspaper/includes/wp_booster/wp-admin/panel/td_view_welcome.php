<?php
require_once "td_view_header.php";
?>

<div class="td-admin-wrap about-wrap">

    <div class="td-welcome-header">
        <div class="td-welcome-header-left">
            <h1>Welcome to <?php echo TD_THEME_NAME?> <div class="td-welcome-version">V <?php echo TD_THEME_VERSION?></div></h1>
            <div class="about-text">
                Thank you for choosing our theme! We’ve worked hard to release a great product, and we will do our absolute best to support this theme.
            </div>
        </div>

        <img src="<?php echo td_global::$get_template_directory_uri ?>/images/panel/admin-panel/logo-panel.png">
    </div>

    <?php
        $theme_setup = td_theme_plugins_setup::get_instance();
        $theme_setup->theme_plugins();
    ?>

    <h3><?php echo TD_THEME_NAME?> Theme is the best way to create remarkable content!</h3>
    <p>For more than five years, our primary goal was to make the theme naturally easy to use while giving you the power to create amazing experiences for your visitors. We'll be happy to receive your feedback and suggestions.</p>

    <div style="margin-top: 26px;">
        <div class="td-admin-box-text td-admin-box-three">
			<?php echo td_api_text::get('welcome_support_forum') ?>
        </div>
        <div class="td-admin-box-text td-admin-box-three">
			<?php echo td_api_text::get('welcome_docs') ?>
        </div>
        <div class="td-admin-box-text td-admin-box-three td-admin-box-last">
			<?php echo td_api_text::get('welcome_video_tutorials') ?>
        </div>
    </div>

</div>
