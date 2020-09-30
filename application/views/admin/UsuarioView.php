<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Usuario Teste</h4>-->
<!--</div>-->
<div class="container">
    <section class="row capa">
        <?php if($usuario->capa != null) { ?>
            <img src="<?php echo base_url($usuario->capa) ?>" alt="Capa do usuário" class="rounded">
        <?php } ?>
    </section>

    <main class="row m-4">
        <section class="col-md-12">
            <div class="row justify-content-md-center">
                <div class="col-md-auto container">
                    <!-- INICIO - Verificacao do usuario -->
                    <?php
                    if($usuario->id_usuario == $this->session->userdata('userlogado')->id_usuario &&
                       $usuario->tipo_usuario == 'juridica') {
                        echo validation_errors('<div class="alert alert-danger">', '</div>');

                        $atributos = array('class' => 'tamanho-post');

                        echo form_open('publicacao/fazer_publicacao', $atributos);
                        ?>

                        <div>
                            <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>"
                                   name="id_usuario">

                            <div class="form-group">
                                <!--                <label for="exampleFormControlTextarea1">Example textarea</label>-->
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corpo"
                                          placeholder="Faça sua publicação"></textarea>
                            </div>

                            <button type="submit" class="btn btn-outline-primary mb-2">Publicar</button>
                        </div>
                        <?php
                        echo form_close();
                    } elseif ($usuario->id_usuario != $this->session->userdata('userlogado')->id_usuario) {
                        ?>
                        <div class="row justify-content-md-center">
                            <a href="<?php echo base_url('conversa/inicia_conversa/id_'.$usuario->id_usuario) ?>">
                                <button type="button" class="btn btn-outline-success btn-lg">Mandar Mensagem</button>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- FIM - Verificacao do usuario -->

                    <!-- INICIO - Publicacoes -->
                    <ul class="list-unstyled mt-3">
                        <?php
                        foreach ($publicacoes as $publicacao){
                            ?>
                            <li class="card bg-light container" style="width: 30rem;">
                                <!-- Informacoes usuario -->
                                <div class="card-body row ml-0">
                                    <a href="<?php echo base_url('/admin/usuario/id_'.md5($publicacao->id_usuario)) ?>" class="row">
                                        <img src="<?php echo base_url($publicacao->foto_perfil) ?>" class="avatar float-left" alt="Avatar">
                                        <h5 class="card-title align-self-center ml-3 mt-1">
                                            <?php echo $publicacao->nome ?>
                                        </h5>
                                    </a>
                                </div>
                                <!-- Conteudo publicacao -->
                                <div class="row">
                                    <?php if($publicacao->imagem != null) { ?>
                                        <img src="<?php echo base_url($publicacao->imagem) ?>" class="card-img-top" alt="...">
                                    <?php } ?>

                                    <?php if($publicacao->corpo != null) { ?>
                                        <div class="card-body">
                                            <p class="card-text"> <?php echo $publicacao->corpo ?> </p>
                                        </div>
                                    <?php } ?>
                                    
                                    <div class="card-body">
                                        <p class="card-text"> Curtidas: <a href="#" class="card-link"><?php echo $publicacao->curtidas ?></a> </p>
                                        <p class="card-text"> Postado em: <?php echo postadoem($publicacao->data_criacao) ?></p>
                                    </div>
                                </div>
                            </li>
                            <br><br>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- FIM - Publicacoes -->
                </div>
            </div>
        </section>

        <section class="col-md-3">
        </section>
    </main>
</div>