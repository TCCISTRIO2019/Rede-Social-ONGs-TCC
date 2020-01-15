<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('UsuarioModel', 'modelusuario');
        $this->load->model('TelefoneModel', 'modeltelefone');
	}

	public function index()
	{
        // Dados a serem enviados para o Cabeçalho
        $dados['titulo'] = 'TCC Rede Social - Index';

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('IniciarView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
	}

	// Verifica se o usuario ja existe e redireciona para a pagina de login correta
	public function pag_cadastrar()
    {
//        $this->load->library('form-validation');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuario.senha]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('senha_conf', 'Confirmacao Senha', 'required|matches[senha]');

        // Roda a validacao do formulario e valida os campos de "set_rules"
        if($this->form_validation->run() == FALSE){
            redirect(base_url('iniciar'));
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
        $this->load->view('admin/cadastrarpessoaview', $dados);
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    private function pag_cadastrar_instituicao($dados)
    {
        $dados['titulo'] = 'Cadastrar Instituição - TCC Rede Social';

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');
        $this->load->view('admin/cadastrarinstituicaoview', $dados);
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    public function cadastrar_pessoa()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
//        $this->form_validation->set_rules('nacimento', 'Nacimento', 'callback_data_check');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if($this->form_validation->run() == FALSE){
//            Modificar para mandar para a respectiva página de cadastro
//            redirect(base_url('welcome'));
            $this->index();
        } else {

            // Pegando a hora atual de criacao do usuario
            // ajustar pois esta vindo do dia seguinte
            $now = new DateTime();
            $datetime = $now->format('Y-m-d');
            $dadosUsuario['criacao'] = $datetime;

            $dadosUsuario['email'] = $this->input->post('email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosPessoa['nome'] = $this->input->post('nome');
            $dadosPessoa['sobrenome'] = $this->input->post('sobrenome');
            $dadosPessoa['nascimento'] = $this->input->post('nascimento');
            $dadosTelefone['telefone'] = $this->input->post('telefone');
            $dadosPessoa['sexo'] = $this->input->post('sexo');

            $this->load->model('PessoaModel', 'modelpessoa');

            // Insere o usuario para pegar o id e passar para as demais tabelas
            $retornoUsuario = $this->modelusuario->inserir($dadosUsuario);

            if($retornoUsuario != NULL && $retornoUsuario != ''){
                $idUsuario = $retornoUsuario->id_usuario;

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
        $this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[instituicao.nome]');
//        $this->form_validation->set_rules('criacao_instituicao', 'Criacao Instituicao', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('complemento', 'Complemento');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('qtd_funcionarios', 'Qtd Funcionarios', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if($this->form_validation->run() == FALSE){
//            Modificar para mandar para a respectiva página de cadastro
            redirect(base_url('iniciar'));
        } else {

            // ajustar pois esta vindo do dia seguinte
            $now = new DateTime();
            $datetime = $now->format('Y-m-d');
            $dadosUsuario['criacao'] = $datetime;

            $dadosUsuario['email'] = $this->input->post('email');
            $dadosUsuario['senha'] = $this->input->post('senha');
            $dadosUsuario['tipo_usuario'] = $this->input->post('tipo_usuario');
            $dadosInstituicao['nome'] = $this->input->post('nome');
            $dadosInstituicao['criacao_instituicao'] = $this->input->post('criacao_instituicao');
            $dadosInstituicao['logradouro'] = $this->input->post('logradouro');
            $dadosInstituicao['numero'] = $this->input->post('numero');
            $dadosInstituicao['bairro'] = $this->input->post('bairro');
            $dadosInstituicao['complemento'] = $this->input->post('complemento');
            $dadosInstituicao['cidade'] = $this->input->post('cidade');
            $dadosInstituicao['estado'] = $this->input->post('estado');
            $dadosInstituicao['cep'] = $this->input->post('cep');
            $dadosInstituicao['qtd_funcionarios'] = $this->input->post('qtd_funcionarios');
            $dadosTelefone['telefone'] = $this->input->post('telefone');

            $this->load->model('InstituicaoModel', 'modelinstituicao');

            $retornoUsuario = $this->modelusuario->inserir($dadosUsuario);

            if($retornoUsuario != NULL && $retornoUsuario != ''){
                $idUsuario = $retornoUsuario->id_usuario;

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
//
//    public function callback_data_check($data)
//    {
//        $dia = (int) substr($data, 0, 2);
//        $mes = (int) substr($data, 3, 2);
//        $ano = (int) substr($data, 6, 4);
//
//        if (checkdate($mes, $dia, $ano))
//        {
//            $this->form_validation->set_message('data_check', 'O campo {field} precisa ser dd-mm-yyyy');
//            return TRUE;
//        }
//        else
//        {
//            return FALSE;
//        }
//    }
}
