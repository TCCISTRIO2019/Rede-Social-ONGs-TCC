
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
            <?php if($this->session->userdata('userlogado')->foto_perfil != null) { ?>
                <img class="card-img-top rounded" src="<?php echo base_url($this->session->userdata('userlogado')->foto_perfil) ?>" alt="Sua foto de perfil">
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
            <div class="col-md-auto card bg-light container" style="width: 30rem;">
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
                    <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>');

                    $atributos = array('class' => 'tamanho-post sticky-top');

                    echo form_open_multipart('publicacao/criar_comentario', $atributos);
                    ?>          

                    <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">
                    <input type="hidden" value="<?php echo $publicacao->id_publicacao ?>" name="id_publicacao">

                    <div class="form-group">
                        <input class="form-control" name="corpo" placeholder="Faça seu comentário" type="text">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Comentar</button>
                    
                    <?php
                    echo form_close();
                    ?>
                </div>      
                
                <div class="row mx-0">
                    <?php foreach ($comentarios as $comentario) { ?>
                        <div class="card-body col-12 border mb-1">
                            <div class="postado-em">   
                                <img class="rounded-circle" src="<?php echo base_url($comentario->foto_perfil); ?>" alt="..." style="max-width: 3rem; object-fit: cover; float:left;">                             
                                <p class="card-text nome-comentario"> <?php echo $comentario->nome ?> </p>
                            </div>
                            
                            <div class="card-body">
                                <p class="card-text"> <?php echo $comentario->corpo ?> </p>
                            </div>
                                
                            <div class="postado-em">
                                <p class="card-text"> Postado em: <?php echo postadoem($comentario->data_enviado) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bloco da direita apenas para alinhar os demais -->
    <section class="col-md-3">
    </section>
</main>