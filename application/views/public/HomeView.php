<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Publicações</h4>-->
<!--</div>-->

<main class="row justify-content-md-center">
    <!-- Bloco da esquerda -->
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
            <?php if($usuario->foto_perfil != null) { ?>
                <img class="card-img-top rounded" src="<?php echo base_url($usuario->foto_perfil) ?>" alt="Sua foto de perfil">
            <?php } ?>
                <div class="card-body">
                    <p class="card-text"><?php echo $nome?></p>
                </div>
            </a>
        </div>
    </aside>

    <!-- Bloco central -->
    <section class="col-md-6">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">

                <?php

                if ($this->session->userdata('userlogado')->tipo_usuario == "juridica")
                {
                    echo validation_errors('<div class="alert alert-danger">', '</div>');

                    $atributos = array('class' => 'tamanho-post');

                    echo form_open_multipart('publicacao/fazer_publicacao', $atributos);
                    // echo form_upload('userfile');

                    ?>

                    <div>
                        <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">

                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corpo" placeholder="Faça sua publicação"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Imagem</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagem_publicacao">
                                <label class="custom-file-label" for="inputGroupFile01">Escolher imagem do post</label>
                            </div>
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
                                    <img src="<?php echo base_url($publicacao->foto_perfil) ?>" class="avatar float-left" alt="Avatar">
                                    <h5 class="card-title align-self-center ml-3 mt-1">
                                            <?php echo $publicacao->nome ?>
                                    </h5>
                                </a>
                            </div>
                            <div class="row">
                                <?php if($publicacao->imagem != null) { ?>
                                    <img src="<?php echo base_url($publicacao->imagem) ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                
                                <?php if($publicacao->corpo != null) { ?>
                                    <div class="card-body">
                                        <p class="card-text"> <?php echo $publicacao->corpo ?> </p>
                                    </div>
                                <?php } ?>

                                <div class="card-body postado-em">
                                    <p class="card-text"> Postado em: <?php echo postadoem($publicacao->data_criacao) ?></p>
                                </div>
                            </div>

                            <div class="row mx-0">
                                <a class="dropdown-item" href="<?php echo base_url('/publicacao/listar_comentarios_publicacao/id_'.$publicacao->id_publicacao) ?>">Conversas</a>
                            </div>

                            <div class="row mx-0">
                                <?php
                                echo validation_errors('<div class="alert alert-danger">', '</div>');

                                $atributos = array('class' => 'tamanho-post');

                                echo form_open_multipart('publicacao/criar_comentario', $atributos);
                                ?>
                                <div>
                                <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">
                                <input type="hidden" value="<?php echo $publicacao->id_publicacao ?>" name="id_publicacao">

                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="corpo" placeholder="Faça seu comentário"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary mb-2">Comentar</button>
                                <?php
                                echo form_close();
                                ?>
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

    <!-- Bloco da direita apenas para alinhar os demais -->
    <section class="col-md-3">
    </section>
</main>