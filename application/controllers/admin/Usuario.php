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

	// Apenas redireciona o usuario para a pagina de login correta
	public function pag_cadastrar()
    {
        $dados['titulo'] = 'Cadastrar Usuário - TCC Rede Social';

        $this->load->view('template/html-header', $dados);
        $this->load->view('admin/template/header');

//        if($request->tipo_usuario == 'fisica') {
//            $this->load->view('admin/CadastrarPessoaView', $dados);
//        } elseif ($request->tipo_usuario == 'juridica') {
//            $this->load->view('admins/CadastrarInsitituicaoView', $dados);
//        }
        $this->load->view('public/HomeView', $dados);
        $this->load->view('template/footer');
        $this->load->view('template/html-footer');
    }

    public function cadastrar()
    {

    }
}
