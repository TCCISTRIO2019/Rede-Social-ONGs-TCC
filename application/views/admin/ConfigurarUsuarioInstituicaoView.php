<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Configurar Instituicao</h4>
</div>

<main class="row justify-content-md-center">
    <section class="col-md-12">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <?php
                echo validation_errors('<div class="alert alert-danger">', '</div>');

                echo form_open('usuario/atualizar_instituicao');
                ?>

                <div>
                    <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario">

                    <div class="form-group">
                        <!--                <label for="exampleFormControlTextarea1">Example textarea</label>-->
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corpo" placeholder="Faça sua publicação"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Publicar</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </section>

    <section class="col-md-3">
    </section>
</main>