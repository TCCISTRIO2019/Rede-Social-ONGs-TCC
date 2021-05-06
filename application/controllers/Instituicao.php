<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instituicao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logado')){
		    redirect(base_url('iniciar'));
        }

        $this->load->model('InstituicaoModel', 'modelinstituicao');
	}

	public function index()
	{
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $dados['titulo'] = 'Instituições - TCC Rede Social';

        $dadosRequest['nome'] = $this->input->post( 'nome_instituicao');

        if($dadosRequest['nome'] == '' || $dadosRequest['nome'] == NULL){
            $this->instituicoes = $this->modelinstituicao->listar_instituicoes();
        } else {
            $this->instituicoes = $this->modelinstituicao->pesquisar_instituicao_nome($dadosRequest['nome']);
        }

        $dados['instituicoes'] = $this->instituicoes;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('public/InstituicoesView');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
	}
}
