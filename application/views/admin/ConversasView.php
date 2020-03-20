<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Conversas</h4>
</div>

<main class="row justify-content-md-center">
    <section class="col-md-12">
        <div class="row justify-content-md-center">
            <?php
            foreach ($conversas as $conversa){
            ?>
            <div class="col-md-auto">
                <ul class="list-unstyled">
                    <li class="card bg-light" style="width: 30rem;">
                        <a href="<?php echo base_url('/conversa/id_'.$conversa->id_conversa) ?>" class="card-link">
                            <img src="<?php echo 'https://imagens.canaltech.com.br/empresas/690.400.jpg' /*$instituicao->foto_perfil*/ ?>" class="img-thumbnail card-img-top rounded-circle" alt="..." style="max-width: 11rem; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-title">
                                    <?php
                                        echo "Conversa com: ".$conversa->nome;
                                    ?>
                                </p>
                            </div>

                            <div class="card-body">
                                <h5 class="card-text">
                                    <?php echo 'ID da Conversa -> '.$conversa->id_conversa ?>
                                </h5>
                            </div>
                        </a>
                    </li>

                    <br><br>

                </ul>
            </div>
                <?php
            }
            ?>
        </div>
    </section>

<!--    <section class="col-md-3">-->
<!--    </section>-->
</main>