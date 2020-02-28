<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">TCC Rede Social</a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url('home') ?>">Home</a>
                    </li>
                </ul>

                    <!-- Ajustar tamanho dos campos -->
                    <?php
                    // O usuario esta logado
                    if($this->session->userdata('logado') == TRUE) {
                        $atributos = array('class' => 'form-inline mt-2 mt-md-0 mr-auto');

                        echo form_open('instituicao',$atributos);
                        ?>
                        <input class="form-control mr-sm-2" type="text" placeholder="Procurar nome da Instituição" aria-label="Procurar Instituição" name="nome_instituicao">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Pesquisar</button>

                    <?php
                        echo form_close();
                        ?>
                      <?php
                    ?>
                        <ul class="nav nav-tabs">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $this->session->userdata('userlogado')->nome; ?>
                                </a>
                                <div class="dropdown-menu">
                    <!--                            <a class="dropdown-item" href="#">--><?php //echo $this->session->userdata('userlogado')->telefone; ?><!--</a>-->
                    <!--                            <a class="dropdown-item" href="#">Pessoa --><?php //echo $this->session->userdata('userlogado')->tipo_usuario; ?><!--</a>-->
                    <!--                            <a class="dropdown-item" href="#">--><?php //echo $this->session->userdata('userlogado')->criacao; ?><!--</a>-->
<!--                                    Manda o ID do usuário para pegar todas as conversas que ele está-->
                                    <a class="dropdown-item" href="<?php echo base_url('/admin/conversa/id_'.md5($this->session->userdata('userlogado')->id_usuario)) ?>">Conversas</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/admin/usuario/id_'.md5($this->session->userdata('userlogado')->id_usuario)) ?>">Perfil</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/admin/usuario/pag_configurar/'.md5($this->session->userdata('userlogado')->id_usuario)) ?>">Configuração</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/usuario/deslogar') ?>">Sair</a>
                                </div>
                            </li>
                        </ul>
                        <?php
                    } else {
                        echo validation_errors('<div class="alert alert-danger">', '</div>');

                        echo form_open('admin/usuario/logar');
                        ?>
                        <div class="form-inline my-2 my-md-0">
                            <label class="sr-only" for="inlineFormInputName2">Email</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="email" name="email" class="form-control" id="inlineFormInputName2"
                                       placeholder="Email">
                            </div>

                            <label class="sr-only" for="inlineFormInputGroupUsername2">Senha</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" name="senha" class="form-control" id="inlineFormInputGroupUsername2"
                                       placeholder="Senha">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Login</button>
                        </div>
                    <?php
                        echo form_close();
                    }
                    ?>
            </div>
        </div>
    </nav>
</header>