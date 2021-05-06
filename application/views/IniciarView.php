<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h3 class="card-title mt-3 text-center">Abra sua conta</h3>
        <p class="text-center">Comece com sua conta grátis</p>

        <?php
            // echo validation_errors('<div class="alert alert-danger">', '</div>');
            // if (isset($error)) {
            //     echo '<p class="alert alert-danger"><strong>Error: </strong>'.$error.'</p>';
            // }
            if ($this->session->flashdata('error') != null) {
        ?>
            <div class="alert alert-danger" style="max-width: 15rem;"> 
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php
            }
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
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="tipo_usuario" class="custom-control-input" value="fisica" checked>
                    <label class="custom-control-label" for="customRadioInline1">Pessoa</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="tipo_usuario" class="custom-control-input" value="juridica">
                    <label class="custom-control-label" for="customRadioInline2">Instituição</label>
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