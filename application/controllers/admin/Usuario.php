<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('UsuarioModel', 'modelusuario');
        $this->load->model('TelefoneModel', 'modeltelefone');
        $this->load->model('PublicacaoModel', 'modelpublicacao');
        $this->load->model('InstituicaoModel', 'modelinstituicao');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	// Perfil do usuário logado
	public function index($id)
	{
	    // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $publicacoes = $this->modelpublicacao->publicacoes_usuario($id);
        $usuario = $this->modelusuario->buscar_usuario($id);

        if($usuario->tipo_usuario == 'juridica') {
            $dados['instituicao'] = $this->modelinstituicao->pesquisar_instituicao_nome($usuario->nome);
        }

        // Dados a serem enviados para o Cabeçalho
        $dados['titulo'] = 'TCC Rede Social - Perfil Usuario';
        $dados['publicacoes'] = $publicacoes;
        $dados['usuario'] = $usuario;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('admin/UsuarioView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
	}

	// Verifica se o usuario ja existe e redireciona para a pagina de login correta
	public function pag_cadastrar()
    {
        //$this->load->library('form-validation');
        $this->form_validation->set_rules('email', 'Email', 'required',
            array('required' => '. É preciso digitar um email válido.')
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required',
            array('required' => '. É preciso digitar uma senha.')
        );
        $this->form_validation->set_rules('senha_conf', 'Repetir Senha', 'required|matches[senha]',
            array('required' => '. O campo Repetir Senha não é igual ao campo Senha.')
        );

        // Roda a validacao do formulario e valida os campos de "set_rules"
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());

            if (!empty($this->session->flashdata('error'))) {
                $dados['error'] = $this->session->flashdata('error');
            }

            redirect(base_url('iniciar'), $dados);
            // $this->load->view('IniciarView');
        } else {
            $email = $this->input->post( 'email');
            $senha = $this->input->post('senha');
            $tipo_usuario = $this->input->post('tipo_usuario');

            $this->db->where('email', $email);
            $userExiste = $this->db->get('usuario')->result();  // Executa a query montada acima no where

            if(count($userExiste) == 1){    // Ja existe um usuario com esse email
                redirect(base_url('iniciar'));
            } else {
                $dados['email'] = $email;
                $dados['senha'] = $senha;
                $dados['tipo_usuario'] = $tipo_usuario;

                if($tipo_usuario == 'fisica'){
                    $this->pag_cadastrar_pessoa($dados);
                } else {
                    $this->pag_cadastrar_instituicao($dados);
                }
            }
        }
    }

    private function pag_cadastrar_pessoa($dados)
    {
        $dados['titulo'] = 'Cadastrar Pessoa - TCC Rede Social';

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');
        $this->load->view('admin/CadastrarPessoaView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    private function pag_cadastrar_instituicao($dados)
    {
        $dados['titulo'] = 'Cadastrar Instituição - TCC Rede Social';

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');
        $this->load->view('admin/CadastrarInstituicaoView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    public function cadastrar_pessoa()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
        //$this->form_validation->set_rules('nacimento', 'Nacimento', 'callback_data_check');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if($this->form_validation->run() == FALSE){
            // $this->pag_cadastrar_pessoa();
        } else {

            // Pegando a hora atual de criacao do usuario
            // ajustar pois esta vindo do dia seguinte
            $now = new DateTime();
            $datetime = $now->format('Y-m-d');
            $dadosUsuario['criacao'] = $datetime;

            $dadosUsuario['email'] = $this->input->post('email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosUsuario['nome'] = $this->input->post('nome');

            $dadosPessoa['sobrenome'] = $this->input->post('sobrenome');
            $dadosPessoa['nascimento'] = $this->input->post('nascimento');
            $dadosTelefone['telefone'] = $this->input->post('telefone');
            $dadosPessoa['sexo'] = $this->input->post('sexo');

            $dadosUsuario['foto_perfil'] = '/assets/public/images/usuarios/perfil/imagem_perfil_generica.png';

            $this->load->model('PessoaModel', 'modelpessoa');

            // Insere o usuario para pegar o id e passar para as demais tabelas
            $retornoUsuario = $this->modelusuario->inserir($dadosUsuario);

            if($retornoUsuario != NULL && $retornoUsuario != ''){
                $idUsuario = $retornoUsuario->id_usuario;

                if($_FILES['foto_perfil']['size'] != 0) {
                    $dadosAtualizarFoto['id_usuario'] = $idUsuario;

                    $config = array(
                        'upload_path'   => './assets/public/images/usuarios/perfil/',
                        'allowed_types' => 'gif|jpg|png',
                        'file_name'     => 'perfil_'.$idUsuario,
                        'overwrite'     => TRUE
                    );
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto_perfil')){
                        $dadosAtualizarFoto['foto_perfil'] = '/assets/public/images/usuarios/perfil/'.$this->upload->data('file_name');

                        $config2['width'] = 500;
                        $config2['length'] = 500;
                        $this->load->library('image_lib', $config2);
                    } else {
                        echo $this->upload->display_errors();
                    }
                    $this->modelusuario->atualizar($dadosAtualizarFoto);
                }

                $dadosPessoa['id_usuario'] = $idUsuario;
                $dadosTelefone['id_usuario'] = $idUsuario;

                if($this->modelpessoa->inserir($dadosPessoa) && $this->modeltelefone->inserir($dadosTelefone)){
                    $dadosUsuario = $this->modelusuario->verifica_login($retornoUsuario);

                    $dadosSessao['userlogado'] = $dadosUsuario[0];
                    $dadosSessao['logado'] = TRUE;

                    $this->session->set_userdata($dadosSessao);

                    redirect(base_url('home'));
                } else {
                    echo "Houve um erro ao criar sua conta!";
                }
            } else {
                echo "Houve um erro ao criar sua conta!";
            }
        }
    }

    public function cadastrar_instituicao()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[usuario.nome]');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('complemento', 'Complemento');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('qtd_funcionarios', 'Qtd Funcionarios', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('descricao', 'Descricao', 'required');

        if($this->form_validation->run() == FALSE){
            // $this->pag_cadastrar_instituicao();
        } else {

            // ajustar pois esta vindo do dia seguinte
            $now = new DateTime();
            $datetime = $now->format('Y-m-d');
            $dadosUsuario['criacao'] = $datetime;
            $dadosUsuario['email'] = $this->input->post('email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosUsuario['nome'] = $this->input->post('nome');
            $dadosUsuario['foto_perfil'] = '/assets/public/images/usuarios/perfil/imagem_perfil_generica.png';
            $dadosUsuario['capa'] = '/assets/public/images/usuarios/capa/capa_generica.jpg';

            $dadosInstituicao['criacao_instituicao'] = $this->input->post('criacao_instituicao');
            $dadosInstituicao['logradouro'] = $this->input->post('logradouro');
            $dadosInstituicao['numero'] = $this->input->post('numero');
            $dadosInstituicao['bairro'] = $this->input->post('bairro');
            $dadosInstituicao['complemento'] = $this->input->post('complemento');
            $dadosInstituicao['cidade'] = $this->input->post('cidade');
            $dadosInstituicao['estado'] = $this->input->post('estado');
            $dadosInstituicao['cep'] = $this->input->post('cep');
            $dadosInstituicao['qtd_funcionarios'] = $this->input->post('qtd_funcionarios');
            $dadosInstituicao['descricao'] = $this->input->post('descricao');
            $dadosInstituicao['banco'] = $this->input->post('banco');
            $dadosInstituicao['conta'] = $this->input->post('conta');
            $dadosInstituicao['agencia'] = $this->input->post('agencia');

            $dadosTelefone['telefone'] = $this->input->post('telefone');

            // Se algum deles vier vazio, nao importar nenhum pro banco
            if($dadosInstituicao['banco'] == '' || $dadosInstituicao['agencia'] == '' || $dadosInstituicao['conta'] == '')
            {
                $dadosInstituicao['banco'] = '';
                $dadosInstituicao['agencia'] = '';
                $dadosInstituicao['conta'] = '';
            }

            $this->load->model('InstituicaoModel', 'modelinstituicao');

            $retornoUsuario = $this->modelusuario->inserir($dadosUsuario);

            if($retornoUsuario != NULL && $retornoUsuario != ''){
                $idUsuario = $retornoUsuario->id_usuario;

                // Carregar a biblioteca caso tenha alguma das duas imagens
                if($_FILES['foto_perfil']['size'] != 0 || $_FILES['capa']['size'] != 0) {
                    $this->load->library('upload');

                    $dadosAtualizarImagem['id_usuario'] = $idUsuario;

                    // Para caso a foto de perfil esteja vazia
                    if($_FILES['foto_perfil']['size'] != 0) {
                        $configFoto = array(
                            'upload_path'   => './assets/public/images/usuarios/perfil/',
                            'allowed_types' => 'gif|jpg|png',
                            'file_name'     => 'perfil_'.$idUsuario,
                            'overwrite'     => TRUE
                        );

                        $this->upload->initialize($configFoto, TRUE);

                        if($this->upload->do_upload('foto_perfil')){
                            $dadosAtualizarImagem['foto_perfil'] = '/assets/public/images/usuarios/perfil/'.$this->upload->data('file_name');

                            $config2Foto['width'] = 500;
                            $config2Foto['length'] = 500;
                            $this->load->library('image_lib', $config2Foto);
                        } else {
                            echo $this->upload->display_errors();
                        }
                    }

                    // Caso a imagem da capa esteja vazia, não aparecerá nada no lugar
                    if($_FILES['capa']['size'] != 0) {
                        $configCapa = array(
                            'upload_path'   => './assets/public/images/usuarios/capa/',
                            'allowed_types' => 'gif|jpg|png',
                            'file_name'     => 'capa_'.$idUsuario,
                            'overwrite'     => TRUE
                        );

                        $this->upload->initialize($configCapa, TRUE);

                        if($this->upload->do_upload('capa')){
                            $dadosAtualizarImagem['capa'] = '/assets/public/images/usuarios/capa/'.$this->upload->data('file_name');

                            $config2Capa['width'] = 1110;
                            $config2Capa['length'] = 320;
                            $this->load->library('image_lib', $config2Capa);
                        } else {
                            echo $this->upload->display_errors();
                        }
                    }

                    $this->modelusuario->atualizar($dadosAtualizarImagem);
                }

                $dadosInstituicao['id_usuario'] = $idUsuario;
                $dadosTelefone['id_usuario'] = $idUsuario;

                if($this->modelinstituicao->inserir($dadosInstituicao) && $this->modeltelefone->inserir($dadosTelefone)){
                    $dadosUsuario = $this->modelusuario->verifica_login($retornoUsuario);

                    $dadosSessao['userlogado'] = $dadosUsuario[0];
                    $dadosSessao['logado'] = TRUE;

                    $this->session->set_userdata($dadosSessao);

                    redirect(base_url('home'));
                } else {
                    echo "Houve um erro ao criar sua conta!";
                }
            } else {
                echo "Houve um erro ao criar sua conta!";
            }
        }
    }

    public function logar()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');    // Validacao do campo senha para ter 8 digitos

        // Roda a validacao do formulario e valida os campos de "set_rules"
        if($this->form_validation->run() == FALSE){
            redirect(base_url('iniciar'));
        } else {
            $dadosRequest['email'] = $this->input->post( 'email');
            $dadosRequest['senha'] = $this->input->post('senha');

            $this->db->where('email', $dadosRequest['email']);
            $this->db->where('senha', $dadosRequest['senha']);
            $userLogado = $this->db->get('usuario')->result();

            // Verifica se o usuario estah correto
            if(count($userLogado) == 1) {
                // Chamando o metodo da model para logicas de tipos diferentes
                $dadosUsuario = $this->modelusuario->verifica_login($userLogado[0]);

                $dadosSessao['userlogado'] = $dadosUsuario[0];
                $dadosSessao['logado'] = TRUE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('home'));
            } else {
                $this->deslogar();
            }
        }
    }

    public function deslogar()
    {
        $dadosSessao['userlogado'] = NULL;
        $dadosSessao['logado'] = FALSE;

        $this->session->set_userdata($dadosSessao);

        redirect(base_url('iniciar'));
    }

    public function pag_configurar($id)
    {
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));

        // Se está logado, validar se o id sendo passado na url é o mesmo do usuario que está logado
        } elseif (md5($this->session->userdata('userlogado')->id_usuario) != $id) {
            redirect(base_url('home'));
        }

        $this->db->where('md5(id_usuario)', $id);
        $dados = $this->db->get('usuario')->result();  // Executa a query montada acima no where

        $this->db->where('md5(id_usuario)', $id);
        $instituicao = $this->db->get('instituicao')->result();

        if($dados[0]->tipo_usuario == "fisica"){    // Ja existe um usuario com esse email
            $this->pag_configurar_pessoa($dados[0]);
        } else {
            $this->pag_configurar_instituicao($instituicao[0]);
        }
    }

    private function pag_configurar_pessoa($entrada){
        $dados['titulo'] = 'Configurar Pessoa - TCC Rede Social';

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');
        $this->load->view('admin/ConfigurarUsuarioPessoaView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    private function pag_configurar_instituicao($entrada){
        $dados['titulo'] = 'Configurar Instituicao - TCC Rede Social';
        $dados['descricao'] = $entrada->descricao;
        $dados['banco'] = $entrada->banco;
        $dados['agencia'] = $entrada->agencia;
        $dados['conta'] = $entrada->conta;

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');
        $this->load->view('admin/ConfigurarUsuarioInstituicaoView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    public function atualizar_pessoa(){
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[2]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|min_length[2]');
        $this->form_validation->set_rules('nascimento', 'Nascimento', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|min_length[11]');

        if($this->form_validation->run() == FALSE){
            $this->db->where('md5(id_usuario)', (string) $this->session->userdata('userlogado')->id_usuario);
            $dados = $this->db->get('usuario')->result();

            $this->pag_configurar_pessoa($dados[0]);
        } else {
            $dadosUsuario['id_usuario'] = $this->input->post('id_usuario');
            $dadosUsuario['email'] = $this->input->post( 'email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosUsuario['nome'] = $this->input->post('nome');
            $now = new DateTime();
            $datetime = $now->format('Y-m-d H:i:s');
            $dadosUsuario['modificacao'] = $datetime;

            $dadosPessoa['id_usuario'] = $dadosUsuario['id_usuario'];
            $dadosPessoa['sobrenome'] = $this->input->post('sobrenome');
            $dadosPessoa['nascimento'] = $this->input->post('nascimento');
            $dadosPessoa['sexo'] = $this->input->post('sexo');

            $dadosTelefone['id_usuario'] = $dadosUsuario['id_usuario'];
            $dadosTelefone['telefone'] = $this->input->post('telefone');

            if($_FILES['foto_perfil']['size'] != 0) {
                $this->load->helper('string');

                $configuracao = array(
                    'upload_path'   => './assets/public/images/usuarios/perfil/',
                    'allowed_types' => 'gif|jpg|png',
                    'file_name'     => 'perfil_'.random_string('numeric', 5),
                    'overwrite'     => TRUE
                );
                $this->load->library('upload', $configuracao);

                if($this->upload->do_upload('foto_perfil')){
                    $dadosUsuario['foto_perfil'] = '/assets/public/images/usuarios/perfil/'.$this->upload->data('file_name');

                    $config2['width'] = 500;
                    $config2['length'] = 500;
                    $this->load->library('image_lib', $config2);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->load->model('PessoaModel', 'modelpessoa');

            if($this->modelusuario->atualizar($dadosUsuario) && $this->modelpessoa->atualizar($dadosPessoa) && $this->modeltelefone->atualizar($dadosTelefone)){

                $this->db->where('id_usuario', $dadosUsuario['id_usuario']);
                $userLogado = $this->db->get('usuario')->result();

                $retornoUsuario = $this->modelusuario->verifica_login($userLogado[0]);

                $dadosSessao['userlogado'] = $retornoUsuario[0];
                $dadosSessao['logado'] = TRUE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('iniciar'));
            } else {
                echo "Ocorreu um erro no sistema, por favor tente novamente!";
            }
        }
    }

    public function atualizar_instituicao(){
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[2]');
        $this->form_validation->set_rules('criacao_instituicao', 'Data de fundação', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required|min_length[2]');
        $this->form_validation->set_rules('numero', 'Numero', 'required|min_length[2]');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required|min_length[2]');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required|min_length[2]');
        $this->form_validation->set_rules('estado', 'Estado', 'required|min_length[2]');
        $this->form_validation->set_rules('cep', 'Cep', 'required|min_length[2]');
        $this->form_validation->set_rules('qtd_funcionarios', 'Quantidade atual de funcinários', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|min_length[10]');
        $this->form_validation->set_rules('descricao', 'Descricao', 'required');

        if($this->form_validation->run() == FALSE){
            $this->db->where('md5(id_usuario)', (string) $this->session->userdata('userlogado')->id_usuario);
            $dados = $this->db->get('usuario')->result();

            $this->pag_configurar_instituicao($dados[0]);
        } else {
            $dadosUsuario['id_usuario'] = $this->input->post('id_usuario');
            $dadosUsuario['email'] = $this->input->post( 'email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosUsuario['nome'] = $this->input->post('nome');
            $now = new DateTime();
            $datetime = $now->format('Y-m-d H:i:s');
            $dadosUsuario['modificacao'] = $datetime;

            $dadosInstituicao['id_usuario'] = $dadosUsuario['id_usuario'];
            $dadosInstituicao['criacao_instituicao'] = $this->input->post('criacao_instituicao');
            $dadosInstituicao['logradouro'] = $this->input->post('logradouro');
            $dadosInstituicao['numero'] = $this->input->post('numero');
            $dadosInstituicao['bairro'] = $this->input->post('bairro');
            $dadosInstituicao['complemento'] = $this->input->post('complemento');
            $dadosInstituicao['cidade'] = $this->input->post('cidade');
            $dadosInstituicao['estado'] = $this->input->post('estado');
            $dadosInstituicao['cep'] = $this->input->post('cep');
            $dadosInstituicao['qtd_funcionarios'] = $this->input->post('qtd_funcionarios');
            $dadosInstituicao['descricao'] = $this->input->post('descricao');
            $dadosInstituicao['banco'] = $this->input->post('banco');
            $dadosInstituicao['conta'] = $this->input->post('conta');
            $dadosInstituicao['agencia'] = $this->input->post('agencia');

            $dadosTelefone['id_usuario'] = $dadosUsuario['id_usuario'];
            $dadosTelefone['telefone'] = $this->input->post('telefone');

            // Carregar a biblioteca caso tenha alguma das duas imagens
            if($_FILES['foto_perfil']['size'] != 0 || $_FILES['capa']['size'] != 0) {
                $this->load->library('upload');
                $this->load->helper('string');

                if($_FILES['foto_perfil']['size'] != 0) {
                    $config = array(
                        'upload_path'   => './assets/public/images/usuarios/perfil/',
                        'allowed_types' => 'gif|jpg|png',
                        'file_name'     => 'perfil_'.random_string('numeric', 5),
                        'overwrite'     => TRUE
                    );

                    $this->upload->initialize($config, TRUE);

                    if($this->upload->do_upload('foto_perfil')){
                        $dadosUsuario['foto_perfil'] = '/assets/public/images/usuarios/perfil/'.$this->upload->data('file_name');

                        $config2['width'] = 500;
                        $config2['length'] = 500;
                        $this->load->library('image_lib', $config2);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                if($_FILES['capa']['size'] != 0) {
                    $config = array(
                        'upload_path'   => './assets/public/images/usuarios/capa/',
                        'allowed_types' => 'gif|jpg|png',
                        'file_name'     => 'capa_'.random_string('numeric', 5),
                        'overwrite'     => TRUE
                    );
                    $this->upload->initialize($config, TRUE);

                    if($this->upload->do_upload('capa')){
                        $dadosUsuario['capa'] = '/assets/public/images/usuarios/capa/'.$this->upload->data('file_name');

                        $config2['width'] = 1110;
                        $config2['length'] = 320;
                        $this->load->library('image_lib', $config2);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            }

            // Se algum deles vier vazio, nao importar nenhum pro banco
            if($dadosInstituicao['banco'] == '' || $dadosInstituicao['agencia'] == '' || $dadosInstituicao['conta'] == '')
            {
                $dadosInstituicao['banco'] = '';
                $dadosInstituicao['agencia'] = '';
                $dadosInstituicao['conta'] = '';
            }

            $this->load->model('InstituicaoModel', 'modelinstituicao');

            if($this->modelusuario->atualizar($dadosUsuario) && $this->modelinstituicao->atualizar($dadosInstituicao) && $this->modeltelefone->atualizar($dadosTelefone)){

                $this->db->where('id_usuario', $dadosUsuario['id_usuario']);
                $userLogado = $this->db->get('usuario')->result();

                $retornoUsuario = $this->modelusuario->verifica_login($userLogado[0]);

                $dadosSessao['userlogado'] = $retornoUsuario[0];
                $dadosSessao['logado'] = TRUE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('iniciar'));
            } else {
                echo "Ocorreu um erro no sistema, por favor tente novamente!";
            }
        }
    }
}
