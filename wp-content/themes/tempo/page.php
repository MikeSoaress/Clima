<?php get_header(); ?>

<div class="container">
    <h1><?php the_title(); ?></h1>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>Desculpe, nenhuma página encontrada.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
