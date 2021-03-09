
<div class="container">
    <header class="row">
        <section class="capa position-relative">
            <img src="<?php echo base_url($usuario->capa) ?>" alt="Capa do usuário" class="rounded">

            <section class="foto_perfil position-absolute">
                <?php if ($usuario->id_usuario == $this->session->userdata('userlogado')->id_usuario) { ?>
                <a href="<?php echo base_url('/admin/usuario/pag_configurar/'.md5($this->session->userdata('userlogado')->id_usuario)); ?>">
                    <img src="<?php echo base_url($usuario->foto_perfil) ?>" alt="Foto de perfil do usuário" class="rounded img-thumbnail position-relative">
                </a>
                <?php } else { ?>
                    <img src="<?php echo base_url($usuario->foto_perfil) ?>" alt="Foto de perfil do usuário" class="rounded img-thumbnail position-relative">
                <?php } ?>

                <h3 class="mx-3 position-absolute border-bottom"><?php echo $usuario->nome ?></h3>
            </section>
        </section>
    </header>

    <main class="row m-4">
        <section class="col-md-12">
            <div class="row justify-content-md-center">
                <div class="col-md-auto container">
                    <!-- INICIO - Descricao -->
                    <div class="card bg-light container mb-3 descricao">
                        <div class="card-title mt-3">
                            <div class="row justify-content-md-center">
                                <h4 class="col-md-auto">Descrição</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <p><?php echo $instituicao->descricao ?></p>
                            </div>
                        </div>

                        <?php if($instituicao->banco != '') { ?>
                        <div class="card-title">
                            <div class="row justify-content-md-center">
                                <h4 class="col-md-auto">Dados bancários para doações</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <p class="col">Banco: <?php echo $instituicao->banco ?></p>
                                <p class="col">Agencia: <?php echo $instituicao->agencia ?></p>
                                <p class="col">Conta: <?php echo $instituicao->conta ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- FIM - Descricao -->

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
                                        <p class="card-text"> Postado em: <?php echo postadoem($publicacao->data_criacao) ?></p>
                                    </div>
                                </div>
                                <!-- Botão Comentários -->
                                <div class="row mx-0">
                                    <button class="btn btn-outline-primary mb-2">
                                        <a class="link-comentario" href="<?php echo base_url('/publicacao/listar_comentarios_publicacao/id_'.$publicacao->id_publicacao) ?>">
                                            Comentários
                                        </a>
                                    </button>
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