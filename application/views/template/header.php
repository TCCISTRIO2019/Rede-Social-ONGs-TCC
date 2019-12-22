<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- Procurar maneira de verificar se a pessoa esta logada ou não para mudar o header -->

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">TCC Rede Social <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('home') ?>">Home </a>
            </li>
          </ul>

          <!-- Ajustar tamanho dos campos -->
            <?php
            // O usuario esta logado
            if($this->session->userdata('logado') == TRUE) {
                ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo $this->session->userdata('userlogado')->nome; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
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
                    <input type="email" name="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                           placeholder="Email">

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