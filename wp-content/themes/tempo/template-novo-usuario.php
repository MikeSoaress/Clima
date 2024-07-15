<?php
/*
Template Name: Registro de Usuário
*/

get_header();
get_template_part('modal'); 

$username = $email = $password = $cep = $estado = $cidade = $bairro = $logradouro = $numero = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $cep = sanitize_text_field($_POST['cep']);
    $estado = sanitize_text_field($_POST['estado']);
    $cidade = sanitize_text_field($_POST['cidade']);
    $bairro = sanitize_text_field($_POST['bairro']);
    $logradouro = sanitize_text_field($_POST['logradouro']);
    $numero = sanitize_text_field($_POST['numero']);

    $errors = array();

    // Verificação de campos obrigatórios
    if (empty($username) || empty($email) || empty($password) ||
        empty($cep) || empty($estado) || empty($cidade) || empty($bairro) || empty($logradouro) || empty($numero)) {
        $errors[] = 'Todos os campos são obrigatórios.';
    }

    // Verificação do e-mail
    if (!is_email($email)) {
        $errors[] = 'Por favor, insira um endereço de e-mail válido.';
    }

    // Verificação de e-mail existente
    if (email_exists($email)) {
        $errors[] = 'Este e-mail já está registrado.';
    }

    if (empty($errors)) {
        // Dados do usuário
        $userdata = array(
            'user_login'    => $email,
            'user_email'    => $email,
            'user_pass'     => $password,
            'first_name'    => $username,
            'meta_input'    => array(
                'cep'           => $cep,
                'estado'        => $estado,
                'cidade'        => $cidade,
                'bairro'        => $bairro,
                'logradouro'    => $logradouro,
                'numero'        => $numero
            )
        );

        // Criação do usuário
        $user_id = wp_insert_user($userdata);

        if (is_wp_error($user_id)) {
            $errors[] = $user_id->get_error_message();
        } else {
            echo '<script type="text/javascript">',
            'document.addEventListener("DOMContentLoaded", function() {',
            '  exibeModalRedirecionamento(\'Cadastro realizado com sucesso. Clique em "Continuar" para fazer login.\', \'/clima/login\');',
            '});',
            '</script>';        }
    }

    if (!empty($errors)) {
        echo '<script type="text/javascript">',
        'document.addEventListener("DOMContentLoaded", function() {',
        '  exibeModalSimples("'. implode('<br>', $errors) . '");',
        '});',
        '</script>';    
    }
}



?>

<div class="container mt-5 mb-5" id="container-cadastro">
    <h4>Cadastro</h4>
    <form action="" method="post">
        <div class="row">
            <div class="col-12 separador">
                <span>Dados de acesso</span>
            </div>
            <div class="col-12 form-group">
                <label for="username">Nome</label>
                <input type="text" class="form-control obrigatorio" name="username" id="username" value="<?php echo esc_attr($username); ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control obrigatorio" name="email" id="email" value="<?php echo esc_attr($email); ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="password">Senha</label>
                <input type="password" class="form-control obrigatorio" name="password" id="password">
            </div>
            <div class="col-12 separador">
                <span>Dados de endereço</span>
            </div>
            <div class="form-group col-12 col-md-8">
                <label for="cep">CEP</label>
                <input type="text" class="form-control obrigatorio" name="cep" id="cep" value="<?php echo esc_attr($cep); ?>">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="estado">Estado</label>
                <select class="form-control obrigatorio" name="estado" id="estado">
                    <option value="">Selecione...</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control obrigatorio" name="cidade" id="cidade" value="<?php echo esc_attr($cidade); ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control obrigatorio" name="bairro" id="bairro" value="<?php echo esc_attr($bairro); ?>">
            </div>  
            <div class="form-group col-12 col-md-9">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control obrigatorio" name="logradouro" id="logradouro" value="<?php echo esc_attr($logradouro); ?>">
            </div>
            <div class="form-group col-12 col-md-3">
                <label for="numero">Número</label>
                <input type="text" class="form-control obrigatorio" name="numero" id="numero" value="<?php echo esc_attr($numero); ?>">
            </div>
            <div class="col-12 text-center d-none" id="msg_alerta">
                <span style="padding: 5px 20px;color: red;">Preencha os campos em destaque!</span>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary" onclick="return validarCampos('obrigatorio','msg_alerta')">Cadastrar</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var estadoSelecionado = '<?php echo $estado; ?>';
        var selectEstado = document.getElementById('estado');
        selectEstado.value = estadoSelecionado;
    });
</script>

<?php get_footer(); ?>
