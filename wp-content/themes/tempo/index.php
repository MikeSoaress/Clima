<?php get_header(); ?>

<div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>Desculpe, nenhuma postagem encontrada.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>