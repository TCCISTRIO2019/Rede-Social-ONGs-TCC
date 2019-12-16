<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

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

		$this->load->view('public/template/html-header', $dados);
		$this->load->view('public/template/header');
		$this->load->view('public/HomeView', $dados);
		$this->load->view('public/template/footer');
		$this->load->view('public/template/html-footer');
	}

	public function teste(){
	    echo 'teste!!!!';
    }
}
