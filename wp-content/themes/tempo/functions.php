<?php

// Adicionar suporte a miniaturas de postagens
add_theme_support('post-thumbnails');

// Registrar menus de navegação
function registrar_meus_menus()
{
    register_nav_menus(
        array(
            'menu-principal' => __('Menu Principal', 'meu-tema'),
        )
    );
}

add_action('init', 'registrar_meus_menus');

// Enfileirar scripts e estilos
function adicionar_scripts_e_estilos()
{
    // Enfileirar o estilo principal do tema
    wp_enqueue_style('meu-tema-style', get_stylesheet_uri());

    //Enfileirar os estilos personalizados
    wp_enqueue_style('novo-usuario-css', get_template_directory_uri() . '/css/novo-usuario.css');
    wp_enqueue_style('login-css', get_template_directory_uri() . '/css/login.css');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css');

    // Enfileirar o estilo do Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

    // Enfileirar o script do Bootstrap
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery', 'popper-js'), null, true);
    
    // Scripts personalizados
    wp_enqueue_script('clima-js', get_template_directory_uri() . '/js/clima.js', array('jquery'), null, true);
    wp_enqueue_script('modal-js', get_template_directory_uri() . '/js/modal.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'adicionar_scripts_e_estilos');
add_action('wp_enqueue_scripts', 'adicionar_scripts_e_estilos');

if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}
