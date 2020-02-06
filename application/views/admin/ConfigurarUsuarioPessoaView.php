<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Atualizar seus dados - Pessoa</h4>
</div>

<main class="row justify-content-md-center">
    <section class="card-body mx-auto" style="max-width: 400px;">
            <?php
            echo validation_errors('<div class="alert alert-danger">', '</div>');

            echo form_open('admin/usuario/atualizar_pessoa');
            ?>

            <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario ?>" name="id_usuario">

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Email </span>
                </div>
                <input name="email" class="form-control" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="email" disabled>
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

            <div class="input-group">
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
                <button type="submit" class="btn btn-primary btn-block"> Atualizar Dados </button>
            </div>

            <?php
            echo form_close();
            ?>
    </section>
</main>