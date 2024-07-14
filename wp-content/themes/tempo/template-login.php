<?php
/*
Template Name: Login de Usuário
*/

// Verifica se o usuário está logado e faz logout
if (is_user_logged_in()) 
    wp_logout();


if (isset($_POST['login_submit'])) {
    // Coleta os dados do formulário
    $login_data = array(
        'user_login'    => $_POST['username'],
        'user_password' => $_POST['password'],
        'remember'      => true,  // Mantém o usuário logado por um período
    );

    // Tenta autenticar o usuário
    $user = wp_signon($login_data, false);

    // Verifica se o login foi bem-sucedido
    if (is_wp_error($user)) {
        // Ocorreu um erro durante o login
        $error_message = $user->get_error_message();
    } else {
        // Redireciona o usuário após o login bem-sucedido
        wp_redirect(home_url('/clima/home'));
        exit;
    }
}
    
get_header();
?>
<style>
    header
    {
        display : none !important;
    }
</style>
<div class="container mt-5" style="max-width: 500px;padding: 2rem;box-shadow: 0px 0px 1px 0px black;border-radius: 13px;">
    <h4 class="text-center">Login</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">E-mail</label>
            <input type="text" class="form-control" placeholder="E-mail" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" placeholder="Senha" name="password" id="password" required>
        </div>
        <div class="text-center">
            <button type="submit" name="login_submit" class="btn btn-primary">Entrar</button>
        </div>
    </form>
</div>

<?php get_footer(); ?>
