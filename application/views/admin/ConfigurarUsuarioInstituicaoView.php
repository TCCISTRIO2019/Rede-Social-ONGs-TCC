<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Atualizar seus dados - Instituição</h4>
</div>

<main class="row justify-content-md-center">
    <section class="card-body mx-auto" style="max-width: 400px;">
        <?php
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        echo form_open('admin/usuario/atualizar_instituicao');
        ?>

        <input name="id_usuario" value="<?php echo $this->session->userdata('userlogado')->id_usuario ?>" type="hidden">
        <input name="email" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="hidden">
        <input name="tipo_usuario" value="<?php echo $this->session->userdata('userlogado')->tipo_usuario ?>" type="hidden">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email </span>
            </div>
            <input class="form-control" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="email" disabled>
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Senha </span>
            </div>
            <input name="senha" class="form-control" value="<?php echo $this->session->userdata('userlogado')->senha ?>" type="password">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Nome </span>
            </div>
            <input name="nome" class="form-control" value="<?php echo $this->session->userdata('userlogado')->nome ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Data de fundação </span>
            </div>
            <input name="criacao_instituicao" class="form-control" value="<?php echo $this->session->userdata('userlogado')->criacao_instituicao ?>" type="date">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Logradouro </span>
            </div>
            <input name="logradouro" class="form-control" value="<?php echo $this->session->userdata('userlogado')->logradouro ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Numero </span>
            </div>
            <input name="numero" class="form-control" value="<?php echo $this->session->userdata('userlogado')->numero ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Bairro </span>
            </div>
            <input name="bairro" class="form-control" value="<?php echo $this->session->userdata('userlogado')->bairro ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Complemento </span>
            </div>
            <input name="complemento" class="form-control" value="<?php echo $this->session->userdata('userlogado')->complemento ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cidade </span>
            </div>
            <input name="cidade" class="form-control" value="<?php echo $this->session->userdata('userlogado')->cidade ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Estado </span>
            </div>
            <input name="estado" class="form-control" value="<?php echo $this->session->userdata('userlogado')->estado ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cep </span>
            </div>
            <input name="cep" class="form-control" value="<?php echo $this->session->userdata('userlogado')->cep ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Quantidade atual de funcinários </span>
            </div>
            <input name="qtd_funcionarios" class="form-control" value="<?php echo $this->session->userdata('userlogado')->qtd_funcionarios ?>" type="number">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Telefone </span>
            </div>
            <input name="telefone" class="form-control" value="<?php echo $this->session->userdata('userlogado')->telefone ?>" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Descrição </span>
            </div>
            <textarea name="descricao" class="form-control" placeholder="Diga um pouco sobre o que se trata sua instituição" rows="5" cols="30"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Atualizar Dados </button>
        </div>

        <?php
        echo form_close();
        ?>

        <div class="form-group">
            <a href="<?php echo base_url('iniciar') ?>">
                <button class="btn btn-outline-primary btn-block"> Voltar </button>
            </a>
        </div>
    </section>
</main>