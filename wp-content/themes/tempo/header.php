<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body style="margin-bottom: 60px;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark  d-flex  " style="padding: 0.5rem 2rem;">
            <a class="navbar-brand" href="/wordpress">Clima</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <?php if (is_user_logged_in()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/edicao-usuario">Meus dados</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/wordpress/login/">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>