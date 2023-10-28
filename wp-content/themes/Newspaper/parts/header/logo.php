<?php

    $td_logo_text = get_bloginfo('name');
    $td_tagline_text = get_bloginfo('description');

    // H1 on logo when there's no title with H1 in page
    $td_use_h1_logo = false;
    if (is_home()) {
        $td_use_h1_logo = true;
    } ?>

    <div class="td-logo-text-wrap">
        <div class="td-logo-text-container">
            <?php
                if($td_use_h1_logo === true) {
                    echo '<h1 class="td-logo">';
                };
                ?>
                <a class="td-logo-wrap" href="<?php echo esc_url(home_url( '/' )); ?>">
                    <span class="td-logo-text"><?php if(!$td_logo_text) { echo "NEWSPAPER"; } else { echo esc_attr($td_logo_text); } ?></span>
                </a>
                <?php
                if($td_use_h1_logo === true) {
                    echo '</h1>';
                };
            ?>
            <span class="td-tagline-text"><?php if(!$td_tagline_text) { echo "DISCOVER THE ART OF PUBLISHING"; } else { echo esc_attr($td_tagline_text); } ?></span>
        </div>
    </div>
<?php ?>