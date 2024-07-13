<?php
/*
Template Name: Visualização de Clima
*/
get_header();
?>
<div class="container" style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;margin-top: 50px;padding:20px">   
<div class="row">
    <div class="col-12">
    <h4 class="text-center">Clima atual</h4> 
    </div>
        <div class="col-6">
        <img style="max-width: 197px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sol.png" style alt="Descrição da Imagem">
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
<h5 class="text-center mt-5 mb-4">Clima próximos 5 dias</h5>
<div class="container text-center" style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;padding:20px">
    <div class="row" style="display: flex;align-items: center;">
        <div class="col-4">
            <span>Segunda <br>22/04</span>
        </div>
        <div class="col-4">
        <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sol.png" style alt="Descrição da Imagem">
        </div>
        <div class="col-4">
            <span style="font-size:2rem">26°</span>
        </div> 
        <div class="col-12 text-center mt-3">
            <span>Predominantemente nublado</span>
        </div>  
    </div>
</div>

<div class="container text-center" style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;margin-top: 10px;padding:20px">
    <div class="row" style="display: flex;align-items: center;">
        <div class="col-4">
            <span>Segunda <br>22/04</span>
        </div>
        <div class="col-4">
        <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sol.png" style alt="Descrição da Imagem">
        </div>
        <div class="col-4">
            <span style="font-size:2rem">26°</span>
        </div> 
        <div class="col-12 text-center mt-3">
            <span>Predominantemente nublado</span>
        </div>  
    </div>
</div>

<div class="container text-center" style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;margin-top: 10px;padding:20px">
    <div class="row" style="display: flex;align-items: center;">
        <div class="col-4">
            <span>Segunda <br>22/04</span>
        </div>
        <div class="col-4">
        <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sol.png" style alt="Descrição da Imagem">
        </div>
        <div class="col-4">
            <span style="font-size:2rem">26°</span>
        </div> 
        <div class="col-12 text-center mt-3">
            <span>Predominantemente nublado</span>
        </div>  
    </div>
</div>

<div class="container text-center" style="max-width: 600px;box-shadow: 0px 0px 3px 0px #0000008a;border-radius: 5px;margin-top: 10px;padding:20px">
    <div class="row" style="display: flex;align-items: center;">
        <div class="col-4">
            <span>Segunda <br>22/04</span>
        </div>
        <div class="col-4">
        <img style="max-width: 70px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sol.png" style alt="Descrição da Imagem">
        </div>
        <div class="col-4">
            <span style="font-size:2rem">26°</span>
        </div> 
        <div class="col-12 text-center mt-3">
            <span>Predominantemente nublado</span>
        </div>  
    </div>
</div>


<?php get_footer(); ?>
