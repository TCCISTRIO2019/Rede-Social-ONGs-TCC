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
        $dados['titulo'] = 'Instituições - TCC Rede Social';

        $this->instituicoes = $this->modelinstituicao->listar_instituicoes();
        $dados['instituicoes'] = $this->instituicoes;

        $this->load->view('template/html-header', $dados);
        $this->load->view('template/header');
        $this->load->view('public/instituicoesview');
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
	}

    public function pesquisar()
    {
        // Se nao estiver logado, mandar para tela inicial
        if(!$this->session->userdata('logado')){
            redirect(base_url('iniciar'));
        }

        $this->form_validation->set_rules('instituicao', 'Instituicao', 'required');

        // Roda a validacao do formulario e valida os campos de "set_rules"
        if($this->form_validation->run() == FALSE){
            redirect(base_url('iniciar'));
        } else {
            $this->instituicoes = $this->modelinstituicao->pesquisar_instituicoes();

            // Terminar fazendo select para pegar institucao com o nome
        }
    }
}
