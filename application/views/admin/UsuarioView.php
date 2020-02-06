<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Usuario Teste</h4>
</div>

<section class="row capa">
    <img src="<?php echo base_url('assets/public/images/fullhdimage (21).jpg') ?>" alt="Capa do usuário">
</section>

<main class="row justify-content-md-center">
    <section class="col-md-12">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <?php
                echo validation_errors('<div class="alert alert-danger">', '</div>');

                echo form_open('publicacao/fazer_publicacao');
                ?>

                <div>
                    <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">

                    <div class="form-group">
                        <!--                <label for="exampleFormControlTextarea1">Example textarea</label>-->
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corpo" placeholder="Faça sua publicação"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Publicar</button>
                </div>
                <?php
                echo form_close();
                ?>

                <ul class="list-unstyled">
                    <?php
                    foreach ($publicacoes as $publicacao){
                        ?>
                        <li class="card bg-light" style="width: 30rem;">
                            <div class="card-body">
                                <h5 class="card-title">Usuario: <a href="<?php echo base_url('autor/'.$publicacao->id_usuario.'/'.limpar($publicacao->nome)) ?>">
                                        <?php echo $publicacao->nome ?> </a>
                                </h5>
                            </div>
                            <img src="http://s2.glbimg.com/7Et2QlxLzBs1FQ5Z_C-GDSa2DTE=/i.glbimg.com/og/ig/infoglobo1/f/original/2017/01/16/blog_shark.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"> <?php echo $publicacao->corpo ?> </p>
                            </div>
                            <!--                        <ul class="list-group list-group-flush">-->
                            <!--                            <li class="list-group-item">Cras justo odio</li>-->
                            <!--                            <li class="list-group-item">Dapibus ac facilisis in</li>-->
                            <!--                            <li class="list-group-item">Vestibulum at eros</li>-->
                            <!--                        </ul>-->
                            <div class="card-body">
                                <p class="card-text"> Curtidas: <a href="#" class="card-link"><?php echo $publicacao->curtidas ?></a> </p>
                                <p class="card-text"> Postado em: <?php echo postadoem($publicacao->data_criacao) ?></p>
                            </div>
                        </li>
                        <br><br>
                        <!--                    <li>ID: --><?php //echo $publicacao->id_publicacao ?><!--</li>-->
                        <!--                    <li>Usuario: <a href="--><?php //echo base_url('autor/'.$publicacao->id_usuario.'/'.limpar($publicacao->nome)) ?><!--">-->
                        <!--                            --><?php //echo $publicacao->nome ?><!-- </a>-->
                        <!--                    </li>-->
                        <!--                    <li>Corpo: --><?php //echo $publicacao->corpo ?><!--</li>-->
                        <!--                    <li>Curtidas: --><?php //echo $publicacao->curtidas ?><!--</li>-->
                        <!--                    <li>Imagem: --><?php //echo $publicacao->imagem ?><!--</li>-->
                        <!--                    <li>Data Publicacao: --><?php //echo postadoem($publicacao->data_criacao) /*Helper*/ ?><!--</li>-->
                        <!--                    <br><br>-->
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="col-md-3">
    </section>
</main>