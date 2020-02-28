<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Conversas</h4>
</div>

<main class="row justify-content-md-center">
<!--    <aside class="col-md-3">-->
<!--        <div class="card mx-auto sticky-top" style="width: 11rem; top:5rem;">-->
<!--            <a href="--><?php //echo base_url('/admin/usuario/id_'.md5($this->session->userdata('userlogado')->id_usuario)) ?><!--">-->
<!--                <img class="img-thumbnail card-img-top rounded-circle" src="http://s2.glbimg.com/7Et2QlxLzBs1FQ5Z_C-GDSa2DTE=/i.glbimg.com/og/ig/infoglobo1/f/original/2017/01/16/blog_shark.jpg" alt="Sua foto de perfil">-->
<!--                <div class="card-body">-->
<!--                    --><?php //if($this->session->userdata('userlogado')->tipo_usuario == "fisica") {   ?>
<!--                        <p class="card-text">--><?php //echo $this->session->userdata('userlogado')->nome." ".$this->session->userdata('userlogado')->sobrenome; ?><!--</p>-->
<!--                        --><?php //} else {  ?>
<!--                        <p class="card-text">--><?php //echo $this->session->userdata('userlogado')->nome?><!--</p>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </aside>-->

    <section class="col-md-12">
        <div class="row justify-content-md-center">
            <?php
            foreach ($conversas as $conversa){
            ?>
            <div class="col-md-auto">
                <ul class="list-unstyled">
                    <li class="card bg-light" style="width: 30rem;">
                        <a href="<?php /*echo base_url('/admin/usuario/id_'.md5($instituicao->id_usuario)) */ ?>">
                            <img src="<?php echo 'https://imagens.canaltech.com.br/empresas/690.400.jpg' /*$instituicao->foto_perfil*/ ?>" class="img-thumbnail card-img-top rounded-circle" alt="..." style="max-width: 11rem; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">
                                        <?php echo 'TESTE CONVERSA -> '.$conversa->id /*$instituicao->nome*/ ?>
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