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

$key = get_user_meta($current_user->ID, 'key', true);

// Obtém os dados do usuário atual
$current_user = wp_get_current_user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_POST['key'];
    $errors = array();

    // Verificação de campos obrigatórios
    if (empty($key)) {
        $errors[] = 'Chave Key é obrigatória';
    }

    if (empty($errors)) {
        // Dados do usuário
        $userdata = array(
            'ID' => $current_user->ID,
        );


        // Atualização do usuário
        $user_id = wp_update_user($userdata);

        if (is_wp_error($user_id)) {
            $errors[] = $user_id->get_error_message();
        } else {
            // Atualização dos meta-dados de endereço
            update_user_meta($current_user->ID, 'key', $key);

            echo '<script type="text/javascript">',
                'document.addEventListener("DOMContentLoaded", function() {',
                '  exibeModalSimples("Chave key atualizada com successo.");',
                '});',
                '</script>';
        }
    }

    if (!empty($errors)) {
        echo '<script type="text/javascript">',
            'document.addEventListener("DOMContentLoaded", function() {',
            '  exibeModalSimples("' . implode('<br>', $errors) . '");',
            '});',
            '</script>';
    }
}

?>
<form action="" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 form-group">
                <label for="key">API Key</label>
                <input type="text" class="form-control obrigatorio" name="key" id="key" value="<?php echo esc_attr($key); ?>">
            </div>
            <div class="col-12 text-center d-none" id="msg_alerta">
                <span style="padding: 5px 20px;color: red;">Informe a chave key.</span>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary"
                    onclick="return validarCampos('obrigatorio','msg_alerta')">Salvar</button>
            </div>
        </div>
    </div>
</form>

<?php get_footer(); ?>