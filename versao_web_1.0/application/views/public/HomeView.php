<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Publicações</h4>-->
<!--</div>-->

<main class="row justify-content-md-center">
    <aside class="col-md-3">
        <div class="card mx-auto sticky-top" style="width: 11rem; top:5rem;">
            <?php
            if($this->session->userdata('userlogado')->tipo_usuario == 'juridica')
            {  // Se for instituicao, abrir pagina normal com as publicacoes
                $href = base_url('/admin/usuario/id_' . md5($this->session->userdata('userlogado')->id_usuario));
                $nome = $this->session->userdata('userlogado')->nome;
            } else {  // Se for pessoa, abrir pagina de configuracao dos dados
                $href = base_url('/admin/usuario/pag_configurar/'.md5($this->session->userdata('userlogado')->id_usuario));
                $nome = $this->session->userdata('userlogado')->nome." ".$this->session->userdata('userlogado')->sobrenome;
            }
            ?>
            <a href="<?php echo $href ?>">
                <img class="card-img-top rounded" src="<?php echo $usuario->foto_perfil ?>" alt="Sua foto de perfil">
                <div class="card-body">
                    <p class="card-text"><?php echo $nome?></p>
                </div>
            </a>
        </div>
    </aside>

    <section class="col-md-6">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">

                <?php

                if ($this->session->userdata('userlogado')->tipo_usuario == "juridica")
                {
                    echo validation_errors('<div class="alert alert-danger">', '</div>');

                    $atributos = array('class' => 'tamanho-post');

                    echo form_open('publicacao/fazer_publicacao', $atributos);
                    ?>

                    <div>
                        <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">

                        <div class="form-group ">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corpo" placeholder="Faça sua publicação"></textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mb-2">Publicar</button>
                    </div>
                    <?php
                    echo form_close();
                }
                ?>

                <ul class="list-unstyled">
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