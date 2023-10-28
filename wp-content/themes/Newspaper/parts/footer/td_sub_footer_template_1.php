<div class="td-sub-footer-container td-container-wrap">
    <div class="td-container">
        <div class="td-pb-row">
            <div class="td-pb-span td-sub-footer-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class'=> 'td-subfooter-menu',
                    'fallback_cb' => 'td_wp_footer_menu'
                ));
                ?>
            </div>

            <div class="td-pb-span td-sub-footer-copy">
                &copy; Newspaper WordPress Theme by TagDiv
            </div>
        </div>
    </div>
</div>