<?php
/*
Plugin Name: Plugin OpenWeatherMap 
Description: Plugin responsável por exibir informações climaticas
Version: 1.0
Author: Mike Soares
*/

if (!defined('ABSPATH')) {
    exit;
}

function registrar_shortcode()
{
    add_shortcode('openweathermap', 'exibirClima');
}
add_action('init', 'registrar_shortcode');

function registrar_styles()
{
    $css_url = plugins_url('openweathermap.css', __FILE__);

    wp_enqueue_style('meu-plugin-styles', $css_url, array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'registrar_styles');

function exibirClima($atts)
{
    // Buscar dados do usuario logado
    $user_id = get_current_user_id();
    $city = get_the_author_meta('cidade', $user_id);
    $apikey = get_the_author_meta('key', $user_id);

    $dados_metereologicos = obterDadosMetereologicos($city, $apikey);

    //Verifica se existem erros
    if ($dados_metereologicos['cod'] == 404) {
        return '<script type="text/javascript">' .
            'document.addEventListener("DOMContentLoaded", function() {' .
            '  exibeModalRedirecionamento(\'Cidade não encontrada.  Clique em "Continuar" para verificar os dados de cadastro.\', \'/clima/edicao-usuario/\');' .
            '});' .
            '</script>';
    } else if ($dados_metereologicos['cod'] == 401) {
        return '<script type="text/javascript">' .
            'document.addEventListener("DOMContentLoaded", function() {' .
            '  exibeModalRedirecionamento(\'Api key invalída. Clique em "Continuar" para verificar os dados de cadastro.\', \'/clima/edicao-usuario/\');' .
            '});' .
            '</script>';
    }

    ob_start();
    renderizarTemplate($dados_metereologicos, $city);
    return ob_get_clean();
}

function obterDadosMetereologicos($city, $apikey)
{
    $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apikey}&units=metric";

    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return false;
    }

    return $data;
}

function renderizarTemplate($data , $city)
{
    //Captura informação de descrição do clima
    $current = $data['list'][0];
    $descricao_clima = $current['weather'][0]['description'];

    //Define icone do clima atual
    $imageFile = definirIcone($descricao_clima);
    $imagePath = get_template_directory_uri() . $imageFile;

    //Define imagem de fundo com base no clima atual
    $backgroundFile = definirFundo($descricao_clima);
    $backgroundPath = get_template_directory_uri() . $backgroundFile;
    alterarImagemFundo($backgroundPath);
    ?>

    <div class="container container-clima">
        <div class="row">
            <div class="col-12 text-center mb-4 titulo">
                <h4 class="text-center p-2">Clima atual</h4>
            </div>
            <div class="col-12 text-center mb-2">
                <h5><?php echo $city ?></h5>
            </div>
            <div class="col-12 text-center">
                <img class="icone-principal" src="<?php echo esc_url($imagePath); ?>">
            </div>
            <div class="col-12 text-center">
                <span id="temperatura-principal"><?php echo round($data['list'][0]['main']['temp']); ?>°C</span>
                <p>Sensação térmica <?php echo round($data['list'][0]['main']['feels_like']); ?>°C</p>
            </div>
            <div class="col-12 text-center p-2 descricao">
                <span><?php echo $current['weather'][0]['description']; ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 text-center mb-2 mt-5 d-flex justify-content-center">
        <h6 id="subtitulo">Clima próximos 5 dias</h6>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center">
            <button class="button" onclick="scrollCarousel('prev')"><</button>
        </div>
        <div id="carrosel" class="d-flex">
            <?php for ($i = 1; $i <= 5; $i++):
                //Captura informações de clima dos 5 dias seguintes
                $forecast = $data['list'][$i * 8 - 1];
                $date = date('d-m-y', $forecast['dt']);
                $descricao_clima = $forecast['weather'][0]['description'];
                $imageFile = definirIcone($descricao_clima);
                $imagePath = get_template_directory_uri() . $imageFile;
                ?>
                <div class="text-center card" id="row-card">
                    <div class="row w-100">
                        <div class="col-12 titulo p-1 mb-3">
                            <span><?php echo $date; ?></span>
                        </div>
                        <div class="col-12">
                        <img class="icone-secundario" src="<?php echo esc_url($imagePath); ?>"><br>
                        <span id="temperatura-secundaria"><?php echo round($forecast['main']['temp']); ?>°C</span>
                        </div>
                        <div class="col-12 text-center mt-3 descricao p-1">
                            <span><?php echo $forecast['weather'][0]['description']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button class="button" onclick="scrollCarousel('next')">></button>
        </div>
    <?php
}

function definirIcone($description)
{
    $imageMap = [
        'clear sky' => '/icons/clear_sky.png',
        'few clouds' => '/icons/few_clouds.png',
        'scattered clouds' => '/icons/few_clouds.png',
        'broken clouds' => '/icons/few_clouds.png',
        'shower rain' => '/icons/shower_rain.png',
        'rain' => '/icons/shower_rain.png',
        'thunderstorm' => '/icons/thunderstorm.png',
    ];

    return isset($imageMap[$description]) ? $imageMap[$description] : '/icons/sem-imagens.png';
}

function definirFundo($description)
{
    $backgroundImage = [
        'clear sky' => '/images/clear_sky.jpeg',
        'few clouds' => '/images/few_clouds.jpg',
        'scattered clouds' => '/images/few_clouds.jpg',
        'broken clouds' => '/images/few_clouds.jpg',
        'shower rain' => '/images/shower_rain.jpg',
        'rain' => '/images/shower_rain.jpg',
        'thunderstorm' => '/images/thunderstorm.png',
    ];

    return isset($backgroundImage[$description]) ? $backgroundImage[$description] : '';
}

function alterarImagemFundo($backgroundPath) {
    echo "
    <style>
        body {
            background-image: url('{$backgroundPath}');
            background-size: cover;
        }
    </style>
    ";
}

?>