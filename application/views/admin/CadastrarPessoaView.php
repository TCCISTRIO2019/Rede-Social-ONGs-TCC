<div class="card bg-light">
    <section class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Cadastrar Pessoa</h4>

        <p class="text-center">Informe seus dados</p>

        <?php if ($this->session->flashdata('error') != null) { ?>
            <div class="alert alert-danger" style="max-width: 22rem;"> 
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php
            }

        echo form_open_multipart('admin/usuario/cadastrar_pessoa');
        ?>

        <input type="hidden" value="<?php echo $email ?>" name="email">
        <input type="hidden" value="<?php echo $senha ?>" name="senha">
        <input type="hidden" value="<?php echo $tipo_usuario ?>" name="tipo_usuario">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email <!--<i class="fa fa-envelope"></i>--> </span>
            </div>
            <input type="email" class="form-control" value="<?php echo $email ?>" disabled>
        </div>

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto_perfil">
                <label class="custom-file-label" for="inputGroupFile01">Escolher sua imagem de usuário</label>
            </div>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nome <!--<i class="fa fa-envelope"></i>--> </span>
            </div>
            <input name="nome" class="form-control" placeholder="Digite o seu nome" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Sobrenome <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="sobrenome" class="form-control" placeholder="Digite o seu sobrenome" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nascimento <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="nascimento" class="form-control" type="date">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Telefone <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="telefone" class="form-control" placeholder="Digite seu telefone" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="sexo" value="m" aria-label="Radio button para genero" checked>
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Mulher
                    </label>
                </div>
                <div class="input-group-text">
                    <input type="radio" name="sexo" value="h" aria-label="Radio button para genero">
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Homem
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Cadastrar-se </button>
        </div>

        <?php
        echo form_close();
        ?>

        <div class="form-group">
            <a href="<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']); }; echo base_url('iniciar') ?>">
                <button class="btn btn-outline-primary btn-block"> Voltar </button>
            </a>
        </div>
    </section>
</div>