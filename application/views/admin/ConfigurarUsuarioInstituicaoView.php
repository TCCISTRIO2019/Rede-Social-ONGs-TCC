<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Atualizar seus dados</h4>
</div>

<main class="row justify-content-md-center">
    <section class="card-body mx-auto" style="max-width: 400px;">
        <?php
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        echo form_open_multipart('admin/usuario/atualizar_instituicao');
        ?>

        <input name="id_usuario" value="<?php echo $this->session->userdata('userlogado')->id_usuario ?>" type="hidden">
        <input name="email" value="<?php echo $this->session->userdata('userlogado')->email ?>" type="hidden">
        <input name="tipo_usuario" value="<?php echo $this->session->userdata('userlogado')->tipo_usuario ?>" type="hidden">

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto_perfil">
                <label class="custom-file-label" for="inputGroupFile01">Escolher sua imagem de usuário</label>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" name="capa">
                <label class="custom-file-label" for="inputGroupFile02">Escolher sua imagem de capa</label>
            </div>
        </div>

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
                <span class="input-group-text"> Quantidade atual de funcionários </span>
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
            <textarea name="descricao" class="form-control" placeholder="Diga um pouco sobre o que se trata sua instituição" rows="5" cols="30" ><?php echo $descricao ?></textarea>
        </div>

        <div class="container bancario">
            <div class="row form-group input-group text-center justify-content-md-center">
                <h5> Dados Bancários </h5>
            </div>

            <div class="row">
                <div class="form-group input-group col-sm-12">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Banco </span>
                    </div>
                    <select name="banco" class="custom-select">
                        <option value="">Escolha seu banco</option>
                        <option value="Bradesco">Bradesco</option>
                        <option value="Santander">Santander</option>
                        <option value="Banco do Brasil">Banco do Brasil</option>
                        <option value="Itaú">Itaú</option>
                        <option value="Caixa Econômica federal">Caixa Econômica federal</option>
                        <option value="Safra">Safra</option>
                    </select>
                </div>

                <div class="form-group input-group col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Agência </span>
                    </div>
                    <input name="agencia" class="form-control" placeholder="Agência" type="text">
                </div>

                <div class="form-group input-group col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Conta </span>
                    </div>
                    <input name="conta" class="form-control" placeholder="Conta" type="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary btn-block"> Atualizar Dados </button>
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