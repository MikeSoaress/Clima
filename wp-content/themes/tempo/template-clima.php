<?php
/*
Template Name: Visualização de Clima
*/

get_header();

$api_key = 'SUA_CHAVE_API';
$city = 'São Paulo';

$response = wp_remote_get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric");

if (is_array($response) && !is_wp_error($response)) {
    $body = json_decode($response['body']);
    if ($body->cod == 200) {
        $temperature = $body->main->temp;
        $description = $body->weather[0]->description;
        $humidity = $body->main->humidity;
    } else {
        $error = 'Não foi possível obter os dados do clima.';
    }
} else {
    $error = 'Erro ao se conectar com a API de clima.';
}

?>

<div class="container">
    <h2>Clima em <?php echo $city; ?></h2>
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php else : ?>
        <p>Temperatura: <?php echo $temperature; ?>°C</p>
        <p>Descrição: <?php echo $description; ?></p>
        <p>Umidade: <?php echo $humidity; ?>%</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
