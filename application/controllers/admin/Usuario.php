<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $dados['titulo'] = 'Publicações - TCC Rede Social';

        $this->load->model('PublicacaoModel', 'modelpublicacao');
        $this->publicacoes = $this->modelpublicacao->listar_publicacoes(); // Chamando o metodo da model
        $dados['publicacoes'] = $this->publicacoes;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('public/HomeView', $dados);
        $this->load->view('template/footer');
		$this->load->view('template/html-footer');
	}

	// Verifica se o usuario ja existe e redireciona para a pagina de login correta
	public function pag_cadastrar()
    {
//        $this->load->library('form-validation');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');    // Validacao do campo senha para ter 8 digitos
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
        $this->load->view('admin/template/header');//        }
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

    public function cadastrar()
    {

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
                $this->load->model('UsuarioModel', 'modelusuario');
                $dadosUsuario = $this->modelusuario->verifica_login($userLogado[0]); // Chamando o metodo da model

                $dadosSessao['userlogado'] = $dadosUsuario[0];
                $dadosSessao['logado'] = TRUE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('home'));
            } else {
                $dadosSessao['userlogado'] = NULL;
                $dadosSessao['logado'] = FALSE;

                $this->session->set_userdata($dadosSessao);

                redirect(base_url('iniciar'));
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
}
