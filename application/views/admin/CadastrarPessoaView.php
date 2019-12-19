<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Cadastrar Pessoa</h4>

        <p class="text-center">Informe seus dados</p>

        <?php
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        echo form_open('admin/usuario/cadastrar');
        ?>

        <input type="hidden" value="<?php echo $email ?>" name="email">
        <input type="hidden" value="<?php echo $senha ?>" name="senha">
        <input type="hidden" value="<?php echo $tipo_usuario ?>" name="tipo_usuario">

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

        <div class="input-group">
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
    </article>
</div>