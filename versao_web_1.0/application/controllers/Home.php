<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logado')){
		    redirect(base_url('iniciar'));
        }
	}

	public function index()
	{
        $dados['titulo'] = 'Publicações - TCC Rede Social';

        $this->load->model('PublicacaoModel', 'modelpublicacao');
        $this->load->model('UsuarioModel', 'modelusuario');

        $this->publicacoes = $this->modelpublicacao->listar_publicacoes(); // Chamando o metodo da model
        $dados['usuario'] = $this->modelusuario->buscar_usuario(md5($this->session->userdata('userlogado')->id_usuario));
        $dados['publicacoes'] = $this->publicacoes;

		$this->load->view('template/html-header', $dados);
		$this->load->view('template/header');
		$this->load->view('public/HomeView', $dados);
		$this->load->view('template/footer');
		$this->load->view('template/html-footer');
	}
}
