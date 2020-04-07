<ul class="list-group" id="lista_mensagens">
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