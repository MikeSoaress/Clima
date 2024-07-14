<?php
/*
Template Name: Visualização de Clima
*/
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/'));
}

get_header();

?>
<div class="responsive" style="">
    <div class="container"
        style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;margin-top: 50px;padding:20px">
        <h4 class="text-center">Clima atual</h4>
        <div class="row">
            <div class="col-6 ">
                <img style="max-width: 197px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png" style
                    alt="Descrição da Imagem">
            </div>
            <div class="col-6">
                <span style="font-size:5rem">25°</span>
                <p>Sensação térmica 25°</p>
            </div>
            <div class="col-12 text-center">
                <span>Predominantemente nublado</span>
            </div>
        </div>
    </div>
</div>
<h6 class="text-center mb-2 mt-5">Clima próximos 5 dias</h6>

<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center">
        <button class="button" onclick="scrollCarousel('prev')"><</button>
    </div>
    <div id="carrosel" style="width: 80%;overflow: overlay;scrollbar-width: none;        scroll-behavior: smooth;"
        class="d-flex">
        <div class=" text-center card">
            <div class="row" style="display: flex;align-items: center;">
                <div class="col-12">
                    <span>Segunda 22/04</span>
                </div>
                <div class="col-12">
                    <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png"
                        alt="Descrição da Imagem">
                    <span style="font-size:2rem">20°</span>
                </div>
                <div class="col-12 text-center mt-3">
                    <span>Predominantemente nublado</span>
                </div>
            </div>
        </div>
        <div class=" text-center card">
            <div class="row" style="display: flex;align-items: center;">
                <div class="col-4">
                    <span>Segunda <br>22/04</span>
                </div>
                <div class="col-4">
                    <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png"
                        alt="Descrição da Imagem">
                </div>
                <div class="col-4">
                    <span style="font-size:2rem">20°</span>
                </div>
                <div class="col-12 text-center mt-3">
                    <span>Predominantemente nublado</span>
                </div>
            </div>
        </div>
        <div class=" text-center card">
            <div class="row" style="display: flex;align-items: center;">
                <div class="col-4">
                    <span>Segunda <br>22/04</span>
                </div>
                <div class="col-4">
                    <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png"
                        alt="Descrição da Imagem">
                </div>
                <div class="col-4">
                    <span style="font-size:2rem">20°</span>
                </div>
                <div class="col-12 text-center mt-3">
                    <span>Predominantemente nublado</span>
                </div>
            </div>
        </div>
        <div class=" text-center card">
            <div class="row" style="display: flex;align-items: center;">
                <div class="col-4">
                    <span>Segunda <br>22/04</span>
                </div>
                <div class="col-4">
                    <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png"
                        alt="Descrição da Imagem">
                </div>
                <div class="col-4">
                    <span style="font-size:2rem">20°</span>
                </div>
                <div class="col-12 text-center mt-3">
                    <span>Predominantemente nublado</span>
                </div>
            </div>
        </div>
        <div class=" text-center card">
            <div class="row" style="display: flex;align-items: center;">
                <div class="col-4">
                    <span>Segunda <br>22/04</span>
                </div>
                <div class="col-4">
                    <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/images/sol.png"
                        alt="Descrição da Imagem">
                </div>
                <div class="col-4">
                    <span style="font-size:2rem">20°</span>
                </div>
                <div class="col-12 text-center mt-3">
                    <span>Predominantemente nublado</span>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <button class="button" onclick="scrollCarousel('next')">></button>
    </div>
</div>
<?php get_footer(); ?>