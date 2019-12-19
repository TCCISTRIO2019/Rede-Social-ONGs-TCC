<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $this->load->model('UsuarioModel', 'modelusuario'); // Carrega a model e seta o alias como 'modelusuario'
        $this->usuarios = $this->modelusuario->listar_usuarios(); // Chamando o metodo da model
        $dados['usuarios'] = $this->usuarios;

        $this->load->model('PublicacaoModel', 'modelpublicacao');
        $this->publicacoes = $this->modelpublicacao->listar_publicacoes(); // Chamando o metodo da model
        $dados['publicacoes'] = $this->publicacoes;

        // Dados a serem enviados para o Cabeçalho
        $dados['titulo'] = 'TCC Rede Social - Index';

		$this->load->view('template/html-header', $dados);
		$this->load->view('template/header');
		$this->load->view('IniciarView', $dados);
		$this->load->view('template/footer');
		$this->load->view('template/html-footer');
	}
}
