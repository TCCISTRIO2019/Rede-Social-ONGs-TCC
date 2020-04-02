<!--<div class="row justify-content-md-center">-->
<!--    <h4 class="col-md-auto">Mensagens</h4>-->
<!--</div>-->

<!-- Tempo em segundos que o navegador fica dando refresh na pagina -->
<meta http-equiv="refresh" content="10" >

<main class="row justify-content-md-center">
    <section class="col-md-7">
        <ul class="list-group">
            <?php
            if($mensagens != NULL && $mensagens != ''){
                foreach ($mensagens as $mensagem){
                    if($mensagem->id_usuario == $this->session->userdata('userlogado')->id_usuario)
                    {
                        $cor = 'list-group-item-secondary';
                        $posicao = 'text-right';
                    }
                    else
                    {
                        $cor = 'list-group-item-dark';
                        $posicao = 'text-left';
                    }
                    ?>

                    <li class="<?php echo $cor." ".$posicao; ?> list-group-item mb-1 border border-secondary">
                        <h6 class="mb-1 font-weight-light"> <?php echo $mensagem->nome; ?> </h6 class="mb-1 font-weight-light">
                        <h5 class="mb-1 font-weight-bold"> <?php echo $mensagem->corpo; ?> </h5>
                        <small> <?php echo $mensagem->hora_envio; ?> </small>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
            <?php
            $atributos = array('class' => 'form-inline mt-2 mt-md-0 mr-auto');

            echo form_open('admin/conversa/manda_mensagem');
            ?>

            <div>
                <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario_remetente">
                <input type="hidden" value="<?php echo $id_conversa; ?>" name="id_conversa">

                <div class="form-group input-group w-100 p-3">
                    <input type="text" class="form-control float-left border border-secondary rounded" id="texto_mensagem"
                           onkeyup='salvarValor(this);' rows="1" name="corpo" placeholder="Mensagem">

                    <button type="submit" class="btn btn-primary ml-3" onclick="limpaValorSalvo(document.getElementById('texto_mensagem'))">
                        Enviar
                    </button>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
    </section>

<!--    <section class="col-md-3">-->
<!--    </section>-->
</main>