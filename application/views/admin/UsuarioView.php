<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Usuario Teste</h4>-->
<!--</div>-->
<div class="container">
    <section class="row capa">
        <img src="<?php echo $usuario->capa ?>" alt="Capa do usuário" class="rounded">
    </section>

    <main class="row justify-content-md-center m-4">
        <section class="col-md-12">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <?php
                    if($usuario->id_usuario == $this->session->userdata('userlogado')->id_usuario) {
                        echo validation_errors('<div class="alert alert-danger">', '</div>');

                        echo form_open('publicacao/fazer_publicacao');
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
                    } else {
                        // Ajustar para mostrar mensagens quando ja houver conversa com este usuario, sem abrir uma nova conversa
                        ?>
                        <a href="<?php echo base_url('conversa/inicia_conversa/id_'.$usuario->id_usuario) ?>">
                            <button type="button" class="btn btn-outline-success btn-lg">Mandar Mensagem</button>
                        </a>
                        <?php
                    }
                    ?>

                    <ul class="list-unstyled mt-3">
                        <?php
                        foreach ($publicacoes as $publicacao){
                            ?>
                            <li class="card bg-light container" style="width: 30rem;">
                                <div class="card-body row ml-0">
                                    <a href="<?php echo base_url('/admin/usuario/id_'.md5($publicacao->id_usuario)) ?>" class="row">
                                        <img src="<?php echo $publicacao->foto_perfil ?>" class="avatar float-left" alt="Avatar">
                                        <h5 class="card-title align-self-center ml-3 mt-1">
                                            <?php echo $publicacao->nome ?>
                                        </h5>
                                    </a>
                                </div>
                                <div class="row">
                                    <img src="http://s2.glbimg.com/7Et2QlxLzBs1FQ5Z_C-GDSa2DTE=/i.glbimg.com/og/ig/infoglobo1/f/original/2017/01/16/blog_shark.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"> <?php echo $publicacao->corpo ?> </p>
                                    </div>
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
                </div>
            </div>
        </section>

        <section class="col-md-3">
        </section>
    </main>
</div>