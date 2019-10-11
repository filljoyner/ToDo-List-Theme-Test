<?php

if (!is_active_sidebar('main-side')) {
    return;
}
?>

<aside id="sidebar" role="complementary" aria-label="Site Sidebar">
    <?php dynamic_sidebar('main-side'); ?>
</aside>