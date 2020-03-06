<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('UsuarioModel', 'modelusuario');
        $this->load->model('ConversaModel', 'modelconversa');
        $this->load->model('MensagemModel', 'modelmensagem');
	}

	// Tela da conversa
	public function index($id)
	{
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $conversa = $this->modelconversa->buscar_conversa($id);
        $mensagens = $this->modelmensagem->buscar_mensagens($conversa->id_conversa);

        $dados['titulo'] = 'TCC Rede Social - Conversa';
        $dados['mensagens'] = $mensagens;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('admin/mensagensview');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
	}

	public function lista_conversas($id)
    {
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        } elseif (md5($this->session->userdata('userlogado')->id_usuario) != $id) { //Controle para o usuário poder ver apenas as prórias conversas
            redirect(base_url('home'));
        }

        $conversas = $this->modelconversa->listar_conversas_usuario($id);

        // Dados a serem enviados para o Cabeçalho
        $dados['titulo'] = 'TCC Rede Social - Conversas';
        $dados['conversas'] = $conversas;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('admin/conversasview');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

	public function inicia_conversa($id)
    {
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $dadosRequest['id_usuario1'] = $this->session->userdata('userlogado')->id_usuario;
        $dadosRequest['id_usuario2'] = $id;

        $now = new DateTime();
        $datetime = $now->format('Y-m-d h:m:s');
        $dadosRequest['data_inicio'] = $datetime;

        $conversa = $this->modelconversa->inserir_conversa($dadosRequest);

        redirect(base_url('home'));
//        $this->carrega_conversa($conversa->id_conversa);
    }
}
