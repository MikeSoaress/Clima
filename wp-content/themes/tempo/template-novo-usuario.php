<?php
/*
Template Name: Registro de Usuário
*/

get_header();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = array();

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = 'Todos os campos são obrigatórios.';
    }

    if (!is_email($email)) {
        $errors[] = 'Por favor, insira um endereço de e-mail válido.';
    }

    if (email_exists($email)) {
        $errors[] = 'Este e-mail já está registrado.';
    }

    if (username_exists($username)) {
        $errors[] = 'Este nome de usuário já está em uso.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'As senhas não coincidem.';
    }

    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            $errors[] = $user_id->get_error_message();
        } else {
            echo '<div class="alert alert-success">Cadastro realizado com sucesso.</div>';
        }
    }

    if (!empty($errors)) {
        echo '<div class="alert alert-danger">' . implode('<br>', $errors) . '</div>';
    }
}

?>

<div class="container mt-5 mb-5" style="padding: 2rem;box-shadow: 0px 0px 1px 0px black;border-radius: 13px;">
        <h4>Cadastro</h2>
        <form action="" method="post">
        <div class="row">

                <div class="col-12" style="    border-bottom: solid 2px #d0d0d0; margin-bottom:10px">
                    <span >Dados de acesso</span>
                </div>      
                <div class="col-12 form-group">
                    <label for="username">Nome</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="col-12" style="    border-bottom: solid 2px #d0d0d0; margin-bottom:10px">
                    <span>Dados de endereço</span>
                </div>
                <div class="form-group col-12 col-md-8">
                    <label for="cep">CEP</label>
                    <input type="number" class="form-control" name="cep" id="cep" required>
                </div> 
                <div class="form-group col-12 col-md-4">
                    <label for="estado">Estado</label>
                    <input type="number" class="form-control" name="estado" id="estado" required>
                </div>  
                <div class="form-group col-12 col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="number" class="form-control" name="cidade" id="cidade" required>
                </div>   
                <div class="form-group col-12 col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="number" class="form-control" name="bairro" id="bairro" required>
                </div>
                <div class="form-group col-12 col-md-9">
                    <label for="logradouro">Logradouro</label>
                    <input type="number" class="form-control" name="logradouro" id="logradouro" required>
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="cep">Número</label>
                    <input type="number" class="form-control" name="cep" id="cep" required>
                </div>  
                <div class="col-12 text-center">           
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
</div>

<?php get_footer(); ?>