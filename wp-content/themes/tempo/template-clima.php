<?php
/*
Template Name: Visualização de Clima
*/
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/'));
}

get_header();
get_template_part('modal'); 
echo do_shortcode('[openweathermap]');
get_footer(); 

