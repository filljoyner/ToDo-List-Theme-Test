<?php if(have_posts()): ?>

    <?php while(have_posts()): the_post(); ?>
        <?php visual()->partial('post/content')->render(); ?>
    <?php endwhile; ?>

<?php endif; ?>
