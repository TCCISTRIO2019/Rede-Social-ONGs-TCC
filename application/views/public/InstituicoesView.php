<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Instituições</h4>-->
<!--</div>-->

<main class="row justify-content-md-center">
    <div class="card-deck">
        <?php
        foreach ($instituicoes as $instituicao){
        ?>
            <div class="card border border-secondary card_instituicao">
                <a href="<?php echo base_url('/admin/usuario/id_'.md5($instituicao->id_usuario)) ?>" class="link_instituicao position-relative">
                <img src="<?php echo base_url($instituicao->foto_perfil) ?>" class="card-img-top" alt="..." style="max-width:100%; max-height: 10rem; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?php echo $instituicao->nome ?></h5>
                    <p class="card-text"><?php echo $instituicao->descricao ?></p>
                </div>
                <footer class="card-footer position-absolute rodape_card">
                    <small class="text-muted"><?php echo 'Fundada em '.fundadoem($instituicao->criacao_instituicao) ?></small>
                </footer>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</main>