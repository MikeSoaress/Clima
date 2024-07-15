<!DOCTYPE html>
<html lang="en" style="position:relative;    min-height: 110vh;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body style="margin-bottom: 60px;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark  d-flex  " style="padding: 0.5rem 2rem;">
            <a class="navbar-brand" href="/clima/home">Clima</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="/clima/login">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clima/edicao-usuario">Meus dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clima/login">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>