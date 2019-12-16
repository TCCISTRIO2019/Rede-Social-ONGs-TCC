<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Abra sua conta</h4>
        <p class="text-center">Comece com sua conta grátis</p>

        <?php
        echo validation_errors();

        echo form_open('IniciarController/logar');
        ?>
        <?php
        echo form_close();
        ?>
        <form method="POST" action="">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="" class="form-control" placeholder="Email" type="email">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Criar senha" type="password">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Repetir senha" type="password">
            </div>  

			<div class="input-group">
				<div class="input-group-prepend">
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
			</div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Cadastrar-se </button>
            </div>
        </form>
    </article>
</div>