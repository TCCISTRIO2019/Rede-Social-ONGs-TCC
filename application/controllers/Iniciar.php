<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
}
