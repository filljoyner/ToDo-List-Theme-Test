<?php if(have_posts()): ?>

    <?php while(have_posts()): the_post(); ?>
        <?php partial('post/content'); ?>
    <?php endwhile; ?>

<?php endif; ?>
