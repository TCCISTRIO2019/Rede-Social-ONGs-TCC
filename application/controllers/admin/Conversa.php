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

	// Tela da conversa, com as mensagens
	public function index($id_conversa /*Recebe sem md5()*/)
	{
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $mensagens = $this->modelmensagem->buscar_mensagens($id_conversa);

        $dados['titulo'] = 'TCC Rede Social - Mensagens';
        $dados['mensagens'] = $mensagens;
        $dados['id_conversa'] = $id_conversa;

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

        redirect(base_url('/conversa/id_'.$conversa->id_conversa));
//        $this->carrega_conversa($conversa->id_conversa);
    }

    public function manda_mensagem()
    {
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $this->form_validation->set_rules('corpo', 'Corpo', 'required|min_length[1]');

        $dadosRequest['id_conversa'] = $this->input->post( 'id_conversa');

        if($this->form_validation->run() == FALSE){
            redirect(base_url('/conversa/id_'.$dadosRequest['id_conversa']));
        } else {
            $dadosRequest['id_usuario_remetente'] = $this->input->post( 'id_usuario_remetente');
            $dadosRequest['corpo'] = $this->input->post( 'corpo');

            $now = new DateTime();
            $datetime = $now->format('Y-m-d h:m:s');
            $dadosRequest['hora_envio'] = $datetime;

            $this->modelmensagem->inserir($dadosRequest);

            redirect(base_url('/conversa/id_'.$dadosRequest['id_conversa']));
        }
    }
}
