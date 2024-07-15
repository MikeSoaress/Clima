<?php
/*
Template Name: Configurações
*/


// Verifica se o usuário está logado
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/'));
}

get_header();
get_template_part('modal'); 

?>


<?php get_footer(); ?>