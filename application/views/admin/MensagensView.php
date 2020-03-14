<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Mensagens</h4>
</div>

<main class="row justify-content-md-center">
    <section class="col-md-12">
        <div class="row justify-content-md-center">
            <?php
            if($mensagens != NULL && $mensagens != ''){
                foreach ($mensagens as $mensagem){
                    ?>
                    <div class="col-md-auto">
                        <ul class="list-unstyled">
                            <li class="card bg-light bottom-right" style="width: 10rem;">
                                <div class="card-body">
                                    <p class="card-title">
                                        <?php
                                        echo $mensagem->usuario;
                                        ?>
                                    </p>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-text">
                                        <?php echo $mensagem->corpo ?>
                                    </h5>
                                </div>
                            </li>

                            <br><br>

                        </ul>
                    </div>
                    <?php
                }
            }

            echo form_open('admin/conversa/manda_mensagem');
            ?>

            <div>
                <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario_remetente">
                <input type="hidden" value="<?php echo $id_conversa; ?>" name="id_conversa">

                <div class="form-group">
                    <!--                <label for="exampleFormControlTextarea1">Example textarea</label>-->
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="corpo"></textarea>

                    <button type="submit" class="btn btn-outline-primary mb-2">Publicar</button>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </section>

<!--    <section class="col-md-3">-->
<!--    </section>-->
</main>