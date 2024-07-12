<?php
/*
Template Name: Login de Usuário
*/

get_header();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $password = $_POST['password'];

    $creds = array(
        'user_login' => $username,
        'user_password' => $password,
        'remember' => true,
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        echo '<div class="alert alert-danger">' . $user->get_error_message() . '</div>';
    } else {
        wp_redirect(home_url());
        exit;
    }
}

?>

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
            <button type="submit" class="btn btn-secondary">Entrar</button>
        </div>
    </form>
</div>

<?php get_footer(); ?>
