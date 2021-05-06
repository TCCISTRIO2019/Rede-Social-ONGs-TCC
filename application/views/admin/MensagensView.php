<main class="row justify-content-md-center">
    <body onload="scrollDown()">
    <section class="col-md-7">
        <!-- Chamada à view pra carregar automaticamente a página -->
        <?php $this->load->view('admin/QuadroMensagensView', $mensagens); ?>

        <?php
        $atributos = array('class' => 'form-inline mt-2 mt-md-0 mr-auto');

        echo form_open('admin/conversa/manda_mensagem');
        ?>

        <div>
            <input type="hidden" value="<?php echo $this->session->userdata('userlogado')->id_usuario; ?>" name="id_usuario_remetente">
            <input type="hidden" value="<?php echo $id_conversa; ?>" name="id_conversa" id="id_conversa">

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
</main>