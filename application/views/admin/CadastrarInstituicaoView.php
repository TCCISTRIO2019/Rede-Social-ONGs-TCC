<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Cadastrar Instituição</h4>

        <p class="text-center">Informe os dados de sua instituição</p>

        <?php
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        echo form_open('admin/usuario/cadastrar_instituicao');
        ?>

        <input type="hidden" value="<?php echo $email ?>" name="email">
        <input type="hidden" value="<?php echo $senha ?>" name="senha">
        <input type="hidden" value="<?php echo $tipo_usuario ?>" name="tipo_usuario">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email <!--<i class="fa fa-envelope"></i>--> </span>
            </div>
            <input type="email" class="form-control" value="<?php echo $email ?>" name="email" disabled>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nome <!--<i class="fa fa-envelope"></i>--> </span>
            </div>
            <input name="nome" class="form-control" placeholder="Digite o nome" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Data de fundação <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="criacao_instituicao" class="form-control" type="date">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Logradouro <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="logradouro" class="form-control" placeholder="Digite o logradouro" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Numero <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="numero" class="form-control" placeholder="Digite o numero do endereço" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Bairro <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="bairro" class="form-control" placeholder="Digite o bairro" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Complemento <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="complemento" class="form-control" placeholder="Digite o complemento" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cidade <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="cidade" class="form-control" placeholder="Digite a cidade" type="text">
        </div>

        <!-- Mudar para "Selecione o estado" -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Estado <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="estado" class="form-control" placeholder="Digite o estado" type="text">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cep <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="cep" class="form-control" placeholder="Digite o cep" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Quantidade atual de funcionários <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="qtd_funcionarios" class="form-control" placeholder="0" type="number">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Telefone <!--<i class="fa fa-lock"></i>--> </span>
            </div>
            <input name="telefone" class="form-control" placeholder="Digite seu telefone" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Descrição </span>
            </div>
            <textarea name="descricao" class="form-control" placeholder="Diga um pouco sobre o que se trata sua instituição" rows="5" cols="30"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Cadastrar-se </button>
        </div>

        <?php
        echo form_close();
        ?>
    </article>
</div>