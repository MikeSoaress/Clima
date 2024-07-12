<?php

// Adicionar suporte a miniaturas de postagens
add_theme_support('post-thumbnails');

// Registrar menus de navegação
function registrar_meus_menus() {
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'meu-tema'),
    ));
}
add_action('init', 'registrar_meus_menus');

// Enfileirar scripts e estilos
function adicionar_scripts_e_estilos() {
    // Enfileirar o estilo principal do tema
    wp_enqueue_style('meu-tema-style', get_stylesheet_uri());

    // Enfileirar o estilo do Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

    // Enfileirar o script do Bootstrap (certifique-se de que o jQuery é carregado primeiro)
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'adicionar_scripts_e_estilos');

?>