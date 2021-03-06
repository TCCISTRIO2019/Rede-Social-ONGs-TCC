<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h3 class="card-title mt-3 text-center">Abra sua conta</h3>
        <p class="text-center">Comece com sua conta grátis</p>

        <?php
            echo validation_errors('<div class="alert alert-danger">', '</div>');

            echo form_open('admin/usuario/pag_cadastrar');
        ?>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input class="form-control" name="email" placeholder="Email" type="email" value="<?php echo set_value('email'); ?>">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" name="senha" placeholder="Criar senha" type="password" value="<?php echo set_value('senha'); ?>">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" name="senha_conf" placeholder="Repetir senha" type="password" value="<?php echo set_value('senha_conf'); ?>">
            </div>  

			<div class="form-group input-group">
                <div class="input-group-text">
                    <input type="radio" name="tipo_usuario" value="fisica" aria-label="Radio button para tipo de usuario" checked>
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Pessoa
                    </label>
                </div>
                <div class="input-group-text">
                    <input type="radio" name="tipo_usuario" value="juridica" aria-label="Radio button para tipo de usuario">
                </div>
                <div class="input-group-text">
                    <label class="form-check-label">
                        Instituição
                    </label>
                </div>
			</div>

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary btn-block"> Cadastrar-se </button>
            </div>
        <?php
            echo form_close();
        ?>
    </article>
</div>