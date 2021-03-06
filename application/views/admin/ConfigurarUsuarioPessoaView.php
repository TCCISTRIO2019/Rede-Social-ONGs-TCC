<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Atualizar seus dados</h4>
</div>

<main class="row justify-content-md-center">
    <section class="card-body mx-auto" style="max-width: 400px;">
        <?php
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        echo form_open_multipart('admin/usuario/atualizar_pessoa');
        ?>

        <input name="id_usuario" value="<?php echo $this->session->userdata('userlogado')->id_usuario ?>" type="hidden">
        <input name="email" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="hidden">
        <input name="tipo_usuario" value="<?php echo $this->session->userdata('userlogado')->tipo_usuario ?>" type="hidden">

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto_perfil">
                <label class="custom-file-label" for="inputGroupFile01">Escolher sua imagem de usuário</label>
            </div>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email </span>
            </div>
            <input class="form-control" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="email" disabled>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Senha </span>
            </div>
            <input name="senha" class="form-control" value="<?php echo $this->session->userdata('userlogado')->senha ?>" type="password">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nome </span>
            </div>
            <input name="nome" class="form-control" value="<?php echo $this->session->userdata('userlogado')->nome ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Sobrenome </span>
            </div>
            <input name="sobrenome" class="form-control" value="<?php echo $this->session->userdata('userlogado')->sobrenome ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nascimento </span>
            </div>
            <input name="nascimento" class="form-control" value="<?php echo $this->session->userdata('userlogado')->nascimento ?>" type="date">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Telefone </span>
            </div>
            <input name="telefone" class="form-control" value="<?php echo $this->session->userdata('userlogado')->telefone ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" name="sexo" value="m" aria-label="Radio button para genero"
                           <?php if($this->session->userdata('userlogado')->sexo == "m"){
                               echo "checked";
                           } ?>
                    >
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Mulher
                    </label>
                </div>
                <div class="input-group-text">
                    <input type="radio" name="sexo" value="h" aria-label="Radio button para genero"
                        <?php if($this->session->userdata('userlogado')->sexo == "h"){
                            echo "checked";
                           } ?>
                    >
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Homem
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary btn-block"> Atualizar Dados </button>
        </div>

        <?php
        echo form_close();
        ?>

        <div class="form-group">
            <a href="<?php echo base_url('iniciar') ?>">
                <button class="btn btn-outline-primary btn-block"> Voltar </button>
            </a>
        </div>
    </section>
</main>