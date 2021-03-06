<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Cadastrar Instituição</h4>

        <p class="text-center">Informe os dados de sua instituição</p>

        <?php if ($this->session->flashdata('error') != null) { ?>
            <div class="alert alert-danger" style="max-width: 22rem;"> 
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php
            }

        echo form_open_multipart('admin/usuario/cadastrar_instituicao');
        ?>

        <input type="hidden" value="<?php echo $email ?>" name="email">
        <input type="hidden" value="<?php echo $senha ?>" name="senha">
        <input type="hidden" value="<?php echo $tipo_usuario ?>" name="tipo_usuario">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email </span>
            </div>
            <input type="email" class="form-control" value="<?php echo $email ?>" name="email" disabled>
        </div>

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
                <span class="input-group-text"> Nome </span>
            </div>
            <input name="nome" class="form-control" placeholder="Digite o nome" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Data de fundação </span>
            </div>
            <input name="criacao_instituicao" class="form-control" type="date">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Logradouro </span>
            </div>
            <input name="logradouro" class="form-control" placeholder="Digite o logradouro" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Numero </span>
            </div>
            <input name="numero" class="form-control" placeholder="Digite o numero do endereço" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Bairro </span>
            </div>
            <input name="bairro" class="form-control" placeholder="Digite o bairro" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Complemento </span>
            </div>
            <input name="complemento" class="form-control" placeholder="Digite o complemento" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cidade </span>
            </div>
            <input name="cidade" class="form-control" placeholder="Digite a cidade" type="text">
        </div>

        <!-- Mudar para "Selecione o estado" -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Estado </span>
            </div>
            <input name="estado" class="form-control" placeholder="Digite o estado" type="text">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Cep </span>
            </div>
            <input name="cep" class="form-control" placeholder="Digite o cep" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Quantidade atual de funcionários </span>
            </div>
            <input name="qtd_funcionarios" class="form-control" placeholder="0" type="number">
        </div>

        <!-- Criar mascara com JS -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Telefone </span>
            </div>
            <input name="telefone" class="form-control" placeholder="Digite seu telefone" type="text">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Descrição </span>
            </div>
            <textarea name="descricao" class="form-control" placeholder="Diga um pouco sobre o que se trata sua instituição" rows="5" cols="30"></textarea>
        </div>

        <div class="container bancario">
            <div class="row form-group input-group">
                <h5> Dados Bancários - Doações </h5>
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
            <button type="submit" class="btn btn-primary btn-block"> Cadastrar-se </button>
        </div>

        <?php
        echo form_close();
        ?>

        <div class="form-group">
            <a href="<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']); }; echo base_url('iniciar') ?>">
                <button class="btn btn-outline-primary btn-block"> Voltar </button>
            </a>
        </div>
    </article>
</div>